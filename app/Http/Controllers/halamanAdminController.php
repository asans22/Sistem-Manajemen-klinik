<?php

namespace App\Http\Controllers;

use App\Models\akun;
use Illuminate\Http\Request;

class halamanAdminController extends Controller
{
    function adminDokter(){
        return view("admin.dokter");
    }
    function adminObat(){
        return view("admin.obat");
    }
    function adminPasien(){
        return view("admin.pasien");
    }

    function index(){
        $data = akun::all();
        return $data;

    }
}
