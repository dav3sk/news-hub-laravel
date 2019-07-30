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
            'name' => 'Jose Duarte dos Santos',
            'email' => 'jose@email.com',
            'password' => Hash::make('senha123')
        ]);
    }
}
