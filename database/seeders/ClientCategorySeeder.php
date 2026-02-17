<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(DB::table('client_categories')->count() == 0){

            DB::table('client_categories')->insert([
                [
                    'name' => 'Inactive',
                ],
            ]);
        }
    }
}