@extends('admin.header')
@section('title', 'Album')
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
    				Data Album
    			</div>
				<div class="panel-body">
					<p><a href="{{ url('admin/album/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Album</a></p>
			    	<table class="table table-bordered">
			    		<thead>
			    			<tr>
				    			<th>No</th>
				    			<th>Judul</th>
				    			<th>Action</th>
			    			</tr>
			    		</thead>
			    		<tbody>
			    			@foreach (\App\Album::all() as $album)
			    			<tr>
			    				<td>{{ @$i ? $i += 1 : $i = 1 }}</td>
			    				<td>{{ $album->judul }}</td>
			    				<td>
			    					<form action="{{ url('admin/album/' . $album->id_album . '/delete') }}" method="POST">
			    						{{ csrf_field() }}
			    						{{ method_field('DELETE') }}
				    					<a href="{{ url('admin/album/' . $album->id_album) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
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