<?php

use App\MataPelajaran;
use App\Pembelajaran;
use App\Studi;
use Illuminate\Database\Seeder;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Studi::create([
            'nama' => 'Teknik Komputer dan Jaringan',
            'slug' => 'tkj',
            'foto' => 'http://localhost:8000/image/icon-tkj.png',
            'deskripsi' => '<p>Penyelenggaraan diklat Kompetensi Teknik Komputer dan Jaringan bertujuan mempersiapkan peserta diklat agar dapat bekerja sesuai dengan komptenensi yang dimiliki, membekali mereka dengan keterampilan dan pengetahuan serta sikap dalam hal:</p><ol><li><p>Menciptakan tenaga teknisi komputer dan jaringan berstandar nasional dan Internasional</p></li><li><p>Menciptakan tenaga teknik komputer dan jaringan yang memiliki kemampuan merawat, menjaga dan memperbaiki dengan hasil yang profesional</p></li><li><p>Menjadi administrator Jaringan tingkat pemula</p></li><li><p>Menjadi administrator Jaringan yang bersertifikasi</p></li></ol>'
        ]);

        MataPelajaran::create(
            [
                'id_studi' => 1,
                'nama' => 'GAMBAR TEKNIK',
            ]
        );
        MataPelajaran::create(
            [
                'id_studi' => 1,
                'nama' => 'BASIC SKILL',
            ]
        );

        Pembelajaran::create([
            'id_mata_pelajaran' => 1,
            'semester' => 1,
            'nama' => 'Menguasai teknik dasar menggambar teknik',
            'total_pembelajaran' => 38
        ]);

        for ($i = 1; $i <= 5; $i++) {
            Pembelajaran::create([
                'id_mata_pelajaran' => 1,
                'semester' => $i,
                'nama' => 'Menggambar rangkaian listrik dan elektronika sederhana',
                'total_pembelajaran' => 38 + ($i * 2)
            ]);
            Pembelajaran::create([
                'id_mata_pelajaran' => 2,
                'semester' => $i,
                'nama' => 'Menggunakan alat instrumen untuk pengukuran /pengujian',
                'total_pembelajaran' => 38
            ]);
        }


    }
}