<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Staff;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
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
        // 1. Seed Departments and Services FIRST
        $this->call([
            DepartmentSeeder::class,
            ServiceSeeder::class,
        ]);

        // 2. NOW we can safely fetch the first department because it exists!
        $department = Department::first(); 

        // 3. Create Admin Staff
        $user = User::create([
            'name' => 'Admin Staff',
            'email' => 'staff@example.com',
            'password' => Hash::make('password123'),
        ]);

        Staff::create([
            'user_id'      => $user->id,
            'department_id'=> $department->id, // No longer null!
            'employee_id'  => 'EMP-0001',
            'position'     => 'Front Desk',
            'phone'        => '09123456789',
            'is_active'    => true,
        ]);

        // 4. Create Doctor
        $doctorUser = User::firstOrCreate(
            ['email' => 'doctor@example.com'],
            [
                'name'     => 'Doctor janbai',
                'password' => Hash::make('password123'),
            ]
        );

        if (! $doctorUser->staff) {
            Staff::create([
                'user_id'       => $doctorUser->id,
                'department_id' => $department->id, // No longer null!
                'employee_id'   => 'EMP-0002',
                'position'      => 'Doctor',
                'phone'         => '09187654321',
                'is_active'     => true,
            ]);
        }
    }
}
