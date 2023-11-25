<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuario 1
        User::create([
            'rut' => '20545216-8',
            'name' => 'Ignacio',
            'lastname' => 'Avendaño',
            'email' => 'ignacioramirez.francisco@gmail.com',
            'points' => 10000,
        ]);

        // Usuario 2
        User::create([
            'rut' => '12345678-9',
            'name' => 'Juan',
            'lastname' => 'Pérez',
            'email' => 'juan.perez@example.com',
            'points' => 11000,
        ]);

        // Usuario 3
        User::create([
            'rut' => '23456789-0',
            'name' => 'Ana',
            'lastname' => 'López',
            'email' => 'ana.lopez@example.com',
            'points' => 12000,
        ]);

        // Usuario 4
        User::create([
            'rut' => '34567890-1',
            'name' => 'Carlos',
            'lastname' => 'Martínez',
            'email' => 'carlos.martinez@example.com',
            'points' => 13000,
        ]);

        // Usuario 5
        User::create([
            'rut' => '45678901-2',
            'name' => 'Elena',
            'lastname' => 'García',
            'email' => 'elena.garcia@example.com',
            'points' => 14000,
        ]);

        // Usuario 6
        User::create([
            'rut' => '56789012-3',
            'name' => 'Luis',
            'lastname' => 'Rodríguez',
            'email' => 'luis.rodriguez@example.com',
            'points' => 15000,
        ]);

        // Usuario 7
        User::create([
            'rut' => '67890123-4',
            'name' => 'Sofía',
            'lastname' => 'Fernández',
            'email' => 'sofia.fernandez@example.com',
            'points' => 16000,
        ]);

        // Usuario 8
        User::create([
            'rut' => '78901234-5',
            'name' => 'Pedro',
            'lastname' => 'Hernández',
            'email' => 'pedro.hernandez@example.com',
            'points' => 17000,
        ]);

        // Usuario 9
        User::create([
            'rut' => '89012345-6',
            'name' => 'Marta',
            'lastname' => 'Díaz',
            'email' => 'marta.diaz@example.com',
            'points' => 18000,
        ]);

        // Usuario 10
        User::create([
            'rut' => '90123456-7',
            'name' => 'Javier',
            'lastname' => 'Ruiz',
            'email' => 'javier.ruiz@example.com',
            'points' => 19000,
        ]);
    }
}
