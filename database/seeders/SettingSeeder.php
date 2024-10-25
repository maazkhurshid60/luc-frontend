<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('settings')->insert([
            'siteName' => 'Red Star Technologies',
            'salogan' => 'We work for you',
            'logo' => 'WYG0WBkKi5i92e6prfxIUc3RwgFUnjI7rRxE1opR.svg',
            'icon' => 'KY8V4ITWVNmj93HJWsk8oCEUfGVJwH4t4E5eXgeV.svg',
            'phone' => '+92 331 11111111',
            'phone2' => '+16453865484',
            'email' => 'sales1@redstartechs.com',
            'email2' => 'Usa@gmail.com',
            'address' => 'Emaan Arcade, Street No: 124, G-13/4, Islamabad, Pakistan.',
            'address2' => 'USA , Califilnai',
            'map' => 'https://g.page/SoftwareHouse?share',
            'video' => null,
            'about_us' => 'Red Star Technologies gain competitive advantage among the best software development companies in Islamabad through the skilful delivery of innovative software. The company has vast experience in the field of software development and offers its services regarding that. We are offering Web Development, Digital Marketing, Android App Development, and Search Engine Optimization. 1',
            'twitter' => 'https://x.com/RedStarTechs17',
            'linkedin' => 'https://www.linkedin.com/company/red-star-technologies/',
            'fb' => 'https://www.facebook.com/RedStarTechs/',
            'youtube' => 'https://www.youtube.com/channel/UCl3OBzJza7fkucb21BA81oA',
            'instagram' => 'https://www.instagram.com/redstartechs/',
            'googleplus' => 'sales@redstartechs.com',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
