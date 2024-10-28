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
            'salogan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'logo' => null,
            'icon' => null,
            'phone' => '+9233111111111',
            'phone2' => '+16453865484',
            'email' => 'sales1@mail.com',
            'email2' => 'Usa@gmail.com',
            'address' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'address2' => 'USA , California',
            'map' => 'https://g.page/SoftwareHouse?share',
            'video' => null,
            'about_us' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia et architecto ex repellat laborum praesentium aperiam vero mollitia quibusdam iure',
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
