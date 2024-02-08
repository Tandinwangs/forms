<?php

use Illuminate\Database\Seeder;

class NotifierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifiers')->insert([
            'sms_api'=>'http://172.19.250.43/index.php?'
        ]);
    }
}
