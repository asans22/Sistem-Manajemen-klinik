<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\returnSelf;

class UserSessionControl extends Controller
{
    function landing(){
        return view("user/welcome");
    }

    
    function index(){
        return view("user/login");
    }
    function admin(){
        $users = User::all();
        return view("admin/akun", ['users' => $users]);
    }
    function home(){
        return view("user/home");
    }
    function dokter(){
        return view("dokter/pasien");
    }
    function dokterUser(){
        return view("user/Dokter");
    }
    function myAccount(){
        return view("user/Account");
    }
    function reservasi(){
       return view("user/reservasi");
    }
    function obatUser(){
        $obats = Obat::all();
       return view("user/obat",compact('obats'));
        
    }


    function login(Request $request){

        Session::flash('email',$request->email);

        $request->validate([
            'email'=> 'required',
            'password'=> 'required',
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi',
        ]);
    
        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password
        ];
    
        if(Auth::attempt($credentials)){
            Session::flash('success', 'Berhasil login');

            if(Auth::user()->role =='admin'){
                return redirect('admin')->with('success','Berhasil login'); // Jika login berhasil, arahkan ke halaman yang dituju
            }elseif(Auth::user()->role == 'user'){
                return redirect('home')->with('success','Berhasil login'); // Jika login berhasil, arahkan ke halaman yang dituju
            }elseif(Auth::user()->role=='dokter'){
                return redirect('dokter')->with('success','Berhasil login');
            }

           
        }else{
            return redirect('login')->withErrors('Username dan Password yang dimasukkan tidak valid')->withInput(); // Jika login gagal, arahkan kembali ke halaman login dengan pesan kesalahan
        }
    }
        function registrasi(){
        return view("user/registrasi");
    }


    function create(Request $request){
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
    
        $request->validate([
            'name'=> 'required',
            'no_hp'=> 'required',
            'alamat'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:5',
        ],[
            'name.required'=>'Nama lengkap wajib diisi',
            'no_hp.required'=>'No HP wajib diisi',
            'alamat.required'=>'Alamat lengkap wajib diisi',
            'email.required'=>'Email wajib diisi',
            'email.email'=>'Silahkan masukkan email yang valid',
            'email.unique'=>'Email sudah ada, masukkan email lain',
            'password.required'=>'Password wajib diisi',
            'password.min'=>'Password minimal terdiri dari 6 karakter',
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
    
      
        function logout(){
        Auth::logout();
        return redirect('/');
    }
}
