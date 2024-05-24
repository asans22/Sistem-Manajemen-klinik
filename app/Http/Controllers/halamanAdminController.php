<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Dokter;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class halamanAdminController extends Controller
{
    public function adminDokter(){
        $dokters = Dokter::all();
        return view('admin.dokter', compact('dokters'));
    }
  
    public function adminPasien(){
        return view('admin.pasien');
    }

    public function showObat(){
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

    public function getObat($id) {
        $obat = Obat::findOrFail($id);
        return response()->json($obat);
    }
    
    public function destroy($id)
{
    $obat = Obat::findOrFail($id);
    $obat->delete();

    return redirect()->route('adminObat')->with('success', 'Data obat berhasil dihapus!');
}

public function storeDokter(Request $request){
    $validated = $request->validate([
        'email' => 'required|string|max:255|unique:dokters,email',
        'id_dokter' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'no_hp' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        'spesialis' => 'required|string|max:255',
        'jadwal' => 'required|string|max:255',
        
    ]);

    $dokter = new Dokter();
    $dokter->email = $validated['email'];
    $dokter->id_dokter = $validated['id_dokter'];
    $dokter->name = $validated['name'];
    $dokter->alamat = $validated['alamat'];
    $dokter->no_hp = $validated['no_hp'];
    $dokter->password = Hash::make($validated['password']);
    $dokter->spesialis = $validated['spesialis'];
    $dokter->jadwal = $validated['jadwal'];
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
    $validated = $request->validate([
        'id' => 'required|integer|exists:dokters,id',
        'email' => 'required|string|max:255|unique:dokters,email,' . $request->id,
        'id_dokter' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'no_hp' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        'spesialis' => 'required|string|max:255',
        'jadwal' => 'required|string|max:255',
    ]);

    $dokter = Dokter::findOrFail($validated['id']);
    $dokter->email = $validated['email'];
    $dokter->id_dokter = $validated['id_dokter'];
    $dokter->name = $validated['name'];
    $dokter->alamat = $validated['alamat'];
    $dokter->no_hp = $validated['no_hp'];
    $dokter->password = $validated['password'];
    $dokter->spesialis = $validated['spesialis'];
    $dokter->jadwal = $validated['jadwal'];
    $dokter->save();

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



}
