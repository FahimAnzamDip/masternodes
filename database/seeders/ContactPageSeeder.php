<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_pages')->insert([
            'top_title' => 'Get In Touch',
            'main_title' => 'Feel Free to Write Us a Message.',
            'page_content' => 'Lorem ipsum is simply free text dolor sit amett quie adipiscing elit. When an unknown printer took a galley. quiaies lipsum dolor sit atur adip scing',
        ]);
    }
}
