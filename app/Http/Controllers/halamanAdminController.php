<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class halamanAdminController extends Controller
{
    public function adminDokter(){
        return view('admin.dokter');
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

}
