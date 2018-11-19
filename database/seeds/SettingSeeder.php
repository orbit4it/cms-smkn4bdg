<?php

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
        $this->storeSetting('title', 'SMK Negeri 4 Bandung');
        $this->storeSetting('navs_list', [
            [
                'url' => '',
                'name' => 'Beranda'
            ],[
                'url' => 'berita',
                'name' => 'Berita'
            ],[
                'url' => 'contact',
                'name' => 'Kontak Kami'
            ]
        ]);
        $this->storeSetting('navs_active', []);
    }

    private function storeSetting($key, $value)
    {
        $setting = \App\Setting::firstOrCreate([
            'meta_key' => $key
        ]);

        $setting->meta_value = $value;
        $setting->save();
    }
}
