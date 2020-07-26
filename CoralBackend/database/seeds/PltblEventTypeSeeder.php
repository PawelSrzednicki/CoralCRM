<?php

use Illuminate\Database\Seeder;

class PltblEventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pltbl_event_types')->insert([
           ['value' => 'Meeting'],
           ['value' => 'Call'],
           ['value' => 'Event']
        ]);
    }
}
