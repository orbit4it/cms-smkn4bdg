@extends('admin.header')
@section('title', 'Kontak')
@section('content')
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">@yield('title')</div>
        </div>
        <ol class="breadcrumb page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>&nbsp;<a href="index.html">Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li>
                <a href="#">Admin</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
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
                        Data Kontak SMKN 4 Bandung
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('kontak.update') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            {{-- Button to Active Edit Mode --}}
                            <button id="openEditKontak" type="button" class="btn btn-primary">
                                <i class="fa fa-pencil"></i>
                                Edit Kontak
                            </button>

                            {{-- Action Edit Mode --}}
                            <div id="inEditMode" class="d-flex hide">
                                <button id="saveEditButton" type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i>
                                    Save
                                </button>
                                <button id="cancelEditButton" type="button" class="btn btn-danger">
                                    <i class="fa fa-times"></i>
                                    Cancel
                                </button>
                            </div>

                            {{-- Kontak Form & Table --}}
                            <table class="table table-bordered">
                                <tr>
                                    <th>Email</th>
                                    <td>
                                        <input class="form-control form-control-sm" type="text" name="email"
                                            value="{{ $kontak->email }}" placeholder="Inputkan email SMKN 4 Bandung"
                                            readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    {{-- <td>{{ $kontak->telepon }}</td> --}}
                                    <td>
                                        <input class="form-control form-control-sm" type="text" name="telepon"
                                            value="{{ $kontak->telepon }}" placeholder="Inputkan telepon SMKN 4 Bandung"
                                            readonly>
                                    </td>

                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    {{-- <td>{{ $kontak->alamat }}</td> --}}
                                    <td>
                                        <input class="form-control form-control-sm" type="text" name="alamat"
                                            value="{{ $kontak->alamat }}" placeholder="Inputkan alamat SMKN 4 Bandung"
                                            readonly>
                                    </td>

                                </tr>
                                <tr>
                                    <th>Instagram</th>
                                    {{-- <td>{{ $kontak->instagram_link }}</td> --}}
                                    <td>
                                        <input class="form-control form-control-sm" type="text" name="instagram_link"
                                            value="{{ $kontak->instagram_link }}" placeholder="Inputkan sosial media link"
                                            readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Facebook</th>
                                    {{-- <td>{{ $kontak->facebook_link }}</td> --}}
                                    <td>
                                        <input class="form-control form-control-sm" type="text" name="facebook_link"
                                            value="{{ $kontak->facebook_link }}" placeholder="Inputkan sosial media link"
                                            readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Youtube</th>
                                    {{-- <td>{{ $kontak->youtube_link }}</td> --}}
                                    <td>
                                        <input class="form-control form-control-sm" type="text" name="youtube_link"
                                            value="{{ $kontak->youtube_link }}" placeholder="Inputkan sosial media link"
                                            readonly>
                                    </td>

                                </tr>
                                <tr>
                                    <th>Tik Tok</th>
                                    {{-- <td>{{ $kontak->tiktok_link }}</td> --}}
                                    <td>
                                        <input class="form-control form-control-sm" type="text" name="tiktok_link"
                                            value="{{ $kontak->tiktok_link }}" placeholder="Inputkan sosial media link"
                                            readonly>
                                    </td>

                                </tr>
                                <tr>
                                    <th>Twitter</th>
                                    {{-- <td>{{ $kontak->twitter_link }}</td> --}}
                                    <td>
                                        <input class="form-control form-control-sm" type="text" name="twitter_link"
                                            value="{{ $kontak->twitter_link }}" placeholder="Inputkan sosial media link"
                                            readonly>
                                    </td>
                                </tr>
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
@endpush

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {

            // Open Edit Mode
            $('#openEditKontak').click(function() {
                $('input').attr('readonly', false);
                $('#openEditKontak').addClass('hide');
                $('#inEditMode').removeClass('hide');
            })

            // Load button when saving
            $('#saveEditButton').click(function() {
                $('input').attr('readonly', true);
                $('#cancelEditButton').addClass('hide');
                $('#saveEditButton').html('<i class="fa fa-spinner fa-spin"></i> Saving...');
            });

            // Back to default when cancel
            $('#cancelEditButton').click(function() {
                $('input').attr('readonly', true);
                $('#openEditKontak').removeClass('hide');
                $('#inEditMode').addClass('hide');
            })

        });
    </script>
@endpush
