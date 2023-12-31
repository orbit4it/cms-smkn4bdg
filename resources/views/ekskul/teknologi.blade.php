@extends('layouts.template')
@section('title', 'Teknologi')
@section('content')

    <section class="halaman">
        <div class="container">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Ekstrakurikuler</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-8 col-12 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="#" alt="Ini Gambar">
                        <div class="card-body">
                            <h2 class="card-title">Ini Halaman Ekskul</h2>
                            <p>Ini Halaman Ekskul</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    @include('layouts.sidebar')
                </div>
            </div>
        </div>
    </section>
    
@endsection
@push('css')
    <style type="text/css">
        body {
            padding-top: 86px;
            background-color: #f7f7f7;
        }
        .table thead th {
            vertical-align: middle;
            text-align: center;
        }
        .halaman {
            padding: 2em 0 4em;
        }
        .card {
            box-shadow: 0 1px 2px rgba(0,0,0,.1);
            border: 0;
        }
        .card-img-top {
            border-bottom: 1px solid #eee;
        }
        .card-body {
            padding: 1.5rem 2rem 3rem;
        }
        .card-text {
            text-align: justify;
        }
        .card-body img {
            max-width: 100%;
            height: auto !important;
        }
    </style>
@endpush