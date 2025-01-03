<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'siteName' => 'Afcon Group',
            'slogan' => '{"fr":"Afcon group slogan in French","en":"Afcon group slogan in English"}',
            'logo' => null,
            'icon' => null,
            'phone' => '+9233111111111',
            'phone2' => '+16453865484',
            'email' => 'sales1@mail.com',
            'email2' => 'Usa@gmail.com',
            'address' => '{"fr":"Afcon Adress  in French","en":"Afcon Adress  in English"}',
            'address2' => '{"fr":"Afcon Adress 2 in French","en":"Afcon Adress 2 in English"}',
            'map' => 'https://g.page/SoftwareHouse?share',
            'video' => null,
            'about_us' => '{"fr":"about us in french","en":"about us in english"}',
            'twitter' => 'https://x.com/#',
            'linkedin' => 'https://www.linkedin.com/company/#/',
            'fb' => 'https://www.facebook.com/#/',
            'youtube' => 'https://www.youtube.com/channel/#',
            'instagram' => 'https://www.instagram.com/#/',
            'googleplus' => 'sales@googleplus.com',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
