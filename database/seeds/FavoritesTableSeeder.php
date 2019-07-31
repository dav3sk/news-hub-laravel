<?php

use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorites')->insert([
            'user_id'=> 1,
            'title'=> 'How the Question ‘Who Benefits From This’?',
            'url_image' => 'https://www.lewrockwell.com/wp-content/themes/lrc/images/logo-med.png',
            'url' => 'https://www.lewrockwell.com/2019/07/no_author/how-the-question-who-benefits-from-this-can-change-your-life/',
            'date' => '2019-07-31'
        ]);
    }
}
