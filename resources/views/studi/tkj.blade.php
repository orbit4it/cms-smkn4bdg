@extends('layouts.template')
@section('title', 'Teknik Komputer Jaringan')
@section('content')

    <section class="halaman">
        <div class="container">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Program Studi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-8 col-12 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="" alt="Teknik Komputer Jaringan">
                        <div class="card-body">
                            <h2 class="card-title">Teknik Komputer Jaringan</h2>
                            <p>Penyelenggaraan diklat Kompetensi Teknik Komputer dan Jaringan bertujuan mempersiapkan peserta diklat agar dapat bekerja sesuai dengan komptenensi yang dimiliki, membekali mereka dengan keterampilan dan pengetahuan serta sikap dalam hal:</p>
                            <ol>
                                <li><p>Menciptakan tenaga teknisi komputer dan jaringan berstandar nasional dan Internasional</p></li>
                                <li><p>Menciptakan tenaga teknik komputer dan jaringan yang memiliki kemampuan merawat, menjaga dan memperbaiki dengan hasil yang profesional</p></li>
                                <li><p>Menjadi administrator Jaringan tingkat pemula</p></li>
                                <li><p>Menjadi administrator Jaringan yang bersertifikasi</p></li>
                            </ol>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2">NO</th>
                                        <th colspan="2" rowspan="2">MATA PELAJARAN</th>
                                        <th colspan="6">SEMESTER</th>
                                        <th rowspan="2">JML</th>
                                    </tr>
                                    <tr style="background-color:#104E8B; color: #fff; text-align: center;">
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>5</td>
                                        <td>6</td>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>1</td>
                                    <td>&nbsp;</td>
                                    <td><b>GAMBAR TEKNIK</b></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>a</td>
                                    <td>Menguasai teknik dasar menggambar teknik</td>
                                    <td>38</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>38</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>b</td>
                                    <td>Menggambar rangkaian listrik dan elektronika sederhana</td>
                                    <td>38</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>38</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>&nbsp;</td>
                                    <td><b>BASIC SKILL</b></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>a</td>
                                    <td>Menggunakan alat instrumen untuk pengukuran /pengujian</td>
                                    <td>25</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>25</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>b</td>
                                    <td>Menerapkan teknik elektronika analog dan digital dasar</td>
                                    <td>26</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>26</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>c</td>
                                    <td>Menerapkan keselamatan, kesehatan kerja dan lingkungan hidup</td>
                                    <td>25</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>25</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>&nbsp;</td>
                                    <td><B>MENGUASAI DASAR TEKNOLOGI INFORMASI 1</B></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>a</td>
                                    <td>Merakit Personal Computer</td>
                                    <td>50</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>b</td>
                                    <td>Melakukan instalasi sistem operasi dasar</td>
                                    <td>50</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>c</td>
                                    <td>Menerapkan fungsi peripheral dan instalasi PC</td>
                                    <td>52</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>52</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>d</td>
                                    <td>Melakukan instalasi software</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>e</td>
                                    <td>Memahami konsep dasar TI</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>f</td>
                                    <td>Mengidentifikasi perangkat multi media</td>
                                    <td>&nbsp;</td>
                                    <td>52</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>52</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>&nbsp;</td>
                                    <td><b>Maintenance & Repair PC</b></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>a</td>
                                    <td>Melakukan perawatan PC</td>
                                    <td>&nbsp;</td>
                                    <td>76</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>76</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>b</td>
                                    <td>Mendiagnosis permasalahan pengoperasian PC & peripheral</td>
                                    <td>&nbsp;</td>
                                    <td>76</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>76</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>c</td>
                                    <td>Melakukan perbaikan dan setting ulang sistem PC</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>57</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>57</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>d</td>
                                    <td>Melakukan perbaikan periferal</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>57</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>57</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>&nbsp;</td>
                                    <td><b>MENGUASAI DASAR TEKNOLOGI INFORMASI 2</b></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>a</td>
                                    <td>Melakukan instalasi perangkat jaringan local (LAN)</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>b</td>
                                    <td>Mendiagnosis permasalahan pengoperasian PC yang tersambung jaringan</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>c</td>
                                    <td>Melakukan instalasi sistem software berbasis GUI dan CLI</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>52</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>52</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>d</td>
                                    <td>Menguasai DHCP server & Domain Controler</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>e</td>
                                    <td>Menguasai DNS, Web Server & FTP server</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>f</td>
                                    <td>Menguasai administrasi & aplikasi Mail server</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>52</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>52</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>&nbsp;</td>
                                    <td><b>Maintenance & Repair JARINGAN</b></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>a</td>
                                    <td>Melakukan perbaikan dan setting ulang koneksi jaringan</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>b</td>
                                    <td>Melakukan instalasi sistem operasi jaringan berbasis GUI dan Text</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>c</td>
                                    <td>Melakukan perbaikan dan setting ulang koneksi jaringan berbasis luas (WAN)</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>52</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>52</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>d</td>
                                    <td>Mengadministrasi server dalam jaringan</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>e</td>
                                    <td>Merawat & memperbaiki Mail server</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>50</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>f</td>
                                    <td>Merawat & memperbaiki DHCP server</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>52</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>52</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>&nbsp;</td>
                                    <td><b>TEKNOLOGI WIRELESS</b></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>a</td>
                                    <td>Melakukan instalasi perangkat jaringan berbasis luas (WAN)</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>114</td>
                                    <td>&nbsp;</td>
                                    <td>114</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>b</td>
                                    <td>Mobile Comunication</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>114</td>
                                    <td>114</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>&nbsp;</td>
                                    <td><b>PERANCANGAN JARINGAN</b></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>a</td>
                                    <td>Mendiagnosis permasalahan perangkat yang tersambung jaringan berbasis luas (WAN)</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>120</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>b</td>
                                    <td>Merancang bangun dan menganalisa WAN</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>120</td>
                                    <td>&nbsp;</td>
                                    <td>120</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>&nbsp;</td>
                                    <td><b>KEAMANAN JARINGAN</b></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>a</td>
                                    <td>Membuat desain sistem keamanan jaringan</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>114</td>
                                    <td>114</td>
                                    <td>228</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>&nbsp;</td>
                                    <td><b>PEMROGRAMAN WEB</b></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>a</td>
                                    <td>Menerapkan dasar-dasar pembuatan web statis tingkat dasar</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>38</td>
                                    <td>&nbsp;</td>
                                    <td>38</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>b</td>
                                    <td>Menerapkan dasar-dasar pembuatan web dinamis tingkat dasar</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>38</td>
                                    <td>&nbsp;</td>
                                    <td>38</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>c</td>
                                    <td>Membuat halaman web dinamis tingkat lanjut</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>38</td>
                                    <td>&nbsp;</td>
                                    <td>38</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>d</td>
                                    <td>Mengintegrasikan basis data dengan web</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>57</td>
                                    <td>57</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>e</td>
                                    <td>Membuat aplikasi web berbasis JSP</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>57</td>
                                    <td>57</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>&nbsp;</td>
                                    <td><b>SERTIFIKASI</b></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>a</td>
                                    <td>IT Esential</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>b</td>
                                    <td>CCNA</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>&nbsp;</td>
                                    <td><b>PRAKERIN</b></td>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>&nbsp;</td>
                                    <td><b>TUGAS AKHIR</b></td>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>a</td>
                                    <td>Pembuatan dan analisis Aplikasi</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>b</td>
                                    <td>Pembuatan Dokumentasi Aplikasi</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>304</td>
                                    <td>304</td>
                                    <td>418</td>
                                    <td>424</td>
                                    <td>462</td>
                                    <td>342</td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    @include('layouts.sidebar')
                </div>
            </div>
        </div>
    </section>
    
@endsection
@push('css')
    <style type="text/css">
        body {
            padding-top: 86px;
            background-color: #f7f7f7;
        }
        .table thead th {
            vertical-align: middle;
            text-align: center;
        }
        .halaman {
            padding: 2em 0 4em;
        }
        .card {
            box-shadow: 0 1px 2px rgba(0,0,0,.1);
            border: 0;
        }
        .card-img-top {
            border-bottom: 1px solid #eee;
        }
        .card-body {
            padding: 1.5rem 2rem 3rem;
        }
        .card-text {
            text-align: justify;
        }
        .card-body img {
            max-width: 100%;
            height: auto !important;
        }
    </style>
@endpush