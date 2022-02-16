<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        $data = [
            [
                
                'pname' => 'iPhone 14',
                'ptype' => 1,
                'price' => 39900,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'pname' => 'Galaxy S20',
                'ptype' => 1,
                'price' => 25900,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
             ],
             [
                
                 'pname' => 'LG Smart TV',
                 'ptype' => 2,
                 'price' => 30900,
                 'created_at' => Carbon::now(),
                 'updated_at' => Carbon::now(),
             ],
             [
                
                 'pname' => 'Samsung Smart TV',
                 'ptype' => 2,
                 'price' => 40900,
                 'created_at' => Carbon::now(),
                 'updated_at' => Carbon::now(),
             ],
            
        ];
        DB::table('products')->insert($data);
        
    }
}
