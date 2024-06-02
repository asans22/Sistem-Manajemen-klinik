<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\returnSelf;

class UserSessionControl extends Controller
{
    function landing()
    {
        return view("user/Welcome");
    }

    function index()
    {
        return view("user/login");
    }
    function admin()
    {
        $users = User::all();
        return view("admin/akun", ['users' => $users]);
    }
    function home()
    {
        return view("user/home");
    }
    function dokter()
    {
        $reservasi = Reservasi::all();
        $pasien = Pasien::all(); // Mengambil semua data pasien dari tabel pasien
        return view('dokter.pasien', compact('pasien'));
    }
    function dokterUser()
    {
        $doctors = Dokter::all();
        return view("user/Dokter", ['doctors' => $doctors]);
    }
    public function getDoctorsBySpesialis($spesialis)
    {
        $doctors = Dokter::where('spesialis', $spesialis)->get();
        return response()->json($doctors);
    }
    public function getSchedulesByDoctor($dokter)
    {
        $doctor = Dokter::where('name', $dokter)->get();
        return response()->json($doctor);
    }

    public function getDoctorsByName($name)
    {
        $doctors = Dokter::where('name', $name)->get();
        return response()->json($doctors);
    }

    public function reservasiDokter($id)
    {
        $dokter = Dokter::findOrFail($id); // Ambil data dokter berdasarkan ID
        $allDokters = Dokter::all(); // Ambil semua data dokter untuk opsi lain
        return view('user.reservasi', ['dokter' => $dokter, 'allDokters' => $allDokters]);
    }

    public function getDetilMedis()
    {
        $pasien = Pasien::all(); // Mengambil semua data pasien dari tabel pasien
        return view('user.catatanMedis', compact('pasien'));
    }
    public function getDetilReservasiMedis()
    {
        $reservasi = Reservasi::all(); // Mengambil semua data pasien dari tabel pasien
        return view('user.reservasiMedis', compact('reservasi'));
    }
    function myAccount()
    {
        return view("user/Account");
    }
    public function updateAccount(Request $request)
    {

        Log::info($request->all());

        // Validasi data yang dikirim oleh formulir
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        // Perbarui data pengguna
        $user = \App\Models\User::find(Auth::id());
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->no_hp = $validated['no_hp'];
        $user->alamat = $validated['alamat'];
        $user->save();

        // Redirect ke halaman tertentu dengan pesan sukses
        return redirect()->route('myAccount')->with('success', 'Data profil berhasil diperbarui!');
    }

    function reservasi()
    {
        $allDokters = Dokter::all();
        return view("user/reservasiData", ['allDokters' => $allDokters]);
    }
    function obatUser()
    {
        $obats = Obat::all();
        return view("user/obat", compact('obats'));
    }


    function login(Request $request)
    {

        Session::flash('email', $request->email);

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            Session::flash('success', 'Berhasil login');

            if (Auth::user()->role == 'admin') {
                return redirect('admin')->with('success', 'Berhasil login'); // Jika login berhasil, arahkan ke halaman yang dituju
            } elseif (Auth::user()->role == 'user') {
                return redirect('home')->with('success', 'Berhasil login'); // Jika login berhasil, arahkan ke halaman yang dituju
            } elseif (Auth::user()->role == 'dokter') {
                return redirect('dokter')->with('success', 'Berhasil login');
            }
        } else {
            return redirect('login')->withErrors('Username dan Password yang dimasukkan tidak valid')->withInput(); // Jika login gagal, arahkan kembali ke halaman login dengan pesan kesalahan
        }
    }
    function registrasi()
    {
        return view("user/registrasi");
    }


    function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);

        $request->validate([
            'name' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ], [
            'name.required' => 'Nama lengkap wajib diisi',
            'no_hp.required' => 'No HP wajib diisi',
            'alamat.required' => 'Alamat lengkap wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Silahkan masukkan email yang valid',
            'email.unique' => 'Email sudah ada, masukkan email lain',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal terdiri dari 6 karakter',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ];

        User::create($data);


        Session::flash('success', 'Akun berhasil dibuat');

        return redirect('login');
    }


    function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function storeReservasi(Request $request)
    {
        Log::info($request->all());

        $validated = $request->validate([
            'dokter' => 'required',
            'spesialis' => 'required',
            'jadwal' => 'required',
            'tanggal' => 'required|date',
            'keluhan' => 'required|string|max:255',
        ]);

        // Mengambil informasi pengguna dari tabel users
        $user = auth()->user();

        // Membuat objek Reservasi dan menyimpan data
        $reservasi = new Reservasi();
        $reservasi->name = $user->name;
        $reservasi->email = $user->email; // Assign the user's email
        $reservasi->alamat = $user->alamat; // Assuming alamat is a valid field
        $reservasi->dokter = $validated['dokter'];
        $reservasi->spesialis = $validated['spesialis'];
        $reservasi->jadwal = $validated['jadwal'];
        $reservasi->tanggal = $validated['tanggal'];
        $reservasi->keluhan = $validated['keluhan'];
        $reservasi->save();


        // Simpan data ke tabel pasien
        $pasien = new Pasien();
        $pasien->name = $user->name; // Simpan name dari user
        $pasien->keluhan = $validated['keluhan']; // Simpan keluhan dari reservasi
        $pasien->dokter = $validated['dokter'];
        $pasien->save();

        return redirect()->back()->with('success', 'Pesan reservasi berhasil disimpan.');
    }

    public function getPasien($id)
    {
        $pasien = Pasien::findOrFail($id);
        return response()->json($pasien);
    }

    public function updatePasien(Request $request)
    {
        // Log 
        Log::info($request->all());

        // Validate request
        $validated = $request->validate([
            'id' => 'required|integer|exists:pasien,id',
            'keluhan' => 'required|string|max:255',
            'obat' => 'required|string|max:255',
            'hasil_pemeriksaan' => 'required|string|max:255',
        ]);

        $pasien = Pasien::findOrFail($validated['id']);
        $pasien->obat = $validated['obat'];
        $pasien->hasil_pemeriksaan = $validated['hasil_pemeriksaan'];
        $pasien->save();

        return redirect()->back()->with('success', 'Edit data pasien berhasil disimpan.');
    }
}
