<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('kategori')->insert([
            'nama_kategori' => "Berita",
        ]);
        DB::table('kategori')->insert([
            'nama_kategori' => "Pengumuman",
        ]);
        
        DB::table('berita')->insert([
            'judul' => "Juara 1 e-ICON World Contest 2017",
            'deskripsi' => "SMK Negeri 4 Bandung Juara 1 e-ICON World Contest 2017",
            'id_kategori' => "1",
            'slug' => "juara-1-e-icon-world-contest-2017",
            'hits' => 0,
        ]);
        
        DB::table('halaman')->insert([
            'judul' => "Sejarah SMK Negeri 4 Bandung",
            'deskripsi' => "Ini adalah sejarah SMK Negeri 4 Bandung",
            'slug' => "sejarah",
            'hits' => 0,
        ]);
        
        DB::table('halaman')->insert([
            'judul' => "Visi & Misi SMK Negeri 4 Bandung",
            'deskripsi' => "Ini adalah VISI dan MISI SMK Negeri 4 Bandung",
            'slug' => "visi-misi",
            'hits' => 0,
        ]);
    }
}
