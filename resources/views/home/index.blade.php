@extends('layouts.template')
@section('content')
    <div id="slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators d-none d-lg-inline-flex">
            @for ($i = 0; $i < (count($data) < 3 ? count($data) : 3); $i++)
            <li data-target="#slider" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></li>
            @endfor
        </ol>
        <div class="carousel-inner">
            @for ($i = 0; $i < (count($data) < 3 ? count($data) : 3); $i++)
            <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                <img class="d-block" src="{{ asset('uploads/' . $data[$i]->foto) }}" alt="{{ $data[$i]->judul }}">
                <div class="carousel-caption text-center text-lg-right">
                    <div class="container">
                        <a href="{{ url('berita/' . $data[$i]->slug) }}" class="text-white">
                        <h5>{{ $data[$i]->judul }}</h5>
                        </a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
		</a>
    </div>

    <section class="news">
    	<div class="container">
    		<div class="row title">
    			<h5 class="mr-auto scroll-show"><b>Berita</b> Terkini</h5>
    			<a href="{{ url('berita') }}" class="scroll-show">Lihat Semua Berita</a>
    		</div>
    		<div class="row news-content">
                @if ($data->count())
                    @foreach ($data as $berita)
        			<div class="col-12 col-md-4">
        				<div class="card scroll-show">
    						<img class="card-img-top" src="{{ asset('uploads/' . $berita->foto) }}" alt="{{ $berita->judul }}">
    						<div class="card-body">
    							<h5 class="card-title">{{ $berita->judul }}</h5>
                                @php
                                $deskripsi = strip_tags($berita->deskripsi);
                                $deskripsi = trim(str_replace('&nbsp;', '', $deskripsi));
                                @endphp
                                <p class="card-text">{{ substr($deskripsi, 0, 42) }}{{ strlen($deskripsi) > 42 ? '...' : '' }}</p>
    							<p class="card-text"><small class="text-muted">{{ empty($berita->created_at) ? '' : $berita->created_at->format('d F Y') }}</small></p>
                                <a href="{{ url('berita/' . $berita->slug) }}" class="">Baca Selengkapnya</a>
    						</div>
    					</div>
        			</div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p class="mx-auto py-3 my-3">Belum Ada Berita</p>
                    </div>
                @endif
    		</div>
    	</div>
    </section>

    <section class="informasi">
        <div class="container">
            <div class="row title mx-0">
                <h3 class="mr-auto scroll-show">Informasi Data Siswa dan Sekolah</h3>
                <a href="https://eschool.smkn4bdg.sch.id/" class="btn btn-primary btn-lg scroll-show">Selengkapnya</a>
            </div>
        </div>
    </section>

    <section class="keahlian">
    	<div class="container">
    		<div class="row title">
    			<h2 class="mx-auto scroll-show"><b>Program</b> Studi</h2>
    		</div>
    		<div class="row scroll-show">
    			<div class="col-6 col-md-4 text-center keahlian-item">
					<img class="keahlian-img" src="{{ asset('') }}/image/icon-tkj.png" alt="TKJ SMKN 4 Bandung">
					<div class="keahlian-text">
						<h5 class="keahlian-title"><b>TEKNIK KOMPUTER JARINGAN</b></h5>
						<a href="{{ url('program-studi/tkj') }}">Baca Selengkapnya</a>
					</div>
    			</div>
    			<div class="col-6 col-md-4 text-center keahlian-item">
					<img class="keahlian-img" src="{{ asset('') }}/image/icon-rpl.png" alt="RPL SMKN 4 Bandung">
					<div class="keahlian-text">
						<h5 class="keahlian-title"><b>REKAYASA PERANGKAT LUNAK</b></h5>
						<a href="{{ url('program-studi/rpl') }}">Baca Selengkapnya</a>
					</div>
    			</div>
    			<div class="col-6 col-md-4 text-center keahlian-item">
					<img class="keahlian-img" src="{{ asset('') }}/image/icon-mm.png" alt="MM SMKN 4 Bandung">
					<div class="keahlian-text">
						<h5 class="keahlian-title"><b>MULTIMEDIA</b></h5>
						<a href="{{ url('program-studi/mm') }}">Baca Selengkapnya</a>
					</div>
    			</div>
    			<div class="col-6 col-md-4 text-center keahlian-item">
					<img class="keahlian-img" src="{{ asset('') }}/image/icon-toi.png" alt="TOI SMKN 4 Bandung">
					<div class="keahlian-text">
						<h5 class="keahlian-title"><b>TEKNIK OTOMASI INDSUTRI</b></h5>
						<a href="{{ url('program-studi/toi') }}">Baca Selengkapnya</a>
					</div>
    			</div>
    			<div class="col-6 col-md-4 text-center keahlian-item">
					<img class="keahlian-img" src="{{ asset('') }}/image/icon-titl.png" alt="TITL SMKN 4 Bandung">
					<div class="keahlian-text">
						<h5 class="keahlian-title"><b>TEKNIK INSTALASI TENAGA LISTRIK</b></h5>
						<a href="{{ url('program-studi/titl') }}">Baca Selengkapnya</a>
					</div>
    			</div>
    			<div class="col-6 col-md-4 text-center keahlian-item">
					<img class="keahlian-img" src="{{ asset('') }}/image/icon-av.png" alt="AV SMKN 4 Bandung">
					<div class="keahlian-text">
						<h5 class="keahlian-title"><b>AUDIO VIDEO</b></h5>
						<a href="{{ url('program-studi/av') }}">Baca Selengkapnya</a>
					</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="sambutan">
    	<div class="container">
    		<div class="row title">
    			<h2 class="mx-auto scroll-show"><b>Sambutan</b> Kepala Sekolah</h2>
    		</div>
    		<div class="row sambutan-content text-center text-lg-left">
    			<div class="col-12 col-lg-3 offset-lg-1 scroll-show">
	    			<div class="sambutan-overlay mx-auto mb-3">
		    			<img src="{{ asset('') }}/uploads/{{ $kepalaSekolah->foto }}" alt="Dr. Asep Tapip Yani, M.Pd">
	    			</div>
    			</div>
    			<div class="col-12 col-lg-7 scroll-show">
    				<h3 class="mb-3">{{ $kepalaSekolah->nama }}</h3>
	    			<p>{!! nl2br($kepalaSekolah->sambutan) !!}</p>
    			</div>
    		</div>
    	</div>
    </section>

    @if ($albums->first())

    <section class="galeri">
        <div class="container">
            <div class="row title">
                <h2 class="mx-auto scroll-show"><b>Galeri</b> SMKN 4 BANDUNG</h2>
            </div>
            <div class="row">
                <ul class="nav nav-pills mx-auto my-3" id="albumTab" role="tablist">
                    <li class="nav-item">
                        <a href="#semua" class="nav-link active scroll-show" id="semua-tab" data-toggle="tab" href="#semua" role="tab" aria-controls="semua" aria-selected="true">Semua</a>
                    </li>
                    @foreach ($albums as $album)
                    <li class="nav-item">
                        <a href="#{{ $album->slug }}" class="nav-link scroll-show" id="{{ $album->slug }}-tab" data-toggle="tab" href="#{{ $album->slug }}" role="tab" aria-controls="{{ $album->slug }}" aria-selected="true">{{ $album->judul }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="container-fluid">
            <div class="tab-content" id="albumTabContent">
                <div class=" tab-pane fade show active" id="semua" role="tabpanel" aria-labelledby="semua-tab">
                    <div class="row mx-0 content">
                        <div class="card-columns my-3">
                            @foreach (\App\Galeri::inRandomOrder()->take(6)->get() as $galeri)
                            <div class="card bg-dark text-white scroll-show">
                                <img class="card-img" src="{{ url('uploads' . $galeri->foto) }}" alt="Card image">
                                <div class="card-img-overlay text-center">
                                    <h4 class="card-title">{{ $galeri->judul }}</h4>
                                    <p class="card-text">{{ $galeri->deskripsi }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @foreach ($albums as $album)
                <div class=" tab-pane fade show" id="{{ $album->slug }}" role="tabpanel" aria-labelledby="{{ $album->slug }}-tab">
                    <div class="row mx-0 content">
                        <div class="card-columns my-3 text-center">
                            @foreach ($galeriAlbum = \App\Galeri::where('id_album', $album->id_album)->inRandomOrder()->take(6)->get() as $galeri)
                            <div class="card bg-dark text-white scroll-show">
                                <img class="card-img" src="{{ url('uploads' . $galeri->foto) }}" alt="Card image">
                                <div class="card-img-overlay text-center">
                                    <h4 class="card-title">{{ $galeri->judul }}</h4>
                                    <p class="card-text">{{ $galeri->deskripsi }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        @if (!$galeriAlbum->count())
                        <p class="mx-auto my-3 py-3">Belum ada foto pada Album ini</p>
                        @else
                        <a href="{{ url('album/' . $album->slug) }}" class="mx-auto my-3">Lihat Album Sepenuhnya</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @endif

    <section class="tentang">
    	<div class="container">
    		<div class="row title">
    			<h2 class="mx-auto scroll-show"><b>Tentang</b> SMKN 4 BANDUNG</h2>
    		</div>
    		<div class="row text scroll-show">
    			<p>
    				SMKN 4 BANDUNG adalah Sekolah Menengah Kejuruan yang memiliki kelompok bidang keahlian Ketenaga Listrikan, Audio Video, dan Teknik Komputer dan Informatika. Keberadaannya didukung oleh dunia usaha dan dunia industri, baik dalam pembelajaran maupun penyerapan lulusannya. Pembelajaran teori dan praktek tidak hanya dilakukan di dalam kelas tetapi dilakukan di dunia industri melalui praktek kerja industri di perusahaan-perusahaan yang relevan.
    				<br>
    				<br>
					Lulusannya telah tersebar di berbagai perguruan tinggi dan Dunia Usaha/Dunia Industri. Kesempatan untuk melanjutkan studi dan bekerja sangat terbuka luas bagi lulusannya. Jalur PMDK tersedia bagi lulusan yang berprestasi baik PN maupun Swasta. Bagi siswa yang ingin bekerja, penempatannya didukung oleh Disnaker melalui Bursa Kerja Khusus (BKK) sesuai dengan kualifikasi yang di persyaratkan oleh perusahaa, serta siswa dapat berwirausaha sesuai dengan kompetensi keahlian masing-masing.
    			</p>
    		</div>
    	</div>
    </section>

    @if ($sponsors->count())
    <section class="sponsor px-0 py-3">
        <div class="container">
            <div class="row">
                @foreach ($sponsors as $sponsor)
                <div class="col-6 col-md-2 text-center py-3 my-3 mx-auto scroll-show">
                    <img src="{{ asset('uploads/' . $sponsor->foto) }}" alt="{{ $sponsor->judul }}" height="100">
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection

@push('css')
<style type="text/css">
    /* Carousel */
    .carousel {
        margin-top: 86px;
        overflow: hidden;
    }

    .carousel-inner {
        overflow: hidden;
    }

    .carousel img {
        filter: brightness(80%);
    }

    .carousel-caption {
        top: calc(100vh - 90px - 60px);
        background-color: #3387bc;
        left: 0;
        right: 0;
        text-align: right;
        height: 80px;
    }

    .carousel-indicators li {
        width: 10px;
        height: 10px;
        border-radius: 100%;        
    }

    @media (min-width: 768px) {
        .carousel-inner {
            height: 570px;
        }
        .carousel img {
            height: 570px;
        }
        .carousel-caption {
            top: calc(570px - 80px);
        }
    }

    @media (min-width: 992px) {
        .carousel-inner {
            height: calc(100vh - 86px);
        }
        .carousel img {
            width: 100%;
            height: auto;
        }
        .carousel-caption {
            top: calc(100vh - 90px - 60px);
        }
    }

    @media (max-width: 575px) {
        /*.carousel img {
            position: absolute;
            top: 0;
            left: 0;
            max-width: 100%;
            height: 100%;
        }*/
    }

    @media (max-width: 767px) {
        .carousel-caption {
            top: calc(500px - 80px);
        }
    }

    @media (max-width: 991px) {
        .carousel {
            margin-top: 46px;
        }
    }

    .carousel-control-next, .carousel-control-prev {
        width: 5%;
    }

    .carousel-indicators {
        justify-content: left;
        margin-left: 8%;
    }

    /* News */

    section {
        padding: 5em 0;
    }

    .news .container {
        padding-left : 30px;
        padding-right: 30px;
    }

    .news .title {
        padding: 10px 0;
    }

    .news-content {
        margin-left: -30px;
        margin-right: -30px;
    }

    .news .card,
    .news .card img {
        border-radius: 0;
    }

    .news .card {
        border: 0;
        margin-bottom: 30px;
    }

    .news .card-body {
        padding: 1.25rem 0;
    }

    /* Informasi */
    .informasi {
        background-image: url("{{ url('') }}/image/gedung-smkn4.jpg");
        background-position: 0 -70px;
        background-size: cover;
        background-repeat: no-repeat;
        color: #fff;
    }


    /* Keahlian */
    .keahlian {
        background-color: #f1f1f1;
    }

    .keahlian .title {
        padding: 10px 0;
        margin-bottom: 40px;
    }

    .keahlian-item {
        padding-bottom: 50px;
    }

    .keahlian-img {
        width: 50%;
    }

    .keahlian-text h5 {
        margin-top: 30px;
    }

    .keahlian-text p {
        margin-top: 20px;
        text-align: justify;
        text-align-last: center;
    }

    /* Sambutan */

    .sambutan {
        background-color: #4a9ed3;
        color: #fff;
    }

    .sambutan .title {
        padding: 10px 0;
        margin-bottom: 40px;
    }

    .sambutan-overlay {
        overflow: hidden;
        width:  220px;
        height: 220px;
        border-radius: 100%;
    }

    .sambutan-overlay img {
        margin-top: -100px;
        width: 100%;
    }

    .sambutan-content p {
        text-align: justify;
    }

    /* Galeri */
    .galeri .title {
        padding: 10px 0;
    }

    .galeri .nav-link {
        margin: 0 .7rem;
    }

    .galeri .card {
        border: 0;
    }

    @media (max-width: 767px) {
        .galeri .card {
        }
    }

    @media (max-width: 991px) {
        .galeri .card {
        }
    }

    .galeri .card,
    .galeri .card * {
        border-radius: 0;
    }

    .galeri .card .card-img-overlay {
        opacity: 0;
        margin-top: 200px;
        transition: .2s ease-out;
    }

    .galeri .card:hover .card-img-overlay {
        opacity: 1;
        margin-top: 50px;
    }

    .galeri .card .card-img {
        filter: brightness(90%);
        transition: .15s ease-out;
    }

    .galeri .card:hover .card-img {
        filter: brightness(40%);
    }

    /* Tentang */
    .tentang {
        background-image: url("{{ url('') }}/image/smkn4-c.jpg");
        background-attachment: fixed;
        background-repeat: no-repeat;
        color: #fff;
        background-position-x: center;
    }

    @media (min-width: 576px) {
        .tentang {
            background-size: 200% auto;
        }
    }

    @media (min-width: 768px) {
        .tentang {
            background-size: 140% auto;
        }
    }

    .tentang .container {
        padding-left : 30px;
        padding-right: 30px;
    }

    .tentang .title {
        padding: 10px 0;
        margin-bottom: 40px;
    }

    .tentang p {
        text-align: justify;
    }
</style>
@endpush
@push('js')
    <script type="text/javascript">
        var parallax;
        var speed = 0.2;

        function checkMedia() {
            if ($(window).width() >= 768) {
                $('.tentang').addClass('parallax');
            } else {
                $('.tentang').removeClass('parallax');
            }
            parallax = document.querySelectorAll(".parallax");
        }
        
        checkMedia();

        window.onscroll = function() {
            [].slice.call(parallax).forEach(function(el,i) {
                var windowYOffset = window.pageYOffset;
                var elBackgrounPos = "50% " + (windowYOffset * speed - 850) + "px";
                el.style.backgroundPosition = elBackgrounPos;
            });
        };

        $(window).resize(function() {
            checkMedia();
        });

    </script>
@endpush