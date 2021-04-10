<?php

namespace Database\Seeders;

use App\Models\Setting;
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
        Setting::create([
            'name' => "Microblog",
            'facebook' => "https://facebook.com",
            'youtube' => "https://youtube.com",
            'instagram' => "https://instagram.com",
            'address' => "JALAN MEKAR BARU SATU DUA TIGA",
            'phone_number' => "(62) 822 5545 2232",
            'logo' => "default.png",
            'short_desc' => 'lorem, ipsum dolor sit amet consectetur.'
        ]);
    }
}
