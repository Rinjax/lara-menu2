<?php

namespace Global4Communications\LaraMenu\Database\Seeds;

use Illuminate\Database\Seeder;

class CoreMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SeedAffinity::class);

        $this->call(SeedCallReports::class);

        $this->call(SeedDev::class);

        $this->call(SeedDevelopment::class);

        $this->call(SeedFinance::class);

        $this->call(SeedIdealBroadband::class);

        $this->call(SeedServices::class);

        $this->call(SeedStatistics::class);

        $this->call(SeedUsers::class);

        $this->call(SeedWallboards::class);

        $this->call(SeedWebsite::class);

        $this->call(SeedWeeklyBroadband::class);
    }
}
