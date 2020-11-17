<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Tashi Phuntsho',
            'email' => 'taphin@bnb.bt',
            'password' => Hash::make('FMS@2020BNBl'),
            'username' => 'TaPhin',
            'mobile' => '97517762878',
            'role_id' => '1',
        ]);
    }
}
