<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StudentDetailsSeeder::class,
            OffenseCategorySeeder::class,
            SeveritySeeder::class,
            ViolationTypeSeeder::class,
            TestViolationsSeeder::class,
        ]);
        // User::factory(10)->create();

        User::factory()->create([
            'user_id' => 'TEST001',
            'fname' => 'Test',
            'lname' => 'User',
            'email' => 'test@example.com',
            'role' => 'admin',
            'status' => 'active',
            'password' => bcrypt('password'),
            'is_temp_password' => true
        ]);
    }
}
