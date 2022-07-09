<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('translator_languages')->insert([
            'locale' => 'en',
            'name' => 'English',
        ]);
        
        \DB::table('translator_languages')->insert([
            'locale' => 'sw',
            'name' => 'Swahili',
        ]);

    }
}
