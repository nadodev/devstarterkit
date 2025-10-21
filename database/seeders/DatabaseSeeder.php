<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            CourseSeeder::class,
            DemoSeeder::class,
        ]);

        // Criar usuários de exemplo
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@eduplatform.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        \App\Models\User::create([
            'name' => 'João Silva',
            'email' => 'joao@example.com',
            'password' => bcrypt('password'),
            'role' => 'instructor',
        ]);

        \App\Models\User::create([
            'name' => 'Maria Santos',
            'email' => 'maria@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
        ]);
    }
}
