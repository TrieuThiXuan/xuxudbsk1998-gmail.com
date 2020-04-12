<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'xuantt',
            'email' => 'xuanttbk@gmail.com',
            'password' => Hash::make('123456789'),
            'birthday' => '2020-10-02',
            'gender' => 1,
            'phone' => '0349778772',
            'address' => 'ktx b10 DHBKHN',
            'role' => '1',
        ]);
    }
}
