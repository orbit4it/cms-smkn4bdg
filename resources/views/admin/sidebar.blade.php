<div id="wrapper">
	<!--BEGIN SIDEBAR MENU-->
    <nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
        <div class="sidebar-collapse menu-scroll">
            <ul id="side-menu" class="nav">
                <li class="user-panel">
                    <div class="thumb">
                        <img src="{{asset('assets')}}/images/avatar/avatar6_big.png" alt="" class="img-circle"/>
                    </div>

                    <div class="info">
                        <p>
                            {{ Auth::user()->username }}
                        </p>
                        <small class="small">{{ '' }}</small>
                    </div>
                </li>
		  
                <li>
                    <a href="{{url('admin')}}">
                        <i class="fa fa-home fa-fw">
                            <div class="icon-bg bg-orange"></div>
                        </i>
                        <span class="menu-title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/album')}}">
                        <i class="fa fa-picture-o fa-fw">
                            <div class="icon-bg bg-orange"></div>
                        </i>
                        <span class="menu-title">Album</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/berita')}}">
                        <i class="fa fa-newspaper-o fa-fw">
                            <div class="icon-bg bg-orange"></div>
                        </i>
                        <span class="menu-title">Berita</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/halaman')}}">
                        <i class="fa fa-file-text-o fa-fw">
                            <div class="icon-bg bg-orange"></div>
                        </i>
                        <span class="menu-title">Halaman</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/sponsor')}}">
                        <i class="fa fa-font-awesome fa-fw">
                            <div class="icon-bg bg-orange"></div>
                        </i>
                        <span class="menu-title">Sponsor</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/kalender')}}">
                        <i class="fa fa-calendar fa-fw">
                            <div class="icon-bg bg-orange"></div>
                        </i>
                        <span class="menu-title">Kalender</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-trophy fa-fw">
                            <div class="icon-bg bg-green"></div>
                        </i>
                        <span class="menu-title">
                            Prestasi
                        </span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{url('/prestasi')}}"><i class="fa fa-home"></i><span class="submenu-title">Homepage Prestasi</span></a>
                        </li>
                        <li><a href="{{url('/prestasi/admin/home')}}"><i class="fa fa-archive"></i><span class="submenu-title">
                            Data Prestasi
                        </span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-cog fa-fw">
                            <div class="icon-bg bg-green"></div>
                        </i>
                        <span class="menu-title">
                            Admin
                        </span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{url('admin/import')}}"><i class="fa fa-briefcase"></i><span class="submenu-title">Import Data Master</span></a>
                        </li>
                        <li><a href="{{url('admin/export')}}"><i class="fa fa-archive"></i><span class="submenu-title">
                            File Excel Data Login
                        </span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!--END SIDEBAR MENU-->