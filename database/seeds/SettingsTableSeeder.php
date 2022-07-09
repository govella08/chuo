<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
  public function run(){

      DB::table('settings')->truncate();

      Setting::create(array(
        'title' => 'Google Analytics',
        'content' => 'Google Analytics',
        'slug' => 'google-analytics'
      ));

      Setting::create(array(
      'title' => 'Meta Keywords',

      'content' => 'Meta Keywords',
      'slug' => 'meta-keywords'
      ));

      Setting::create(array(
        'title' => 'SEO',

        'content' => 'SEO',

        'slug' => 'seo'
      ));

      Setting::create(array(
      'title' => 'Privacy Policy',

      'content' => 'Privacy Policy',
      'slug' => 'privacy-policy'
      ));

      Setting::create(array(
        'title' => 'Disclaimer',
        'content' => 'Disclaimer',
        'slug' => 'disclaimer'
      ));

      Setting::create(array(
        'title' => 'Copyright',
        'content' => 'Copyright',
        'slug' => 'copyright'
      ));

      Setting::create(array(
        'title' => 'Terms & Conditions',
        'content' => 'Terms & Conditions',
        'slug' => 'terms'
      ));
  }

}