<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Obat;
use Illuminate\Support\Facades\DB;

class halamanAdminController extends Controller
{
    function adminDokter(){
        return view("admin.dokter");
    }
  
    function adminPasien(){
        return view("admin.pasien");
    }

    public function showObat(){
        $obats = Obat::all();
        return view('admin.obat', compact('obats'));
    }
    

    public function storeObat(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'stok' => 'required|integer',
        ]);

        // Simpan data obat
        $obat = new Obat();
        $obat->name = $validated['name'];
        $obat->jenis = $validated['jenis'];
        $obat->stok = $validated['stok'];
        $obat->save();

        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('adminObat')->with('success', 'Data obat berhasil ditambahkan!');
    }

   
}
