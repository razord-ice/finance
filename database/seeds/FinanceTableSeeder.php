<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FinanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('finance')->insert([
            'trans_name' => 'reza',
            'amount' => 100000,
            'status' => 'Debit',
            'created_at' => '2024-06-25 20:14:40',
        ]);
    }
}
