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
            'label' => 'CIN',
            'type' => 'image'
        ],
        [
            'label' => 'Lettre de motivation',
            'type' => 'pdf'
        ],
        [
            'label' => 'CV',
            'type' => 'pdf'
        ],
        [
            'label' => 'Relever de note',
            'type' => 'pdf'
        ]]);

    }
}
