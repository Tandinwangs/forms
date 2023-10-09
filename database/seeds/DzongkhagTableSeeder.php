<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DzongkhagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([
            [
                'branch_code' => '1103219',
                'branch_name' => 'fjad Phodrang Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '113200',
                'branch_name' => 'djsa Dzongkhag',
                'category' => 'dzongkhag',
              ]
            // Add more data as needed
        ]);
    }
}
