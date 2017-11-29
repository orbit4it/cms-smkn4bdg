@extends('layouts.template')
@section('content')

    <section class="berita">
        <div class="container">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Berita</li>
                </ol>
            </nav>
            <div class="row">
                @if ($data->count())
                    @foreach ($data as $berita)
                    <div class="col-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset( @$berita->foto ? 'uploads/' . $berita->foto : 'image/default-img.jpg' ) }}" alt="{{ $berita->judul }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $berita->judul }}</h5>
                                <p class="card-text">{{ $berita->created_at->format('d F Y') }}</p>
                                @php
                                $deskripsi = strip_tags($berita->deskripsi);
                                $deskripsi = trim(str_replace('&nbsp;', '', $deskripsi));
                                @endphp
                                <p class="card-text">{{ substr($deskripsi, 0, 42) }}{{ strlen($deskripsi) > 42 ? '...' : '' }}</p>
                                <a href="{{ url('berita/' . $berita->slug) }}" class="">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title my-3 py-3">Belum Ada Berita</h5>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
@push('css')
    <style type="text/css">
        body {
            padding-top: 86px;
            background-color: #f1f1f1;
        }
        .berita {
            padding: 2em 0 4em;
        }
        .card {
            box-shadow: 0 1px 2px rgba(0,0,0,.1);
        }
        .card img,
        .card {
            border: 0;
        }
        .card-body {
            padding: 1.5rem 2rem 3rem;
        }
        .card-text {
            text-align: justify;
        }
    </style>
@endpush