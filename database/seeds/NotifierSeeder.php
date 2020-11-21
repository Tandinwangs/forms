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
            'sms_api'=>'https://login.bnb.bt/playsms/index.php'
        ]);
    }
}
