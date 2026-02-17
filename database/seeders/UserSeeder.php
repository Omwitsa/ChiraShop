<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Constants\Roles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'usercode' => 'Admin',
        //     'password' => Hash::make('sysadmin'),
        //     'email' => 'itsupport@aaagrowers.co.ke',
        //     'role' => Roles::ADMIN->value,
        // ]);

        if(DB::table('users')->count() == 0){

            DB::table('users')->insert([
                [
                    'usercode' => 'Admin',
                    'password' => Hash::make('sysadmin'),
                    'email' => 'itsupport@aaagrowers.co.ke',
                    'role' => Roles::ADMIN->value,
                ]
            ]);
        }
    }
}
