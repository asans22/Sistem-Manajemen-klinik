<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obats'; // Nama tabel di database
    protected $fillable = ['name', 'jenis', 'stok']; // Kolom yang bisa diisi
}
