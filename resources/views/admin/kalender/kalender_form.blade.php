@extends('admin.header')
@section('title', 'Kalender')
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
    				Form Kalender
    			</div>
				<form action="{{ @$kalender ? url('admin/kalender/' . $kalender->id_kalender) : url('admin/kalender') }}" method="POST" enctype="multipart/form-data" class="form-kalender">
					{{ csrf_field() }}
					@if (@$kalender)
					{{ method_field('PATCH') }}
					@endif
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" value="{{ old('judul') ? old('judul') : (@$kalender ? $kalender->judul : '') }}">
                        </div>
                        <div class="form-group">
                            <label>Mulai</label>
                            <input type="text" name="start" class="form-control datepicker startDate" value="{{ old('start') ? old('start') : (@$kalender ? $kalender->start->format('m/d/Y') : '') }}">
                        </div>
                        <div class="form-group">
                            <label>Selesai (Opsional)</label>
                            <input type="text" name="end" class="form-control datepicker endDate" value="{{ old('end',@$kalender->end ? $kalender->end->format('m/d/Y') : '' ) }}">
                        </div>
                    </div>
					<div class="panel-footer text-right">
						<a class="btn" href="{{ url('admin/kalender') }}">Cancel</a>
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