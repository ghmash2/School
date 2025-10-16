<?php

namespace Database\Seeders;

use App\Models\BasicInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasicInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BasicInfo::create([
            'name'         => 'ABC Academy',
            'logo'         => 'logos/abc-logo.png', // assuming stored in storage/app/public/logos
            'motto'        => 'Learning for a Better Future',
            'address'      => '123 Main Street, Cityville, USA',
            'email'        => 'info@abcacademy.com',
            'eiin'         => '1234567',
            'phone'        => '+1 (555) 123-4567',
            'office_time'  => 'Mon - Fri, 9:00 AM - 5:00 PM',
            'facebook'     => 'https://facebook.com/abcacademy',
            'twitter'      => 'https://twitter.com/abcacademy',
            'instagram'    => 'https://instagram.com/abcacademy',
            'youtube'      => 'https://youtube.com/@abcacademy',
            'google_map'   => 'https://goo.gl/maps/example123',
        ]);
    }
}
