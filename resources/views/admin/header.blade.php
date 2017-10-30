<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title') | SMK Negeri 4 Bandung</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
	<link rel="shortcut icon" href="{{ asset('assets') }}/images/logo/logo.png">
	<link rel="apple-touch-icon" href="{{ asset('assets') }}/images/icons/favicon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets') }}/images/icons/favicon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets') }}/images/icons/favicon-114x114.png">
	<!--Loading bootstrap css-->
	<link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/css/fonts.css">
	<link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
  	<link rel="stylesheet" href="{{ asset('') }}/css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/vendors/bootstrap/css/bootstrap.min.css">
	<!--LOADING STYLESHEET FOR PAGE--><!--Loading style vendors-->
	<link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/vendors/animate.css/animate.css">
	<link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/vendors/jquery-pace/pace.css">
	<link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/vendors/iCheck/skins/all.css">
	<link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/vendors/jquery-notific8/jquery.notific8.min.css">
	<link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/vendors/jquery-nestable/nestable.css">
	<link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/vendors/bootstrap-daterangepicker/daterangepicker-bs3.css">
	<link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/vendors/bootstrap-datepicker/css/datepicker3.css">

	<link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">

	<link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/vendors/calendar/zabuto_calendar.min.css">
	<!--Loading style-->
	<link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/css/themes/style1/orange-blue.css" class="default-style">
	<link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/css/themes/style1/orange-blue.css" id="theme-change" class="style-change color-change">
	<link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/css/style-responsive.css">
	<link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
	<link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/vendors/pageloader/pageloader.css">
    
  <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/vendors/DataTables/media/css/jquery.dataTables.css">
  <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/vendors/DataTables/media/css/dataTables.bootstrap.css">
  <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/vendors/sweetalert/dist/sweetalert.css">
  <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/vendors/sweetalert/themes/facebook/facebook.css">

    @stack('css')
</head>
<body class=" ">
<div id="preloader">
	<div id="pageloader3">
		<div class="spinner demo">
			<div class="loader">
			  <div class="circle"></div>
			  <div class="circle"></div>
			  <div class="circle"></div>
			  <div class="circle"></div>
			  <div class="circle"></div>
			</div>
		</div>
	</div>
</div>
<div><!-- UTAMA -->
    
<!--BEGIN BACK TO TOP-->
	<a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
  <!--END BACK TO TOP-->
  
  <!--BEGIN TOPBAR-->
  <div id="header-topbar-option-demo" class="page-header-topbar">
    <nav id="topbar" role="navigation" style="margin-bottom: 0; z-index: 2;" class="navbar navbar-default navbar-static-top">
      <div class="navbar-header">
        <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <a id="logo" href="{{ url('/') }}" class="navbar-brand">           
            <span class="logo-text">
                SMK Negeri 4 Bandung
            </span>
            <span style="display: none" class="logo-text-icon">
				<img src="{{ asset('assets') }}/images/logo/logo.png" alt="" class="logo" />
            </span>
        </a>
        </div>
      <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
        <form id="topbar-search" action="#" method="GET" class="hidden-xs">
          <div class="input-group">
            <input type="text" placeholder="Cari..." class="form-control"/>
            <span class="input-group-btn"><a href="javascript:;" class="btn submit"><i class="fa fa-search"></i></a></span></div>
        </form>
                
		<ul class="nav lnavbar navbar-top-links navbar-right mbn">
		  <li class="dropdown col-xs-5"></li>
		  
      <li class="dropdown topbar-user">
        <a data-hover="dropdown" href="#" class="dropdown-toggle">
			    <img src="{{asset('assets')}}/images/avatar/avatar6.png" alt="" class="img-circle"/>&nbsp;
			    <span class="hidden-xs">
            {{ Auth::user()->username }}
          </span>&nbsp;<span class="caret"></span>
        </a>
        <ul class="dropdown-menu dropdown-user pull-right">
          <li><a href="#"><i class="fa fa-user"></i>Profil Saya</a></li>
          <li><a href="#"><i class="fa fa-calendar"></i>Kalendar Saya</a></li>
          <li class="divider"></li>
          <li><a href="{{ url('logout') }}"><i class="fa fa-key"></i>Log Out</a></li>
        </ul>
      </li>
        </ul>
      </div>
    </nav></div>
  <!--END TOPBAR-->

@include('admin.sidebar')
    
    <div id="page-wrapper">
        <!--BEGIN TITLE & BREADCRUMB PAGE-->
        @yield('content')
        <!--END CONTENT-->
    </div>
    
@include('admin.footer')