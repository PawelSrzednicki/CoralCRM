<?php

use Illuminate\Database\Seeder;

class PltblLeadStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pltbl_lead_statuses')->insert(
            [
                [
                "value"=> "Appointment Scheduled"
                ],
                [
                "value"=> "Qualified To Buy"
                ],
                [
                "value"=> "Presentation Scheduled"
                ],
                [
                "value"=> "Decision Maker Bought-In"
                ],
                [
                "value"=> "Contract Sent"
                ],
                [
                "value"=> "Closed Won"
                ],
                [
                "value"=> "Closed Lost"
                ]
                ]
        );
    }
}
