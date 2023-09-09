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
            ["url" => null, "name" => "Beranda"],
            ["url" => "berita", "name" => "Berita"],
            ["url" => "kontak", "name" => "Kontak Kami"],
            ["name" => "Profil", "url" => "profil"],
            ["name" => "Ekstrakurikuler", "url" => "ekstrakurikuler"],
        ]);
        $this->storeSetting('navs_active', [
            ["id" => "0", "name" => "Beranda", "url" => null, "parent" => null],
            ["id" => "3", "name" => "Profil", "url" => "profil", "parent" => null],
            [
                "id" => "4",
                "name" => "Sejarah SMK Negeri 4 Bandung",
                "url" => "page-id/1",
                "parent" => "3",
            ],
            [
                "id" => "7",
                "name" => "Visi & Misi SMK Negeri 4 Bandung",
                "url" => "page-id/2",
                "parent" => "3",
            ],
            [
                "id" => "6",
                "name" => "Motto SMK Negeri 4 Bandung",
                "url" => "page-id/3",
                "parent" => "3",
            ],
            ["id" => "1", "name" => "Berita", "url" => "berita", "parent" => null],
            [
                "id" => "2",
                "name" => "Kontak Kami",
                "url" => "kontak",
                "parent" => null,
            ],
            ["id" => "6", "name" => "Prestasi", "url" => "prestasi", "parent" => null],
            [
                "id" => "5",
                "name" => "Ekstrakurikuler",
                "url" => "ekstrakurikuler",
                "parent" => null,
            ],
            [
                "id" => "14",
                "name" => "Bulutangkis",
                "url" => "page-id/10",
                "parent" => "5",
            ],
            [
                "id" => "16",
                "name" => "English Club (EC)",
                "url" => "page-id/12",
                "parent" => "5",
            ],
            ["id" => "19", "name" => "Futsal", "url" => "page-id/15", "parent" => "5"],
            ["id" => "24", "name" => "HARPA 4", "url" => "page-id/20", "parent" => "5"],
            [
                "id" => "21",
                "name" => "Nihon Houkago Kurabu (NHK)",
                "url" => "page-id/17",
                "parent" => "5",
            ],
            ["id" => "17", "name" => "PANEL", "url" => "page-id/13", "parent" => "5"],
            [
                "id" => "22",
                "name" => "PASKIBRA",
                "url" => "page-id/18",
                "parent" => "5",
            ],
            [
                "id" => "20",
                "name" => "Pencak Silat",
                "url" => "page-id/16",
                "parent" => "5",
            ],
            ["id" => "18", "name" => "ROHIS", "url" => "page-id/14", "parent" => "5"],
            [
                "id" => "23",
                "name" => "Seni Karawitan",
                "url" => "page-id/19",
                "parent" => "5",
            ],
            [
                "id" => "15",
                "name" => "Opat Karate Club (OKC)",
                "url" => "page-id/11",
                "parent" => "5",
            ],
        ]);
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