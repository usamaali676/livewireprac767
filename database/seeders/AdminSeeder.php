<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'creator',
        ]);
        Department::create([
            'name' => 'Administration',
        ]);
        Designation::create([
            'name' => 'Super Admin',
        ]);
        Vehicle::create([
            'vehicle_type' => 'Car',
            'vehicle_number' => '8872',
            'description' => 'Audi Etron GT',
        ]);
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'role_id' => '1',
            'password' => Hash::make("11111111"),
            'dept_id' => '1',
            'desig_id' => '1',
            'vehicle_id' => '1',
            'fatherName' => 'Admin',
            'cnic' => '3520286586467',
            'phone' => '+923234428990',
            'offEmail' => 'admin@admin.com',
            'perEmail' => 'admin@admin.com',
            'dob' => '08-08-2001',
            'joindate' => '14-12-2020',
            'currAddress' => 'Al Fateh Colony BhaghatPura Lahore, Punjab',
            'perAddress' => 'Al Fateh Colony BhaghatPura Lahore, Punjab',
            'lastDegree' => 'Bscs',
            'currDegree' => 'MPhill',
            'emgContactName' => '+923234428990',
            'emgContactRelation' => 'Father',
            'emgContactNumber' => '+923234428990',
            'gender' => 'Male',
            'employment_type' => '1',
            'marital_status' => '1',
            'is_agent' => '1',
            'is_closer' => '1',
            'basic_salary' => '50000',
            'Security' => '20000',
            'ph_cycle_from' => '01-01-2024',
            'ph_cycle_to' => '31-12-2024',
            'total_holiday' => '12',
            'blood_group' => 'A+',
            'documents_desc' => 'Matric Degree',
            'ph_cycle' => '1',

        ]);
    }
}
