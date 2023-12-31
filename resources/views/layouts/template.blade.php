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
	<link rel="stylesheet" href="{{ asset('assets') }}/vendors/bootstrap4-multidropdown/css/bootstrap-4-navbar.css">
	<link rel="icon" type="text/css" href="{{ asset('') }}image/smkn4.png">

	@stack('css')

</head>

<body>

<nav class="navbar navbar-expand-lg bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="{{ url('') }}">
			<div class="row">
				<div class="col p-0">
					<img src="{{ asset('') }}image/smkn4.png" class="d-inline-block align-middle mr-3"
						 alt="Logo SMKN 4">
				</div>
				<div class="col px-0 pt-2">
					<span>SMKN 4 BANDUNG</span><br>
					<span class="small">Kuat Ma'rifat</span>
				</div>
			</div>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
				aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fa fa-bars"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<ul class="navbar-nav ml-auto mt-2 mt-lg-0">

				{!! MenuHelper::renderNavbar() !!}

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
					<div id="googleMap">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.5728150973055!2d107.62668741521406!3d-6.9415470949847835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e86413eb50ad%3A0xf9930b5268e3fee1!2sSMKN%204%20Bandung!5e0!3m2!1sen!2sid!4v1626333703443!5m2!1sen!2sid"
								width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-4 offset-lg-1 footer-info text-center text-sm-left mb-3 pb-3">
					<img class="img-logo" src="{{ asset('') }}image/smkn4.png">
					<img class="img-dinas" src="{{ asset('') }}image/logodinas.png" style="width: 120px">
					<img class="img-kemdikbud" src="{{ asset('') }}image/logokemdikbud.png" style="width: 80px">
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
					<a href="line://ti/p/@smkn4bdg"><img src="{{ asset('image/line.png') }}"
														 style="width:40px; height: 40px; margin-bottom: 1px; margin-left: 1px;"></a>
				</div>
				<div class="col-12 col-sm-6 col-lg-4 text-center text-sm-right text-md-left">
					<ul class="footer-nav">
						<li><a href="{{ url('') }}">Beranda</a></li>
						<li><a href="{{ url('berita') }}">Berita</a></li>
						<li><a href="https://prestasi.smkn4bdg.sch.id/">Prestasi</a></li>
						<li><a href="http://disdik.jabarprov.go.id/">Dinas Pendidikan Jawa Barat</a></li>
						<li><a href="https://www.kemdikbud.go.id/">Kementrian Pendidikan dan Kebudayaan</a></li>
						<li><a href="http://referensi.data.kemdikbud.go.id/">Referensi Pendidikan</a></li>
						<li><a href="{{ url('literasi') }}">Digital Literasi</a></li>
						<li><a href="https://www.kemdikbud.go.id/">Sitemap</a></li>
						<li><a href="https://www.kemdikbud.go.id/">Tanya Jawab</a></li>
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
<script src="{{ asset('assets') }}/vendors/bootstrap4-multidropdown/js/bootstrap-4-navbar.js"></script>

@stack('js')

<script type="text/javascript">
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
    displayEventTime: false,
    events: [
			@foreach (\App\Kalender::all() as $kalender)
      {
        title: '{{ $kalender->judul }}',
        start: '{{ $kalender->start->format('Y-m-d\\T00:00:00') }}',
			@if ($kalender->end)
            end: '{{ $kalender->end->format('Y-m-d\\T23:59:59') }}',
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

  $(window).resize(function () {
    checkWindowSize();
  });

  $(window).scroll(function () {
    var y = $(this).scrollTop();
    $('.scroll-show').each(function () {
      var t = $(this).parent().offset().top;
      if ($(window).width() >= 768) {
        if (y > t - 450) {
          $(this).css('opacity', 1);
          $(this).css('margin-top', 0);
        } else {
          $(this).css('opacity', 0);
          $(this).css('margin-top', '60px');
        }
      } else {
        $(this).css('opacity', 1);
        $(this).css('margin-top', 0);
      }
    });
  });
</script>
</body>
</html>
