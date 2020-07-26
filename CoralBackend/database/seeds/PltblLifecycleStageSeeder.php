<?php

use Illuminate\Database\Seeder;

class PltblLifecycleStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pltbl_lifecyclestages')->insert(
            [
                [
                "value"=> "Subscriber"
                ],
                [
                "value"=> "Lead",
                ],
                [
                "value"=> "Marketing Qualified Lead",
                ],
                [
                "value"=> "Sales Qualified Lead"
                ],
                [
                "value"=> "Opportunity"
                ],
                [
                "value"=> "Customer"
                ],
                [
                "value"=> "Evangelist"
                ],
                [
                "value"=> "Other"
                ]
                ]
        );
    }
}