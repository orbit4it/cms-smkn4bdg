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
    				Data Berita
    			</div>
				<div class="panel-body">
					<p><a href="{{ url('admin/berita/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Berita</a></p>
					<!-- <div id="summernote">Hello Summernote</div> -->
			    	<table class="table table-bordered">
			    		<thead>
			    			<tr>
				    			<th>No</th>
				    			<th>Judul</th>
				    			<th>Tanggal</th>
				    			<th>Action</th>
			    			</tr>
			    		</thead>
			    		<tbody>
			    			@foreach (\App\Berita::orderBy('created_at', 'DESC')->get() as $berita)
			    			<tr>
			    				<td>{{ @$i ? $i += 1 : $i = 1 }}</td>
			    				<td>{{ $berita->judul_berita }}</td>
			    				<td>{{ $berita->created_at->format('l, d F Y - H:i') }}</td>
			    				<td>
			    					<form action="{{ url('admin/berita/' . $berita->id_berita . '/delete') }}" method="POST">
			    						{{ csrf_field() }}
			    						{{ method_field('DELETE') }}
				    					<a href="{{ url('admin/berita/' . $berita->id_berita) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
				    					<button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
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
@endpush