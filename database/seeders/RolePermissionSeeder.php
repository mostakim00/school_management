<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'superadmin']);
        $permissions_with_group = [

            'user management' => [
                'user list view',
                'add user',
                'update user',
            ],
            'activity management' => [
                'activity log',
            ],
        ];

             foreach ($permissions_with_group as $group_name => $permissions) {
                 // Assign permissions to the role and specify the group_name
                 foreach ($permissions as $item) {
                     Permission::create([
                         'name' => $item,
                         'guard_name' => 'web',
                         'permission_group' => $group_name,
                     ]);
                 }

                 // You can also assign permissions to the role in bulk
                 $role->givePermissionTo($permissions);
             }


        $user = User::where('slug','super-admin')->first();
        $user->assignRole($role);

    }
}
