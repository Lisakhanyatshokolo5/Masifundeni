<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Spatie roles
        $roles = ['admin', 'instructor', 'student'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Admin
        $admin = User::factory()->create([
            'name'  => 'Admin User',
            'email' => 'admin@sms.test',
            'role'  => 'admin',
        ]);
        $admin->assignRole('admin');

        // Instructor
        $instructor = User::factory()->create([
            'name'  => 'Jane Instructor',
            'email' => 'instructor@sms.test',
            'role'  => 'instructor',
        ]);
        $instructor->assignRole('instructor');

        // Student
        $student = User::factory()->create([
            'name'  => 'John Student',
            'email' => 'student@sms.test',
            'role'  => 'student',
        ]);
        $student->assignRole('student');

        User::factory()->count(20)->student()->create()->each(function ($user) {
            $user->assignRole('student');
        });
 
    }
    
}