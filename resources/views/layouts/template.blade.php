<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SMK Negeri 4 BANDUNG</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}css/font-awesome.min.css">
    <link rel='stylesheet' type="text/css" href="{{ asset('') }}css/fullcalendar.min.css">
    <link rel="icon" type="text/css" href="{{ asset('') }}image/smkn4.png">

@stack('css')

</head>

<body>
    
    <nav class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('') }}">
            	<div class="row">
	            	<div class="col p-0">
			        	<img src="{{ asset('') }}image/smkn4.png" class="d-inline-block align-middle mr-3" alt="Logo SMKN 4">
	            	</div>
	            	<div class="col px-0 pt-2">
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
							@foreach (\App\Halaman::all() as $halaman)
							<a class="dropdown-item" href="{{ url('info/' . $halaman->slug) }}">{{ str_replace('SMK Negeri 4 Bandung', '', $halaman->judul) }}</a>
							@endforeach
						</div>
                    </li>
                    <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Program Studi
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ url('program-studi/tkj') }}">Teknik Komputer Jaringan</a>
							<a class="dropdown-item" href="{{ url('program-studi/rpl') }}">Rekayasa Perangkat Lunak</a>
							<a class="dropdown-item" href="{{ url('program-studi/mm') }}">Multimedia</a>
							<a class="dropdown-item" href="{{ url('program-studi/toi') }}">TOI</a>
							<a class="dropdown-item" href="{{ url('program-studi/titl') }}">TITL</a>
							<a class="dropdown-item" href="{{ url('program-studi/av') }}">Audio Video</a>
						</div>
                    </li>
                    <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Ekstrakurikuler
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ url('ekstrakurikuler/teknologi') }}">Teknologi</a>
							<a class="dropdown-item" href="{{ url('ekstrakurikuler/seni') }}">Seni</a>
							<a class="dropdown-item" href="{{ url('ekstrakurikuler/pmr') }}">PMR</a>
						</div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://prestasi.smkn4bdg.sch.id/">Prestasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="calendar-wrapper">
	    <div id="calendar-btn">
	    	<a href="javascript:void(0)" class="btn btn-primary btn-lg" id="btn-calendar"><i class="fa fa-calendar"></i></a>
	    </div>
	    <div id='calendar'></div>
    </div>

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
							<li><a href="https://prestasi.smkn4bdg.sch.id/">Prestasi</a></li>
						</ul>
		    		</div>
		    	</div>
	    	</div>
    	</div>

    	<div class="bottom-footer">
    		<p class="text-center">Copyright &copy; 2017 <b><a href="#">smkn4bdg.sch.id</a></b> All Rights Reserved</p>
    	</div>
    </footer>

	<script type="text/javascript" src="{{ asset('') }}js/jquery.min.js"></script>
	<script type="text/javascript" src="{{ asset('') }}js/popper.min.js"></script>
	<script type="text/javascript" src="{{ asset('') }}js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{ asset('') }}js/moment.js"></script>
	<script type="text/javascript" src="{{ asset('') }}js/fullcalendar/fullcalendar.min.js"></script>
	<script type="text/javascript" src="{{ asset('') }}js/fullcalendar/id.js"></script>
	@stack('js')

	<script type="text/javascript">
		function myMap() {
            var myCenter = new google.maps.LatLng(-6.9416583,107.6288947);
            var mapCanvas = document.getElementById("googleMap");
            var mapOptions = {
            	center: myCenter,
            	zoom: 17
            };
            var map = new google.maps.Map(mapCanvas, mapOptions);
            var marker = new google.maps.Marker({
            	position:myCenter
            });
            marker.setMap(map);
        }

        $('#calendar').fullCalendar({
        	header: {
				left: 'title',
				right: 'prev,next',
			},
			locale: 'id',
			aspectRatio: 1.6,
			columnFormat: 'dddd',
			buttonIcons: true,
			eventLimit: true,
			events: [
				@foreach (\App\Kalender::all() as $kalender)
				{
					title: '{{ $kalender->judul }}',
					start: '{{ $kalender->start->format('Y-m-d') }}',
					@if ($kalender->end)
					end: '{{ $kalender->end->format('Y-m-d') }}',
					@endif
				},
				@endforeach
			],
        });

        function checkWindowSize() {
        	if ($(window).width() < 768) {
	        	$('.calendar-wrapper').css('right', '-650px');
        	}
        }

        $('#btn-calendar').on('click', function (e) {
        	var right = $('.calendar-wrapper').css('right');
        	if ($(window).width() >= 768) {
	        	if (right == '0px') {
		        	$('.calendar-wrapper').css('right', '-650px');
	        	} else {
		        	$('.calendar-wrapper').css('right', 0);
	        	}
        	} else {
        		$(location).attr('href', '{{ url('calendar') }}');
        	}
        });

	    checkWindowSize();

        $(window).resize(function() {
            checkWindowSize();
        });

        $(window).scroll(function() {
        	var y = $(this).scrollTop();
        	$('.scroll-show').each(function () {
		        var t = $(this).parent().offset().top;
		        if (y > t - 450) {
		            $(this).css('opacity', 1);
		            $(this).css('margin-top', 0);
		        } else {
		            $(this).css('opacity', 0);
		            $(this).css('margin-top', '60px');
		        }
		    });
        });
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbJ83iOH3BNaVWtOjaKUikj9sx2OIHzfs&callback=myMap"></script>
</body>

</html>