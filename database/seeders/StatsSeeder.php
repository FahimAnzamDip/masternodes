<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stats')->insert([
            'transaction_count' => 34524,
            'masternodes_count' => 2342,
            'community_count' => 245234,
            'created_at' => Carbon::now()
        ]);
    }
}
