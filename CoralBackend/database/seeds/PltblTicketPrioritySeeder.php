<?php

use Illuminate\Database\Seeder;

class PltblTicketPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pltbl_ticket_priorities')->insert([
           ['value' => 'Low'],
           ['value' => 'Medium'],
           ['value' => 'High']
        ]);
    }
}