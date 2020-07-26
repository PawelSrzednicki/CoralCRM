<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class, 
            PltblCompanyStatusSeeder::class,
            PltblContactLeadStatusSeeder::class,
            PltblContactStatusSeeder::class,
            PltblEventTypeSeeder::class,
            PltblIndustrySeeder::class,
            PltblLeadStatusSeeder::class,
            PltblLeadTypeSeeder::class,
            PltblLifecycleStageSeeder::class,
            PltblSalesPipelinesSeeder::class,
            PltblTicketPrioritySeeder::class,
            PltblTicketStatusSeeder::class,
            ]);
    }
}
