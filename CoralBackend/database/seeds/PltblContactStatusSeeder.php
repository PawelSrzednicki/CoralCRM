<?php

use Illuminate\Database\Seeder;

class PltblContactStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pltbl_contact_statuses')->insert([
           ['value' => 'Active'],
           ['value' => 'Inactive']
        ]);
    }
}
