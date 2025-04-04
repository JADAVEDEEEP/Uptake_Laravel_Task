<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class CreateUserSeeder extends Seeder
{
   
    public function run(): void
    {
        $hrRole = ModelsRole::where('name', 'HR')->first();

    
        $hrUser = User::firstOrCreate(
            ['email' => 'hr@example.com'], 
            [
                'name' => 'HR User',
                'email' => 'hr@example.com', 
                'dob' => Carbon::create('1990', '01', '01'), 
                'password' => bcrypt('hrpassword123'), 
                'role_id' => $hrRole->id,  
                'sick_leave_balance' => 10, 
                'casual_leave_balance' => 12, 
            ]
        );
        $hrUser->assignRole($hrRole);

        
        $employeeRole = ModelsRole::where('name', 'Employee')->first();

    
        $employeeUser = User::firstOrCreate(
            ['email' => 'employee@example.com'], 
            [
                'name' => 'Employee User',
                'email' => 'employee@example.com', 
                'dob' => Carbon::create('1995', '05', '15'), 
                'password' => bcrypt('employeepassword123'), 
                'role_id' => $employeeRole->id,  
                'sick_leave_balance' => 10, 
            ]
        );
        $employeeUser->assignRole($employeeRole); 
    }
    }
