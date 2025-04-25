<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'student_id' => '2023-00001-CM',
                'batch' => '2023',
                'group' => 'A',
                'student_number' => '0001',
                'training_code' => 'CM',
                'fname' => 'Juan',
                'lname' => 'Dela Cruz',
                'email' => 'juan.delacruz@student.passerellesnumeriques.org',
            ],
            [
                'student_id' => '2023-00002-CM',
                'batch' => '2023',
                'group' => 'A',
                'student_number' => '0002',
                'training_code' => 'CM',
                'fname' => 'Maria',
                'lname' => 'Santos',
                'email' => 'maria.santos@student.passerellesnumeriques.org',
            ],
            [
                'student_id' => '2023-00003-CM',
                'batch' => '2023',
                'group' => 'B',
                'student_number' => '0003',
                'training_code' => 'CM',
                'fname' => 'Pedro',
                'lname' => 'Penduko',
                'email' => 'pedro.penduko@student.passerellesnumeriques.org',
            ],
            [
                'student_id' => '2023-00004-CM',
                'batch' => '2023',
                'group' => 'B',
                'student_number' => '0004',
                'training_code' => 'CM',
                'fname' => 'Ana',
                'lname' => 'Reyes',
                'email' => 'ana.reyes@student.passerellesnumeriques.org',
            ],
            [
                'student_id' => '2023-00005-CM',
                'batch' => '2023',
                'group' => 'C',
                'student_number' => '0005',
                'training_code' => 'CM',
                'fname' => 'Carlo',
                'lname' => 'Garcia',
                'email' => 'carlo.garcia@student.passerellesnumeriques.org',
            ],
            [
                'student_id' => '2022-00001-CM',
                'batch' => '2022',
                'group' => 'A',
                'student_number' => '0001',
                'training_code' => 'CM',
                'fname' => 'Michelle',
                'lname' => 'Lopez',
                'email' => 'michelle.lopez@student.passerellesnumeriques.org',
            ],
            [
                'student_id' => '2022-00002-CM',
                'batch' => '2022',
                'group' => 'A',
                'student_number' => '0002',
                'training_code' => 'CM',
                'fname' => 'Ryan',
                'lname' => 'Torres',
                'email' => 'ryan.torres@student.passerellesnumeriques.org',
            ],
            [
                'student_id' => '2022-00003-CM',
                'batch' => '2022',
                'group' => 'B',
                'student_number' => '0003',
                'training_code' => 'CM',
                'fname' => 'Sofia',
                'lname' => 'Ramos',
                'email' => 'sofia.ramos@student.passerellesnumeriques.org',
            ],
            [
                'student_id' => '2021-00001-CM',
                'batch' => '2021',
                'group' => 'A',
                'student_number' => '0001',
                'training_code' => 'CM',
                'fname' => 'Miguel',
                'lname' => 'Bautista',
                'email' => 'miguel.bautista@student.passerellesnumeriques.org',
            ],
            [
                'student_id' => '2021-00002-CM',
                'batch' => '2021',
                'group' => 'A',
                'student_number' => '0002',
                'training_code' => 'CM',
                'fname' => 'Isabella',
                'lname' => 'Cruz',
                'email' => 'isabella.cruz@student.passerellesnumeriques.org',
            ],
        ];

        foreach ($students as $student) {
            // Create user first
            DB::table('users')->insert([
                'user_id' => $student['student_id'],
                'fname' => $student['fname'],
                'lname' => $student['lname'],
                'email' => $student['email'],
                'password' => Hash::make('pnphpassword'),  // Default password for all students
                'role' => 'student',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Then create student details
            DB::table('student_details')->insert([
                'user_id' => $student['student_id'],  // Using student_id as user_id
                'student_id' => $student['student_id'],
                'batch' => $student['batch'],
                'group' => $student['group'],
                'student_number' => $student['student_number'],
                'training_code' => $student['training_code'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
} 