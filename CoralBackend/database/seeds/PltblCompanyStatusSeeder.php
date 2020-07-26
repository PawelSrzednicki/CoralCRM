<?php

use Illuminate\Database\Seeder;

class PltblCompanyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pltbl_company_statuses')->insert([
           ['value' => 'New'],
           ['value' => 'Open'],
           ['value' => 'In Progress'],
           ['value' => 'Unqualified']
        ]);
    }
}
