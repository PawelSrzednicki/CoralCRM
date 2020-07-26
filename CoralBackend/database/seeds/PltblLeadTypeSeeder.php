<?php

use Illuminate\Database\Seeder;

class PltblLeadTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pltbl_lead_types')->insert([
           ['value' => 'New Business'],
           ['value' => 'Existing Business'],
        ]);
    }
}
