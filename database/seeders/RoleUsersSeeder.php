<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\{SuperAdmin, Management, Principal, Teacher, StaffMember};

class RoleUsersSeeder extends Seeder
{
    public function run(): void
    {
        SuperAdmin::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@yopmail.com',
            'password' => Hash::make('123456789'),
            'is_active' => true,
        ]);

        Management::create([
            'name' => 'Manager',
            'email' => 'manager@yopmail.com',
            'password' => Hash::make('123456789'),
            'is_active' => true,
        ]);

        Principal::create([
            'name' => 'Principal',
            'email' => 'principal@yopmail.com',
            'password' => Hash::make('123456789'),
            'is_active' => true,
        ]);

        Teacher::create([
            'name' => 'Teacher',
            'email' => 'teacher@yopmail.com',
            'password' => Hash::make('123456789'),
            'is_active' => true,
        ]);

        StaffMember::create([
            'name' => 'Staff Member',
            'email' => 'staff@yopmail.com',
            'password' => Hash::make('123456789'),
            'is_active' => true,
        ]);

        SuperAdmin::factory()->count(2)->create();
        Management::factory()->count(3)->create();
        Principal::factory()->count(3)->create();
        Teacher::factory()->count(5)->create();
        StaffMember::factory()->count(4)->create();
    }
}
