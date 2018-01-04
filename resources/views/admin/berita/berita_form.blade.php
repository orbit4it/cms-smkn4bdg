@extends('admin.header')
@section('title', 'Berita')
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
    				Form Berita
    			</div>
				<form action="{{ @$berita ? url('admin/berita/' . $berita->id_berita) : url('admin/berita') }}" method="POST" enctype="multipart/form-data" class="form-berita">
					{{ csrf_field() }}
					@if (@$berita)
					{{ method_field('PATCH') }}
					@endif
					<div class="panel-body">
						<div class="form-group">
							<label>Judul</label>
							<input type="text" name="judul" class="form-control" value="{{ old('judul') ? old('judul') : (@$berita ? $berita->judul : '') }}">
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea class="form-control" name="deskripsi" id="editor" rows="5">{{ old('deskripsi') ? old('deskripsi') : (@$berita ? $berita->deskripsi : '') }}</textarea>
						</div>
                        <div class="form-group">
                            <label>Gambar Utama</label>
                            <input type="file" name="foto">
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="id_kategori" class="form-control">
                                <option>Pilih Kategori</option>
                                @foreach (\App\Kategori::all() as $kategori)
                                <option value="{{ $kategori->id_kategori }}" {{ old('id_kategori') == $kategori->id_kategori ? 'selected' : @$berita->id_kategori == $kategori->id_kategori ? 'selected' : ''}}>{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="created_at" class="form-control" value="{{ old('created_at', @$berita->created_at ? $berita->created_at->format('Y-m-d') : '') }}">
                        </div>
					</div>
					<div class="panel-footer text-right">
						<a class="btn" href="{{ url('admin/berita') }}">Cancel</a>
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

</script>

@endpush