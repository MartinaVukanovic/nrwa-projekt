<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Insert product_type data
        DB::table('product_types')->insert([
            ['product_type_cd' => 'ACCOUNT', 'name' => 'Customer Accounts'],
            ['product_type_cd' => 'LOAN', 'name' => 'Individual and Business Loans'],
            ['product_type_cd' => 'INSURANCE', 'name' => 'Insurance Offerings']
        ]);

        // Insert product data
        DB::table('products')->insert([
            ['product_cd' => 'CHK', 'name' => 'checking account', 'product_type_cd' => 'ACCOUNT', 'date_offered' => '2000-01-01'],
            ['product_cd' => 'SAV', 'name' => 'savings account', 'product_type_cd' => 'ACCOUNT', 'date_offered' => '2000-01-01'],
            ['product_cd' => 'MM', 'name' => 'money market account', 'product_type_cd' => 'ACCOUNT', 'date_offered' => '2000-01-01'],
            ['product_cd' => 'CD', 'name' => 'certificate of deposit', 'product_type_cd' => 'ACCOUNT', 'date_offered' => '2000-01-01'],
            ['product_cd' => 'MRT', 'name' => 'home mortgage', 'product_type_cd' => 'LOAN', 'date_offered' => '2000-01-01'],
            ['product_cd' => 'AUT', 'name' => 'auto loan', 'product_type_cd' => 'LOAN', 'date_offered' => '2000-01-01'],
            ['product_cd' => 'BUS', 'name' => 'business line of credit', 'product_type_cd' => 'LOAN', 'date_offered' => '2000-01-01'],
            ['product_cd' => 'SBL', 'name' => 'small business loan', 'product_type_cd' => 'LOAN', 'date_offered' => '2000-01-01']
        ]);

        // Insert department data
        DB::table('departments')->insert([
            ['dept_id' => null, 'name' => 'Operations'],
            ['dept_id' => null, 'name' => 'Loans'],
            ['dept_id' => null, 'name' => 'Administration'],
            ['dept_id' => null, 'name' => 'IT']
        ]);
    }
}
