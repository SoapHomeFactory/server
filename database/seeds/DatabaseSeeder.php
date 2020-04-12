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
        $this->call(FatSeeder::class);
        $this->call(FatTypeSeeder::class);
        $this->call(LyeSeeder::class);
        $this->call(PerfumeTypeSeeder::class);
        $this->call(WaterSeeder::class);
    }
}
