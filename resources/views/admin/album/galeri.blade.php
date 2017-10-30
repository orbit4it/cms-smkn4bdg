@extends('admin.header')
@section('title', 'Galeri')
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
    <div class="modal modal-choose-file fade" tabindex="-1" role="dialog" >
		<div class="modal-dialog" role="document">
			<div class="modal-body">
				<div id="editor"></div>
			</div>
			<div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- BEGIN MAIN CONTENT -->
    <div class="row">
    	<div class="col-xs-12">

    		<div class="panel panel-default">
    			<div class="panel-heading">
    				Data Galeri Album {{ $album->judul }}
    			</div>
				<div class="panel-body">
					<form method="POST" action="{{ url('admin/album/' . $album->id_album . '/galeri/update') }}" class="form-galeri">
						{{ csrf_field() }}
						{{ method_field('PATCH') }}
						<p>
							<a href="{{ url('admin/album/') }}" class="btn btn-info"><i class="fa fa-chevron-left"></i> Kembali Ke Album</a> 
							<a href="#" class="btn btn-primary btnChooseFile" data-dir="{{ str_replace('=', '', base64_encode($album->slug)) }}"><i class="fa fa-plus"></i> Tambah Galeri</a>
						</p>
						<p>
							<select name="opsi" class="form-control" style="width: auto; display: inline-block; font-size: 1em;">
								<option value="1">Simpan</option>
								<option value="2">Hapus</option>
							</select>
							<button type="submit" class="btn btn-success btn-submit-all"><i class="fa fa-save"></i> Submit</button>
						</p>
				    	<table class="table table-bordered">
				    		<thead>
				    			<tr>
				    				<th>#</th>
					    			<th>Foto</th>
					    			<th>Judul</th>
					    			<th>Deskripsi</th>
					    			<th>Action</th>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			@foreach (\App\Galeri::where('id_album', $album->id_album)->orderBy('id_galeri', 'DESC')->get() as $galeri)
				    			<tr class="row-{{ $galeri->id_galeri }}" data-id="{{ $galeri->id_galeri }}">
				    				<td><input type="checkbox" name="id_galeri[{{ $galeri->id_galeri }}]" value="{{ $galeri->id_galeri }}"></td>
				    				<td><img src="{{ url('uploads' . $galeri->foto) }}" width="200"></td>
				    				<td><input name="judul[{{ $galeri->id_galeri }}]" type="text" class="form-control input-judul" value="{{ $galeri->judul }}"></td>
				    				<td><textarea name="deskripsi[{{ $galeri->id_galeri }}]" class="form-control input-deksripsi">{{ $galeri->deskripsi }}</textarea></td>
				    				<td>
				    					<a href="{{ url('admin/album/' . $album->id_album . '/galeri/'  . $galeri->id_galeri . '/delete') }}" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i> Hapus</a>
				    					<button type="button" class="btn btn-success btn-submit" data-id="{{ $galeri->id_galeri }}" id="btn{{ $galeri->id_galeri }}"><i class="fa fa-save"></i> Simpan</button>
				    				</td>
				    			</tr>
				    			@endforeach
				    		</tbody>
				    	</table>
					</form>
				</div>
			</div>
    	</div>
    </div>
	<!-- END MAIN CONTENT -->

</div><!-- END PAGE CONTENT -->
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ url('packages/barryvdh/elfinder/css/elfinder.min.css') }}">
<style type="text/css">
	.modal {
		overflow: hidden;
	}

	.modal-dialog {
		background-color: #fff;
		width: 90vw;
	}

	.modal iframe {
		width: 100%;
		height: 70vh;
		border: 0;
	}

	.modal-backdrop {
	   background-color: transparent;
	}
</style>
@endpush
@push('js')
<script type="text/javascript" src="{{ url('packages/barryvdh/elfinder/js/elfinder.full.js') }}"></script>
<script type="text/javascript">
	function processClose(file) {
        $(".modal-choose-file").modal('hide');
    }

	$(document).ready(function () {
		var uploadedImage = [];

		$(".btnChooseFile").click(function() {
            $(".modal-choose-file").modal('show');
			var hash = $(this).data('dir');
			var elfinder = $('#editor').elfinder({
                url : '{{ url("elfinder/connector") }}',
		        requestType : 'post',
		        rememberLastDir : false,
		        useBrowserHistory : false,
		        checkSubfolders: false,
		        startPathHash : 'l1_' + hash,
		        customData: { 
                    _token: '{{ csrf_token() }}'
                },
                commandsOptions: {
                  getfile: {
                    oncomplete: 'destroy',
                    multiple: true
                  }
                },
                uiOptions : {
					// toolbar configuration
					toolbar : [
						// ['back', 'forward'],
						// ['reload'],
						// ['home', 'up'],
						[
							// 'mkdir','mkfile',
							'upload'
						],
						['open', 'download', 
							// 'getfile'
						],
						// ['info'], ['quicklook'], ['copy', 'cut', 'paste'], ['rm'],
						[
							// 'duplicate', 
							'rename', 
							// 'edit', 'resize'
						],
						// ['extract', 'archive'],
						['search'],
						['view'],
						// ['help']
					],

					// directories tree options
					tree : {
						// expand current root on init
						openRootOnLoad : true,
						// auto load current dir parents
						syncTree : true
					},

					// navbar options
					navbar : {
						minWidth : 150,
						maxWidth : 500
					},

					// current working directory options
					cwd : {
						// display parent directory in listing as ".."
						oldSchool : false
					}
				},
                getFileCallback: function(file) {
					urls = $.map(file, function(f) { return f; });
                },
                handlers: {
					upload: function(event, instance) {
						var uploadedFiles = event.data.added;
						for (i in uploadedFiles) {
							var file = uploadedFiles[i];
						}
						var url = '{{ url('admin/album/' . $album->id_album .'/store') }}';
						$.ajax({
							url: url,
							method: 'POST',
							data: {
								'file': file,
								'_token': '{{ csrf_token() }}'
							}
						}).done(function(result) {
							console.log(result);
							uploadedImage.push(result);
						});
					}
                }
            }).elfinder('instance');

            $('.modal-choose-file').on('hidden.bs.modal', function (e) {
            	if (uploadedImage.length > 0) {
	            	for (var i = 0; i < uploadedImage.length; i++) {
	            		$('table tbody').prepend('\
				    			<tr class="row-' + uploadedImage[i].id_galeri + '" data-id="' + uploadedImage[i].id_galeri + '">\
				    				<td><input type="checkbox" name="id_galeri[' + uploadedImage[i].id_galeri + ']" value="' + uploadedImage[i].id_galeri + '"></td>\
				    				<td><img src="{{ url('uploads') }}' + uploadedImage[i].foto + '" width="200"></td>\
				    				<td><input name="judul[' + uploadedImage[i].id_galeri + ']" type="text" class="form-control input-judul"></td>\
				    				<td><textarea name="deskripsi[' + uploadedImage[i].id_galeri + ']" class="form-control input-deksripsi"></textarea></td>\
				    				<td>\
				    					<a href="{{ url('admin/album/' . $album->id_album . '/galeri') }}/' + uploadedImage[i].id_galeri + '/delete" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i> Hapus</a>\
				    					<button type="button" class="btn btn-success btn-submit" data-id="' + uploadedImage[i].id_galeri + '" id="btn' + uploadedImage[i].id_galeri + '"><i class="fa fa-save"></i> Simpan</button>\
				    				</td>\
				    			</tr>\
				    			');
	            	}
            	}
			});

            // $(".modal-body").html('<iframe src="{{ url("elfinder/ckeditor#elf_l1_") }}' + hash + '"></iframe>');
            // $(".modal-body").html('<iframe src="{{ url("elfinder/template/file") }}"></iframe>');
        });

        $(document).on('change', '.input-judul', function(e) {
        	var tr = $(this).parent().parent();
        	var id = tr.data('id');
        });

		$(document).on('click', '.btn-submit', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			var icon = $('#' + $(this).attr('id') + ' .fa')
			icon.removeClass('fa-save').addClass('fa-spinner');

			var judul = $('input[name="judul[' + id + ']"]');
			var deskripsi = $('textarea[name="deskripsi[' + id + ']"]');
			var url = '{{ url("admin/album/" . $album->id_album . "/galeri") }}/' + id + '/update';
			$.ajax({
				url: url,
				method: 'POST',
				data: {
					'_token' : '{{ csrf_token() }}',
					'_method': 'PATCH',
					'judul'  : judul.val(),
					'deskripsi'  : deskripsi.val(),
				},
			}).done(function(result) {
				icon.removeClass('fa-spinner').addClass('fa-save');
			});
		});

		$('.btn-delete').click(function(e) {
			e.preventDefault();
			var url = $(this).attr('href');
			var tr = $(this).parent().parent();
			console.log(url);
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

		$('.form-galeri').on('submit', function(e) {
			e.preventDefault();
			var url = $(this).attr('action');
			var data = $(this).serialize();
			var opsi = $('select[name="opsi"]').find(':selected').val();
			var icon = $('.btn-submit-all .fa');
			icon.removeClass('fa-save').addClass('fa-spinner');
			$.ajax({
				url: url,
				method: 'POST',
				data: data,
			}).done(function(result) {
				if (opsi == 1) {} else {
					for (var i = 0; i < result.length; i++) {
						$('.row-' + result[i].id_galeri).hide();
					}
				}
				icon.removeClass('fa-spinner').addClass('fa-save');
			});
		});
	});
</script>
@endpush