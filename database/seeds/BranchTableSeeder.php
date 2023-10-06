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
