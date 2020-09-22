<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('accounts')->truncate();
        DB::table('accounts')->insert([
        	['name' => 'account1' , 'user_id' => 1],
        	['name' => 'account2', 'user_id' => 1],
        ]);
    }
}
