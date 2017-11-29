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
                                <option>Status</option>
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

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css">
@endpush
@push('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    $('.datepicker').datepicker({
        todayBtn: true,
        todayHighlight: true,
    });
</script>
@endpush