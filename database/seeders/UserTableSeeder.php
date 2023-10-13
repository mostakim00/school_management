<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'full_name' => 'Super Admin',
                'slug' => Str::slug('Super Admin'),
                'email' => '3devs@gmail.com',
                'user_name' => 'sadmin',
                'status' => 1,
                'created_by'=>1,
                'password' => Hash::make('password'),
            ],
            [
                'full_name' => 'Block User',
                'slug' => Str::slug('Block User'),
                'email' => 'block@gmail.com',
                'user_name' => 'block',
                'status' => 0,
                'created_by'=>1,
                'password' => Hash::make('password'),
            ],
        ];
        DB::table('users')->insert($users );
        //User::factory()->count(1000)->create();

    }
}
