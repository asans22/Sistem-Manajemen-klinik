<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokters'; // Nama tabel di database
    protected $fillable = [
        'email', 
        'id_dokter', 
        'name', 
        'alamat', 
        'no_hp', 
        'password', 
        'spesialis',
        'deskripsi',
        'jadwal',
        'image',
    ];
}
