<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    public function run(): void
    {
        $doctors = User::where('role', 'dokter')->get();

        foreach ($doctors as $doctor) {
            Doctor::firstOrCreate(
                ['user_id' => $doctor->id], // Ensure uniqueness by user_id
                [
                    'spesialisasi' => 'Cardiologist', // Default value
                    'jadwal' => 'Monday, 08:00 - 12:00 WIB' // Default value
                ]
            );
        }
    }
}
