<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('user')->get(); // Mengambil semua data dokter dengan data pengguna terkait

        return view('nama.blade.anda', compact('doctors'));
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'no_hp' => 'required',
            'alamat' => 'required',
            'spesialisasi' => 'required',
            'deskripsi'=> 'required',
            'jadwal' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'dokter',
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
        ]);

        Doctor::create([
            'user_id' => $user->id,
            'spesialisasi' => $request->spesialisasi,
            'deskripsi'=> $request->deskripsi,
            'jadwal' => $request->jadwal,
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully.');
    }

    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $doctor->user_id,
            'no_hp' => 'required',
            'alamat' => 'required',
            'spesialisasi' => 'required',
            'deskripsi'=> 'required',
            'description' => 'required',
            'jadwal' => 'required',
        ]);

        $doctor->user->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        $doctor->update([
            'spesialisasi' => $request->spesialisasi,
            'deskripsi'=> $request->deskripsi,
            'jadwal' => $request->jadwal,
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->user->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}
