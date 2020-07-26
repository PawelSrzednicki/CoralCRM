<?php

use Illuminate\Database\Seeder;

class PltblTicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pltbl_ticket_statuses')->insert(
            [
                [
                "value"=> "New"
                ],
                [
                "value"=> "Waiting on contact"
                ],
                [
                "value"=> "Waiting on us"
                ],
                [
                "value"=> "Closed"
                ]
            ]
        );
    }
}