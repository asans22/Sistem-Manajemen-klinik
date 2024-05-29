<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Dokter;
use App\Models\User;
use App\Models\Reservasi;
use App\Models\Pasien;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class halamanAdminController extends Controller
{
    public function adminDokter()
    {
        $dokters = Dokter::all();
        return view('admin.dokter', compact('dokters'));
    }

    public function adminPasien()
    {
        $pasien = Reservasi::all(); // Mengambil semua data pasien dari tabel pasien
        return view('admin.pasien', compact('pasien'));
    }

    public function showObat()
    {
        $obats = Obat::all();
        return view('admin.obat', compact('obats'));
    }

    public function storeObat(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'stok' => 'required|integer',
        ]);

        $obat = new Obat();
        $obat->name = $validated['name'];
        $obat->jenis = $validated['jenis'];
        $obat->stok = $validated['stok'];
        $obat->save();

        return redirect()->route('adminObat')->with('success', 'Data obat berhasil ditambahkan!');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:obats,id',
            'name' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'stok' => 'required|integer',
        ]);

        $obat = Obat::findOrFail($validated['id']);
        $obat->name = $validated['name'];
        $obat->jenis = $validated['jenis'];
        $obat->stok = $validated['stok'];
        $obat->save();

        return redirect()->route('adminObat')->with('success', 'Data obat berhasil diupdate!');
    }

    public function getObat($id)
    {
        $obat = Obat::findOrFail($id);
        return response()->json($obat);
    }

    public function obatDestroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('adminObat')->with('success', 'Data obat berhasil dihapus!');
    }

    public function storeDokter(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|max:255|unique:dokters,email',
            'id_dokter' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'jadwal' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ukuran gambar maksimum 2MB    
        ]);

        // Mengunggah gambar dan menyimpannya di direktori storage
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $dokter = new Dokter();
        $dokter->email = $validated['email'];
        $dokter->id_dokter = $validated['id_dokter'];
        $dokter->name = $validated['name'];
        $dokter->alamat = $validated['alamat'];
        $dokter->no_hp = $validated['no_hp'];
        $dokter->password = Hash::make($validated['password']);
        $dokter->spesialis = $validated['spesialis'];
        $dokter->deskripsi = $validated['deskripsi'];
        $dokter->jadwal = $validated['jadwal'];
        $dokter->image = $imageName;
        $dokter->save();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'role' => 'dokter',
        ]);

        return redirect()->back()->with('success', 'Dokter dan akun pengguna berhasil dibuat');
    }

    public function updateDokter(Request $request)
    {

        Log::info($request->all());

        $validated = $request->validate([
            'id' => 'required|integer|exists:dokters,id',
            'email' => 'required|string|max:255|unique:dokters,email,' . $request->id,
            'id_dokter' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'jadwal' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Ukuran gambar maksimum 2MB
        ]);

        $dokter = Dokter::findOrFail($validated['id']);
        $dokter->email = $validated['email'];
        $dokter->id_dokter = $validated['id_dokter'];
        $dokter->name = $validated['name'];
        $dokter->alamat = $validated['alamat'];
        $dokter->no_hp = $validated['no_hp'];
        $dokter->password = Hash::make($validated['password']);
        $dokter->spesialis = $validated['spesialis'];
        $dokter->deskripsi = $validated['deskripsi'];
        $dokter->jadwal = $validated['jadwal'];
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($dokter->image && Storage::exists('public/images/' . $dokter->image)) {
                Storage::delete('public/images/' . $dokter->image);
            }

            // Simpan gambar baru
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $dokter->image = $imageName;
        }
        $dokter->save();

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->no_hp = $request->no_hp;
            $user->alamat = $request->alamat;
            if ($request->has('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();
        }

        return redirect()->route('adminDokter')->with('success', 'Data dokter berhasil diupdate!');
    }


    public function getDokter($id)
    {
        $dokter = Dokter::find($id);
        if ($dokter) {
            return response()->json($dokter);
        } else {
            return response()->json(['error' => 'Dokter tidak ditemukan'], 404);
        }
    }

    public function dokterDestroy($id)
    {
        $dokter = Dokter::findOrFail($id);

        // Hapus gambar dokter jika ada
        if ($dokter->image && Storage::exists('public/images/' . $dokter->image)) {
            Storage::delete('public/images/' . $dokter->image);
        }

        $dokter->delete();

        // Hapus juga pengguna (user) terkait jika diperlukan
        $user = User::where('email', $dokter->email)->first();
        if ($user) {
            $user->delete();
        }

        return redirect()->route('adminDokter')->with('success', 'Data dokter berhasil dihapus!');
    }
}
