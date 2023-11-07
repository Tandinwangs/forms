<?php

use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([
            [	'branch_code' => '999',
            	'branch_name' => 'Corporate Branch (Near Handicraft Bazaar)'],
      		 
      		[	'branch_code' => '000',
      			'branch_name' => 'Thimphu Branch (Bhutan Post office)'],
      		 
      		[	'branch_code' => '001',
      			'branch_name' => 'Phuntsholing Branch'],
      		 
      		[	'branch_code' => '002',
      			'branch_name' => 'Samdrupjongkhar Branch'],
      		 
      		[	'branch_code' => '003',
      			'branch_name' => 'Trashigang Branch'],
      		 
      		[	'branch_code' => '004',
      			'branch_name' => 'Gelephu Branch'],
      		 
      		[	'branch_code' => '005',
      			'branch_name' => 'Paro Branch'],
      		 
      		[	'branch_code' => '006',
      			'branch_name' => 'Mongar Branch'],
      		 
      		[	'branch_code' => '007',
      			'branch_name' => 'Wangdue Branch'],
      		 
      		[	'branch_code' => '008',
      			'branch_name' => 'Bumthang Branch'],
      		 
      		[	'branch_code' => '009',
      			'branch_name' => 'Samtse Branch'],
      		 
      		[	'branch_code' => '010',
      			'branch_name' => 'Tsirang Branch'],
        ]);
    }
}
