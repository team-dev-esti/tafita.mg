<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('files')->insert([[
            'label' => 'CIN'
        ],
        [
            'label' => 'Lettre de motivation'
        ],
        [
            'label' => 'CV'
        ],
        [
            'label' => 'Relever de note'
        ]]);

    }
}
