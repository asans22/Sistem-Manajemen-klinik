<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';
    protected $fillable = [
        'name',
        'email',  
        'alamat',
        'dokter', 
        'spesialis',
        'jadwal',
        'tanggal',
        'keluhan',
    ];
}
