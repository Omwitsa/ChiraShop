<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(DB::table('sub_categories')->count() == 0){
            DB::table('sub_categories')->insert([
                [
                    'Name' => 'BRONZE',
                    'Category' => 'AAA ROSES',
                    'HeadSize' => '',
                ],
                [
                    'Name' => 'SILVER',
                    'Category' => 'AAA ROSES',
                    'HeadSize' => '',
                ],
                [
                    'Name' => 'SPRAY ROSES',
                    'Category' => 'AAA ROSES',
                    'HeadSize' => '',
                ],
                [
                    'Name' => 'PLATINUM',
                    'Category' => 'BELLISSIMA',
                    'HeadSize' => '',
                ],
                [
                    'Name' => 'GOLD',
                    'Category' => 'BELLISSIMA',
                    'HeadSize' => '',
                ],
                [
                    'Name' => 'GOLD+',
                    'Category' => 'BELLISSIMA',
                    'HeadSize' => '',
                ],
                [
                    'Name' => 'CHRYSANTHEMUMS',
                    'Category' => 'WILD BLOOMS',
                    'HeadSize' => '',
                ],
                [
                    'Name' => 'MATHIOLAS',
                    'Category' => 'WILD BLOOMS',
                    'HeadSize' => '',
                ],
                [
                    'Name' => 'CARNATIONS',
                    'Category' => 'WILD BLOOMS',
                    'HeadSize' => '',
                ],
                [
                    'Name' => 'AAA ROSES',
                    'Category' => 'MIXED BOX',
                    'HeadSize' => '',
                ],
                [
                    'Name' => 'BELLISSIMA',
                    'Category' => 'MIXED BOX',
                    'HeadSize' => '',
                ],
                [
                    'Name' => 'WILD BLOOMS',
                    'Category' => 'MIXED BOX',
                    'HeadSize' => '',
                ],
                [
                    'Name' => 'BOUQUET',
                    'Category' => 'MIXED BOX',
                    'HeadSize' => '',
                ],
            ]);
        }
    }
}
