@extends('layouts.template')
@section('content')

    <section class="berita">
        <div class="container">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('berita') }}">Berita</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $berita->judul }}</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-8 col-12 mb-3">
                    <div class="card">
                        @if ($berita->foto)
                        <img class="card-img-top" src="{{ asset('uploads/' . $berita->foto) }}" alt="{{ $berita->judul }}">
                        @endif
                        <div class="card-body">
                            <h2 class="card-title">{{ $berita->judul }}</h2>
                            <p class="card-text">{{ $berita->created_at->format('l, d F Y') }}</p>
                            <p class="card-text">{!! $berita->deskripsi !!}</p>
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
        .berita {
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