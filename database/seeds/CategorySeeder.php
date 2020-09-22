<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('categories')->truncate();
        DB::table('categories')->insert([
        	['name' => 'category1', 'type' => "income"],
        	['name' => 'category2', 'type' => "expense"],
            ['name' => 'category3', 'type' => "income"],
            ['name' => 'category4', 'type' => "expense"],
        ]);
    }
}
