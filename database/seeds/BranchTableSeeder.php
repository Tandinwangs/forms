<?php

use Illuminate\Database\Seeder;

class BranchTableSeeder extends Seeder
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
			      		'branch_code' => '200', 
			      		'branch_name' => 'Taba Extension',
			      		'category' => 'extension',
			      	], 
			      	[
			      		'branch_code' => '300', 
			      		'branch_name' => 'Motithang Extension',
			      		'category' => 'extension',
			      	], 
			      	[
			      		'branch_code' => '400', 
			      		'branch_name' => 'Babesa Extension',
			      		'category' => 'extension',
			      	],   
			      	[
			      		'branch_code' => '500', 
			      		'branch_name' => 'Olakha Extension',
			      		'category' => 'extension',
			      	], 
			      	[
			      		'branch_code' => '600', 
			      		'branch_name' => 'Khasadrabchu Extension',
			      		'category' => 'extension',
			      	], 
			      	[
			      		'branch_code' => '101', 
			      		'branch_name' => 'Tala Extension',
			      		'category' => 'extension',
			      	],   
			      	[
			      		'branch_code' => '102', 
			      		'branch_name' => 'Samdrupcholing Extension',
			      		'category' => 'extension',
			      	], 
			      	[
			      		'branch_code' => '202', 
			      		'branch_name' => 'Samdrupjongkhar Extension',
			      		'category' => 'extension',
			      	], 
			      	[
			      		'branch_code' => '302', 
			      		'branch_name' => 'Nganglam Extension',
			      		'category' => 'extension',
			      	], 
			        [
			          'branch_code' => '103', 
			          'branch_name' => 'Kanglung Extension',
			          'category' => 'extension',
			        ],
			        [
			          'branch_code' => '203', 
			          'branch_name' => 'Wamrong Extension',
			          'category' => 'extension',
			        ],
			        [
			          'branch_code' => '303', 
			          'branch_name' => 'Tashiyangtsi Extension',
			          'category' => 'extension',
			        ],
			        [
			          'branch_code' => '403', 
			          'branch_name' => 'Rangjung Extension',
			          'category' => 'extension',
			        ],
			        [
			          'branch_code' => '104', 
			          'branch_name' => 'Tingtibi Extension',
			          'category' => 'extension',
			        ],
			        [
			          'branch_code' => '204', 
			          'branch_name' => 'Sarpang Extension',
			          'category' => 'extension',
			        ],
			        [
			          'branch_code' => '105', 
			          'branch_name' => 'Bonday Extension',
			          'category' => 'extension',
			        ],
			        [
			          'branch_code' => '205', 
			          'branch_name' => 'Haa Extension',
			          'category' => 'extension',
			        ],
			        [
			          'branch_code' => '106', 
			          'branch_name' => 'Gyelposhing Extension',
			          'category' => 'extension',
			        ],
			        [
			          'branch_code' => '206', 
			          'branch_name' => 'Lingmithang Extension',
			          'category' => 'extension',
			        ],
			        [
			          'branch_code' => '306', 
			          'branch_name' => 'Lhuntse Extension',
			          'category' => 'extension',
			        ],
			        [
			          'branch_code' => '107', 
			          'branch_name' => 'Khuruthang Extension',
			          'category' => 'extension',
			        ],
			        [
			          'branch_code' => '207', 
			          'branch_name' => 'Gasa Extension',
			          'category' => 'extension',
			        ],
			        [
			          'branch_code' => '108', 
			          'branch_name' => 'Trongsa Extension',
			          'category' => 'extension',
			        ],
			        [
			          'branch_code' => '109', 
			          'branch_name' => 'Gomtu Extension',
			          'category' => 'extension',
			        ],
			        [
			          'branch_code' => '209', 
			          'branch_name' => 'Tashicholing Extension',
			          'category' => 'extension',
			        ],
			        [
			          'branch_code' => '110', 
			          'branch_name' => 'Dagapela Extension',
			          'category' => 'extension',
			        ],
        ]);
    }
}
