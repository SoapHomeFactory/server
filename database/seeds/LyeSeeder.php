<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LyeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lyes')->insert([
          [
            'name' => 'hydroxyde de sodium',
            'formula' => 'NaOH'
          ],
          [
            'name' => 'hydroxyde de potassium',
            'formula' => 'KOH'
          ],
          [
            'name' => 'lessive de soude',
            'formula' => 'null'
          ]
        ]);
    }
}
