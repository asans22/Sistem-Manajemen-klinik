<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;

class halamanAdminController extends Controller
{
    function adminDokter()
    {
        $doctors = Doctor::with('user')->get();
        return view("admin.dokter", compact('doctors'));
    }

    function adminObat(){
        return view("admin.obat");
    }
    function adminPasien(){
        return view("admin.pasien");
    }

    function index(){
        $data = User::all();
        return $data;

    }
}
