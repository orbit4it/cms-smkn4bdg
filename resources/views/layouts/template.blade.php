<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SMKN 4 BANDUNG</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}css/stylesheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}css/style.css">
    <link rel="stylesheet" href="{{ asset('') }}css/font-awesome.min.css">
    <link rel="icon" type="text/css" href="{{ asset('') }}image/smkn4.png">

@stack('css')

</head>

<body>
    
    <nav class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('') }}">
            	<div class="row">
	            	<div class="col p-0">
			        	<img src="{{ asset('') }}image/smkn4.png" class="d-inline-block align-middle mr-3" alt="">
	            	</div>
	            	<div class="col p-0">
			        	<span>SMKN 4 BANDUNG</span><br>
			        	<span class="small">Kuat Ma'rifat</span>
	            	</div>
            	</div>
	        </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('') }}">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Info
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ url('') }}">Sejarah</a>
							<a class="dropdown-item" href="{{ url('') }}">Visi & Misi</a>
							<a class="dropdown-item" href="{{ url('') }}">Data Pokok Sekolah</a>
							<a class="dropdown-item" href="{{ url('') }}">Data Siswa</a>
							<a class="dropdown-item" href="{{ url('') }}">Data Guru</a>
							<a class="dropdown-item" href="{{ url('') }}">Fasilitas</a>
							<a class="dropdown-item" href="{{ url('') }}">Virtual Tour</a>
						</div>
                    </li>
                    <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Program Studi
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ url('') }}">Teknik Komputer Jaringan</a>
							<a class="dropdown-item" href="{{ url('') }}">Rekayasa Perangkat Lunak</a>
							<a class="dropdown-item" href="{{ url('') }}">Multimedia</a>
							<a class="dropdown-item" href="{{ url('') }}">TOI</a>
							<a class="dropdown-item" href="{{ url('') }}">TITL</a>
							<a class="dropdown-item" href="{{ url('') }}">Audio Video</a>
						</div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('') }}">Ekstrakurikuler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="prestasi.smkn4bdg.sch.id">Prestasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
    	<div class="top-footer">
	    	<div class="container">
		    	<div class="row">
		    		<div class="col-12 col-lg-3">
		    			<div id="googleMap"></div>
		    		</div>
		    		<div class="col-12 col-sm-6 col-lg-4 offset-lg-1 footer-info text-center text-sm-left mb-3 pb-3">
		    			<img src="{{ asset('') }}image/smkn4.png">
		    			<h5>SMK NEGERI 4 BANDUNG</h5>
		    			<p>
		    				Jalan Kliningan Nomor 6 Buah Batu<br>
		    				Telp/Fax : (022) - 7303736<br>
			    			Kode Pos : 40264 Kota Bandung<br>
			    			Provinsi Jawa Barat<br>
			    			Indonesia
			    		</p>
		    			<a href="https://twitter.com/smkn4bdg"><i class="fa fa-twitter fa-lg"></i></a>
		    			<a href="https://www.facebook.com/smkn4bandung/"><i class="fa fa-facebook fa-lg"></i></a>
		    		</div>
		    		<div class="col-12 col-sm-6 col-lg-4">
		    			<ul class="footer-nav">
							<li><a href="{{ url('') }}">Beranda</a></li>
							<li><a href="{{ url('berita') }}">Berita</a></li>
							<li><a href="{{ url('') }}">Ekstrakurikuler</a></li>
							<li><a href="{{ url('') }}">Studi</a></li>
							<li><a href="{{ url('') }}">Profil</a></li>
							<li><a href="{{ url('') }}">Prestasi</a></li>
						</ul>
		    		</div>
		    	</div>
	    	</div>
    	</div>

    	<div class="bottom-footer">
    		<p class="text-center">Copyright &copy; 2017 <b><a href="#">smkn4bdg.sch.id</a></b> All Rights Reserved</p>
    	</div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	<script>
		function myMap() {
			var myCenter = new google.maps.LatLng(-6.9416583,107.6288947);
			var mapCanvas = document.getElementById("googleMap");
			var mapOptions = {center: myCenter, zoom: 17};
			var map = new google.maps.Map(mapCanvas, mapOptions);
			var marker = new google.maps.Marker({position:myCenter});
			marker.setMap(map);
		}
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbJ83iOH3BNaVWtOjaKUikj9sx2OIHzfs&callback=myMap"></script>
</body>

</html>