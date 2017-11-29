@extends('admin.header')
@section('title', 'Halaman')
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
    				Form Halaman
    			</div>
				<form action="{{ @$halaman ? url('admin/halaman/' . $halaman->id_halaman) : url('admin/halaman') }}" method="POST" enctype="multipart/form-data" class="form-halaman">
					{{ csrf_field() }}
					@if (@$halaman)
					{{ method_field('PATCH') }}
					@endif
					<div class="panel-body">
						<div class="form-group">
							<label>Judul</label>
							<input type="text" name="judul" class="form-control" value="{{ old('judul') ? old('judul') : (@$halaman ? $halaman->judul : '') }}">
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea class="form-control" name="deskripsi" id="editor" rows="5">{{ old('deskripsi') ? old('deskripsi') : (@$halaman ? $halaman->deskripsi : '') }}</textarea>
						</div>
						<div class="form-group">
							<label>Gambar Utama</label>
							<input type="file" name="foto">
						</div>
					</div>
					<div class="panel-footer text-right">
						<a class="btn" href="{{ url('admin/halaman') }}">Cancel</a>
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
    CKEDITOR.config.extraPlugins = 'justify';

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

	function processClose(file) {
        $(".modal-choose-file").modal('hide');
    }
    
    function processSelectedFile(file) {
        $(".filename").show().html('<i class="fa fa-paperclip"></i> ' + file);
        $(".btnChooseFile").html("Ganti File");
        $("[name=file]").val(file);
    }
    
    $(function() {
        @if(!empty($result))
            $(".btnChooseFile").html("Ganti File");
        @else
            $('.filename').hide();
        @endif
        
        $(".btnChooseFile").click(function() {
            $(".modal-choose-file").modal('show');
            $(".modal-body").html('<iframe src="{{ url('elfinder/template/file') }}"></iframe>');
        });
    });

</script>

@endpush