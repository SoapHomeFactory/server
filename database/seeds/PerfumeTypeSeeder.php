<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PerfumeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfume_types')->insert([
          [
            'type' => 'huile essentielle'
          ],
          [
            'type' => 'fragrance'
          ],
          [
            'type' => 'hydrolat'
          ],
          [
            'type' => 'extrait aromatique'
          ]
        ]);
    }
}
