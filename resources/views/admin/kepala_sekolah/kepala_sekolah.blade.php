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
    				Data Kepala Sekolah
    			</div>
				<div class="panel-body">
					<p><a href="{{ url('admin/kepala-sekolah/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kepala Sekolah</a></p>
			    	<table class="table table-bordered">
			    		<thead>
			    			<tr>
				    			<th>#</th>
				    			<th>Nama</th>
				    			<th>Status</th>
				    			<th>Action</th>
			    			</tr>
			    		</thead>
			    		<tbody>
			    			@foreach (\App\KepalaSekolah::all() as $kepalaSekolah)
			    			<tr>
			    				<td width="120"><img src="{{ url('uploads/' . $kepalaSekolah->foto) }}" width="100"></td>
			    				<td>{{ $kepalaSekolah->nama }}</td>
			    				<td>{{ $kepalaSekolah->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
			    				<td>
			    					<form action="{{ url('admin/kepala-sekolah/' . $kepalaSekolah->id_kepala_sekolah) }}" method="POST">
				    					<a href="{{ url('admin/kepala-sekolah/' . $kepalaSekolah->id_kepala_sekolah . '/edit') }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
				    					<button class="btn btn-danger btn-delete" type="submit"><i class="fa fa-trash"></i></button>
			    					</form>
			    				</td>
			    			</tr>
			    			@endforeach
			    		</tbody>
			    	</table>
				</div>
			</div>
    	</div>
    </div>
	<!-- END MAIN CONTENT -->

</div><!-- END PAGE CONTENT -->
@endsection

@push('css')
@endpush
@push('js')
<script type="text/javascript">
	$(document).ready(function() {
		$('.btn-delete').click(function(e) {
			e.preventDefault();
			var url = $(this).parent().attr('action');
			var tr = $(this).parent().parent().parent();
			swal({
				title: "Are you sure?",
				text: "Your will not be able to recover this imaginary file!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes, delete it!",
				closeOnConfirm: false
			},
			function(){
				$.ajax({
					data: {
						'_token' : '{{ csrf_token() }}',
						'_method' : 'DELETE',
					},
					url: url,
					method: 'POST',
				}).done(function(result) {
					swal("Deleted!", "Your imaginary file has been deleted.", "success");
					tr.hide();
				});
			});
		});
	});
</script>
@endpush