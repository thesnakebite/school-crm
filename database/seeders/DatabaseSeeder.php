<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\School;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Limpiar y crear directorio de logos
        Storage::disk('public')->deleteDirectory('logos');
        Storage::disk('public')->makeDirectory('logos');

        User::create([
            'name' => 'Admin',
            'email' => 'admin@technodac.com',
            'password' => Hash::make('password'),
        ]);

        School::factory(10)->create();
        Student::factory(300)->create();
    }
}
