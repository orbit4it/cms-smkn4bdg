<!--BEGIN FOOTER-->
    <div id="footer">
      <div class="copyright">&copy; 2012-{{ date('Y') }}. SMK Negeri 4 Bandung</div>
    </div><!--END FOOTER-->
</div><!--END WRAPPER-->
	
</div><!-- END UTAMA -->

<script src="{{ asset('assets') }}/js/jquery-1.10.2.min.js"></script>
<script src="{{ asset('assets') }}/js/jquery-ui.js"></script>
<script src="{{ asset('assets') }}/js/jquery-migrate-1.2.1.min.js"></script>

<!--loading bootstrap js-->
<script src="{{ asset('assets') }}/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('assets') }}/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="{{ asset('assets') }}/js/html5shiv.js"></script>
<script src="{{ asset('assets') }}/js/respond.min.js"></script>
<script src="{{ asset('assets') }}/vendors/metisMenu/jquery.metisMenu.js"></script>
<script src="{{ asset('assets') }}/vendors/slimScroll/jquery.slimscroll.js"></script>
<script src="{{ asset('assets') }}/vendors/jquery-cookie/jquery.cookie.js"></script>
<script src="{{ asset('assets') }}/vendors/iCheck/icheck.min.js"></script>
<script src="{{ asset('assets') }}/vendors/iCheck/custom.min.js"></script>
<script src="{{ asset('assets') }}/vendors/jquery-notific8/jquery.notific8.min.js"></script>
<script src="{{ asset('assets') }}/vendors/jquery-highcharts/highcharts.js"></script>
<script src="{{ asset('assets') }}/vendors/jquery-nestable/jquery.nestable.js"></script>
<script src="{{ asset('assets') }}/js/jquery.menu.js"></script>
<script src="{{ asset('assets') }}/vendors/holder/holder.js"></script>
<script src="{{ asset('assets') }}/vendors/responsive-tabs/responsive-tabs.js"></script>
<script src="{{ asset('assets') }}/vendors/jquery-news-ticker/jquery.newsTicker.min.js"></script>
<script src="{{ asset('assets') }}/vendors/moment/moment.js"></script>
<script src="{{ asset('assets') }}/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="{{ asset('assets') }}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="{{ asset('assets') }}/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="{{ asset('assets') }}/vendors/DataTables/media/js/jquery.dataTables.js"></script>
<script src="{{ asset('assets') }}/vendors/DataTables/media/js/dataTables.bootstrap.js"></script>
<script src="{{ asset('assets') }}/vendors/input-mask/jquery.inputmask.bundle.js"></script>
<script src="{{ asset('assets') }}/vendors/sweetalert/dist/sweetalert.min.js"></script>

<!--CORE JAVASCRIPT-->
<script src="{{ asset('assets') }}/js/main.js"></script>
<script src="{{ asset('assets') }}/vendors/calendar/zabuto_calendar.min.js"></script>

@stack('js')

<script type="text/javascript">	
	$(document).on("ready", function() {
        var loc = location.href.split("/");
        if (loc[loc.length-1] == "") loc = loc.splice(0, loc.length-1);
        
        loc = loc.splice(0, 7);
        loc = loc.join("/");
        
        loc = loc.replace("#", "");
        
        $('#side-menu [href="' + loc + '"]').parent().parent().addClass('in');
        $('#side-menu [href="' + loc + '"]').parent().addClass("active").parent().parent().addClass("active").removeClass('collapse');
        
        loc = loc.split("/");
        if (loc[loc.length-1] == "") loc = loc.splice(0, loc.length-1);
        loc = loc.splice(0, 6);
        loc = loc.join("/");
        
        $('.sidemenu [href="' + loc + '"]').parent().addClass("active").parent().parent().addClass("active").removeClass('collapse');

	});
	
</script>
</body>
</html>