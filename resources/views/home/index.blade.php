@extends('layouts.template')
@section('content')
    <div id="slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#slider" data-slide-to="0" class="active"></li>
            <li data-target="#slider" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block" src="{{ asset('') }}/image/seleknas2015.jpg" alt="First slide">
                <div class="carousel-caption text-center text-lg-right">
                	<div class="container">
						<h5>SMKN 4 BANDUNG</h5>
					</div>
				</div>
            </div>
            <div class="carousel-item">
                <img class="d-block" src="{{ asset('') }}/image/lkskota2017.jpg" alt="Second slide">
                <div class="carousel-caption text-center text-lg-right">
                	<div class="container">
						<h5>INFORMASI SOAL LKS KOTA BANDUNG 2017 BIDANG LOMBA TEKNOLOGI</h5>
                	</div>
				</div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
        <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
    </div>

    <section class="news">
    	<div class="container">
    		<div class="row title">
    			<h5 class="mr-auto"><b>Berita</b> Terkini</h5>
    			<a href="{{ url('berita') }}">Lihat Semua Berita</a>
    		</div>
    		<div class="row news-content">
                @foreach (\App\Berita::orderBy('created_at', 'DESC')->get()->take(6) as $berita)
    			<div class="col-12 col-md-4">
    				<div class="card">
						<img class="card-img-top" src="{{ asset('uploads/' . $berita->foto) }}" alt="Card {{ asset('') }}/image cap">
						<div class="card-body">
							<h5 class="card-title">{{ $berita->judul_berita }}</h5>
							<p class="card-text">{{ $berita->created_at->format('d F Y') }}</p>
                            @php
                            $isi_berita = strip_tags($berita->isi_berita);
                            $isi_berita = trim(str_replace('&nbsp;', '', $isi_berita));
                            @endphp
							<p class="card-text">{{ substr($isi_berita, 0, 42) }}{{ strlen($isi_berita) > 42 ? '...' : '' }}</p>
							<a href="{{ url('berita/' . $berita->id_berita) }}" class="">Baca Selengkapnya</a>
						</div>
					</div>
    			</div>
                @endforeach
    		</div>
    	</div>
    </section>

    <section class="keahlian">
    	<div class="container">
    		<div class="row title">
    			<h2 class="mx-auto"><b>Program</b> Studi</h2>
    		</div>
    		<div class="row">
    			<div class="col-6 col-md-4 text-center keahlian-item">
					<img class="keahlian-img" src="{{ asset('') }}/image/lightning-icon.png" alt="Card {{ asset('') }}/image cap">
					<div class="keahlian-text">
						<h5 class="keahlian-title"><b>TEKNIK KOMPUTER JARINGAN</b></h5>
						<a href="#">Baca Selengkapnya</a>
					</div>
    			</div>
    			<div class="col-6 col-md-4 text-center keahlian-item">
					<img class="keahlian-img" src="{{ asset('') }}/image/lightning-icon.png" alt="Card {{ asset('') }}/image cap">
					<div class="keahlian-text">
						<h5 class="keahlian-title"><b>REKAYASA PERANGKAT LUNAK</b></h5>
						<a href="#">Baca Selengkapnya</a>
					</div>
    			</div>
    			<div class="col-6 col-md-4 text-center keahlian-item">
					<img class="keahlian-img" src="{{ asset('') }}/image/lightning-icon.png" alt="Card {{ asset('') }}/image cap">
					<div class="keahlian-text">
						<h5 class="keahlian-title"><b>MULTIMEDIA</b></h5>
						<a href="#">Baca Selengkapnya</a>
					</div>
    			</div>
    			<div class="col-6 col-md-4 text-center keahlian-item">
					<img class="keahlian-img" src="{{ asset('') }}/image/lightning-icon.png" alt="Card {{ asset('') }}/image cap">
					<div class="keahlian-text">
						<h5 class="keahlian-title"><b>TEKNIK OTOMASI INDSUTRI</b></h5>
						<a href="#">Baca Selengkapnya</a>
					</div>
    			</div>
    			<div class="col-6 col-md-4 text-center keahlian-item">
					<img class="keahlian-img" src="{{ asset('') }}/image/lightning-icon.png" alt="Card {{ asset('') }}/image cap">
					<div class="keahlian-text">
						<h5 class="keahlian-title"><b>TEKNIK INSTALASI TENAGA LISTRIK</b></h5>
						<a href="#">Baca Selengkapnya</a>
					</div>
    			</div>
    			<div class="col-6 col-md-4 text-center keahlian-item">
					<img class="keahlian-img" src="{{ asset('') }}/image/lightning-icon.png" alt="Card {{ asset('') }}/image cap">
					<div class="keahlian-text">
						<h5 class="keahlian-title"><b>AUDIO VIDEO</b></h5>
						<a href="#">Baca Selengkapnya</a>
					</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="sambutan">
    	<div class="container">
    		<div class="row title">
    			<h2 class="mx-auto"><b>Sambutan</b> Kepala Sekolah</h2>
    		</div>
    		<div class="row sambutan-content text-center text-lg-left">
    			<div class="col-12 col-lg-3 offset-lg-1">
	    			<div class="sambutan-overlay mx-auto mb-3">
		    			<img src="{{ asset('') }}/image/PakAsepTapip.jpg">
	    			</div>
    			</div>
    			<div class="col-12 col-lg-7">
    				<h3 class="mb-3">Dr. Asep Tapip Yani, M.Pd</h3>
	    			<p>Sampurasun, SMKN 4 BANDUNG adalah Sekolah Menengah Kejuruan yang memiliki kelompok bidang keahlian Ketenaga Listrikan, Audio Video, dan Teknik Komputer dan Informatika. Keberadaannya didukung oleh dunia usaha dan dunia industri, baik dalam pembelajaran maupun penyerapan lulusannya. Pembelajaran teori dan praktek tidak hanya dilakukan di dalam kelas tetapi dilakukan di dunia industri melalui praktek kerja industri di perusahaan-perusahaan yang relevan.

	    			<br><br>

	    			Lulusannya telah tersebar di berbagai perguruan tinggi dan Dunia Usaha/Dunia Industri. Kesempatan untuk melanjutkan studi dan bekerja sangat terbuka luas bagi lulusannya. Jalur PMDK tersedia bagi lulusan yang berprestasi baik PN maupun Swasta. Bagi siswa yang ingin bekerja, penempatannya didukung oleh Disnaker melalui Bursa Kerja Khusus (BKK) sesuai dengan kualifikasi yang di persyaratkan oleh perusahaa, serta siswa dapat berwirausaha sesuai dengan kompetensi keahlian masing-masing.</p>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="tentang">
    	<div class="container">
    		<div class="row title">
    			<h2 class="mx-auto"><b>Tentang</b> SMKN 4 BANDUNG</h2>
    		</div>
    		<div class="row text">
    			<p>
    				SMKN 4 BANDUNG adalah Sekolah Menengah Kejuruan yang memiliki kelompok bidang keahlian Ketenaga Listrikan, Audio Video, dan Teknik Komputer dan Informatika. Keberadaannya didukung oleh dunia usaha dan dunia industri, baik dalam pembelajaran maupun penyerapan lulusannya. Pembelajaran teori dan praktek tidak hanya dilakukan di dalam kelas tetapi dilakukan di dunia industri melalui praktek kerja industri di perusahaan-perusahaan yang relevan.
    				<br>
    				<br>
					Lulusannya telah tersebar di berbagai perguruan tinggi dan Dunia Usaha/Dunia Industri. Kesempatan untuk melanjutkan studi dan bekerja sangat terbuka luas bagi lulusannya. Jalur PMDK tersedia bagi lulusan yang berprestasi baik PN maupun Swasta. Bagi siswa yang ingin bekerja, penempatannya didukung oleh Disnaker melalui Bursa Kerja Khusus (BKK) sesuai dengan kualifikasi yang di persyaratkan oleh perusahaa, serta siswa dapat berwirausaha sesuai dengan kompetensi keahlian masing-masing.
    			</p>
    		</div>
    	</div>
    </section>
@endsection