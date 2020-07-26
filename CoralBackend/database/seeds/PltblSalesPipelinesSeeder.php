<?php

use Illuminate\Database\Seeder;

class PltblSalesPipelinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pltbl_sales_pipelines')->insert(
            [
                [
                "value"=> "Presentation Scheduled"
                ],
                [
                "value"=> "Contract Sent"
                ],
                [
                "value"=> "Closed Lost"
                ],
                [
                "value"=> "Appointment Scheduled"
                ],
                [
                "value"=> "Qualified To Buy"
                ],
                [
                "value"=> "Decision Maker Bought-In"
                ],
                [
                "value"=> "Closed Won"
                ]
            ]
        );
    }
}