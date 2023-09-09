<?php

use App\Kontak;
use Illuminate\Database\Seeder;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kontak::create([
            'email' => 'info@smkn4bdg.sch.id',
            'telepon' => '(022)-7303736',
            'alamat' => 'Jl. Kliningan No.6, Turangga (40264),Lengkong',
            'facebook_link' => 'https://www.facebook.com/smkn4bandung',
            'instagram_link' => 'https://www.instagram.com/smknegeri4bandung/',
            'twitter_link' => 'https://twitter.com/smkn4bdg',
            'tiktok_link' => 'https://tiktok.com/@smknegeri4bandung',
            'youtube_link' => 'https://www.youtube.com/c/SMKN4BANDUNGOfficial'
        ]);
    }
}
