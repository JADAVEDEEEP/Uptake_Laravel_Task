<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    
    public function run(): void
    {
        
         $permissions = [
            'approve-leave',
            'reject-leave',
            'view-leave-requests',
            'apply-leave',
            'cancel-leave',
        ];
        $roles = [
            'HR',
            'Employee',
        ];

        foreach ($permissions as $permission) {
            ModelsPermission::create(['name' => $permission]);
        }

     
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

     
        $hrRole = Role::where('name', 'HR')->first();
        $employeeRole = Role::where('name', 'Employee')->first();

     
        $hrRole->givePermissionTo([
            'approve-leave',
            'reject-leave',
            'view-leave-requests',
        ]); 

        $employeeRole->givePermissionTo([
            'apply-leave',
            'cancel-leave',
        ]); 
    }
    }

