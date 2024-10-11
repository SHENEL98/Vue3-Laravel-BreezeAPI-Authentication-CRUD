<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin Full',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'level' => 'admin'
        ]);

        $role = Role::create(['name' => 'admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        // Create Roles
        //$admin = Role::create(['name' => 'admin']);
        $staff = Role::create(['name' => 'staff']);
        $employee = Role::create(['name' => 'employee']);

         // Create Permissions
        Permission::create(['name' => 'view books']);
        Permission::create(['name' => 'edit books']);
        Permission::create(['name' => 'delete books']);
        Permission::create(['name' => 'create books']);

        // Assing Permissions to Roles
        //$admin->givePermissionTo(['view books', 'edit books', 'delete books', 'create books']);
        $staff->givePermissionTo(['view books', 'edit books']);
        $employee->givePermissionTo(['view books']);

    }
}
