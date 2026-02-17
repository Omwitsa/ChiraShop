<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // check if table users is empty
        if(DB::table('categories')->count() == 0){

            DB::table('categories')->insert([
                // [
                //     'name' => 'AAA ROSES',
                //     'farm' => 'Simba',
                // ],
                // [
                //     'name' => 'BELLISSIMA',
                //     'farm' => 'Chui',
                // ],
                // [
                //     'name' => 'WILD BLOOMS',
                //     'farm' => 'Simba',
                // ],
                [
                    'name' => 'MIXED BOX',
                    'farm' => 'Simba',
                    'picUrl' => '5.png',
                ]
            ]);
        }
    }
}
