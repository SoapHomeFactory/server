<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FatTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fat_types')->insert([
          [
            'type' => 'beurre'
          ],
          [
            'type' => 'huile'
          ],
          [
            'type' => 'cire'
          ],
          [
            'type' => 'macérat huileux'
          ]
        ]);
    }
}
