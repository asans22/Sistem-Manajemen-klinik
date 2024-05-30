<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData=[ 
            [
            'name'=>'ahmad',
            'email'=>'ahmadsyahrmdn@gmail.com',
            'role'=>'admin',
            'no_hp'=>'087801482963',
            'alamat'=>'Jalan Utama Gampong Rukoh',
            'password'=>bcrypt('123456')
        ], 
        //  [
        //     'name'=>'agil',
        //     'email'=>'agil@gmail.com',
        //     'role'=>'user',
        //     'no_hp'=>'087801481212',
        //     'alamat'=>'Blang Bintang',
        //     'password'=>bcrypt('123456')
        //  ],
        //  [
        //     'name'=>'dimas',
        //     'email'=>'dimas@gmail.com',
        //     'role'=>'dokter',
        //     'no_hp'=>'087801481313',
        //     'alamat'=>'Blang Bintang',
        //     'password'=>bcrypt('123456')
        // ]
        ];

        foreach ($userData as $key => $value) {
           User::create($value);
        }
    }
}
