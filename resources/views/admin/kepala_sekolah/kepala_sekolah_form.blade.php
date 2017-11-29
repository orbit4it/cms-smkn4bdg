@extends('admin.header')
@section('title', 'Kepala Sekolah')
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
    				Form Kepala Sekolah
    			</div>
				<form action="{{ @$kepalaSekolah ? url('admin/kepala-sekolah/' . $kepalaSekolah->id_kepala_sekolah) : url('admin/kepala-sekolah') }}" method="POST" enctype="multipart/form-data" class="form-kepalaSekolah">
					{{ csrf_field() }}
					@if (@$kepalaSekolah)
					{{ method_field('PATCH') }}
					@endif
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') ? old('nama') : (@$kepalaSekolah ? $kepalaSekolah->nama : '') }}">
                        </div>
                        <div class="form-group">
                            <label>Sambutan</label>
                            <textarea name="sambutan" class="form-control" rows="5">{{ old('sambutan') ? old('sambutan') : (@$kepalaSekolah ? $kepalaSekolah->sambutan : '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input name="foto" class="form-control" type="file">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="">Pilih Status</option>
                                <option value="1" {{ old('status') == 1 ? 'selected' : @$kepalaSekolah->status == 1 ? 'selected' : ''}}>Aktif</option>
                                <option value="2" {{ old('status') == 2 ? 'selected' : @$kepalaSekolah->status == 2 ? 'selected' : ''}}>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
					<div class="panel-footer text-right">
						<a class="btn" href="{{ url('admin/kepala-sekolah') }}">Cancel</a>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
    	</div>
    </div>
	<!-- END MAIN CONTENT -->

</div><!-- END PAGE CONTENT -->
@endsection

@push('js')
<script src="{{ asset('assets') }}/vendors/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="{{ asset('assets') }}/vendors/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script src="{{ asset('assets') }}/vendors/unisharp/laravel-ckeditor/config.js"></script>
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
</script>
@endpush