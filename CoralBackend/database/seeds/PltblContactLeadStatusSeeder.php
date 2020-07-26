<?php

use Illuminate\Database\Seeder;

class PltblContactLeadStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pltbl_contact_lead_statuses')->insert(
            [
                [
                "value"=> "NEW"
                ],
                [
                "value"=> "OPEN"
                ],
                [
                "value"=> "In Progress"
                ],
                [
                "value"=> "Open Deal"
                ],
                [
                "value"=> "Unqualified"
                ],
                [
                "value"=> "Working"
                ],
                [
                "value"=> "MQL"
                ],
                [
                "value"=> "Enroll"
                ],
                [
                "value"=> "ReEnroll"
                ],
                [
                "value"=> "Cita",
                ],
                [
                "value"=> "Assist",
                ],
                [
                "value"=> "No asAssististió",
                ],
                [
                "value"=> "Won",
                ]
                ]
        );
    }
}