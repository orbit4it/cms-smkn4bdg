@extends('admin.header')
@section('title', 'Sponsor')
@section('content')
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">@yield('title')</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
        </li>
        <li>
            <a href="#">Admin</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">
            @yield('title')
        </li>
    </ol>
    <div class="clearfix"></div>
</div>
<div class="page-content">

    @include('admin.error')

	<!-- BEGIN MAIN CONTENT -->
    <div class="row">
    	<div class="col-xs-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				Form Sponsor
    			</div>
				<form action="{{ @$sponsor ? url('admin/sponsor/' . $sponsor->id_sponsor) : url('admin/sponsor') }}" method="POST" enctype="multipart/form-data" class="form-sponsor">
					{{ csrf_field() }}
					@if (@$sponsor)
					{{ method_field('PATCH') }}
					@endif
					<div class="panel-body">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" value="{{ old('nama') ? old('nama') : (@$sponsor ? $sponsor->nama : '') }}">
						</div>
                        <div class="form-group">
                            <label>Logo</label>
                            <input type="file" name="foto">
                        </div>
					</div>
					<div class="panel-footer text-right">
						<a class="btn" href="{{ url('admin/sponsor') }}">Cancel</a>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
    	</div>
    </div>
	<!-- END MAIN CONTENT -->

</div><!-- END PAGE CONTENT -->
@endsection

@push('css')

@endpush
@push('js')
<script src="{{ asset('assets') }}/vendors/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="{{ asset('assets') }}/vendors/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script type="text/javascript">

	$('textarea').ckeditor({
		height:300,
        filebrowserBrowseUrl : '{{ url('elfinder/ckeditor') }}',
        getFileCallback : function(file) {
            window.opener.CKEDITOR.tools.callFunction((function() {
                var reParam = new RegExp('(?:[\?&]|&amp;)CKEditorFuncNum=([^&]+)', 'i') ;
                var match = window.location.search.match(reParam) ;
                return (match && match.length > 1) ? match[1] : '' ;
            })(), file.url);
            elf.destroy();
            window.close();
        },
	});

</script>

@endpush