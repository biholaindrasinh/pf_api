<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->truncate();
        DB::table('transactions')->insert([
        	['name' => 'Transaction 1', 'date' => Carbon::parse('2000-01-01'),'amount' => 100,'category_id' => 1,'account_id' => 1,'transaction_type' => "income",'description' => "Desciption section 1", 'user_id' => 1],
        	['name' => 'Transaction 2', 'date' => Carbon::parse('2000-01-01'),'amount' => 100,'category_id' => 2,'account_id' => 2,'transaction_type' => "expense",'description' => "Desciption section 2", 'user_id' => 1],
        ]);
    }
}
