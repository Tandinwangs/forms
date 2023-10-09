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
                'branch_code' => '11001',
                'branch_name' => 'Bumthang Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11002',
                'branch_name' => 'Chhukha Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11003',
                'branch_name' => 'Dagana Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11004',
                'branch_name' => 'Gasa Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11005',
                'branch_name' => 'Haa Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11006',
                'branch_name' => 'Lhuentse Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11007',
                'branch_name' => 'Mongar Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11008',
                'branch_name' => 'Paro Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11009',
                'branch_name' => 'Pemagatshel Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11010',
                'branch_name' => 'Punakha Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11011',
                'branch_name' => 'Samdrup Jongkhar Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11012',
                'branch_name' => 'Samtse Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11013',
                'branch_name' => 'Sarpang Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11014',
                'branch_name' => 'Thimphu Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11015',
                'branch_name' => 'Trashigang Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11016',
                'branch_name' => 'Trashiyangtse Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11017',
                'branch_name' => 'Trongsa Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11018',
                'branch_name' => 'Tsirang Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11019',
                'branch_name' => 'Wangdue Phodrang Dzongkhag',
                'category' => 'dzongkhag',
              ],
              [
                'branch_code' => '11020',
                'branch_name' => 'Zhemgang Dzongkhag',
                'category' => 'dzongkhag',
              ]
        ]);
    }
}
