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
                @foreach (\App\Berita::orderBy('created_at', 'DESC')->get() as $berita)
                <div class="col-12 col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('uploads/' . $berita->foto) }}" alt="Card {{ asset('') }}/image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $berita->judul_berita }}</h5>
                            <p class="card-text">{{ $berita->created_at->format('d F Y') }}</p>
                            @php
                            $isi_berita = strip_tags($berita->isi_berita);
                            $isi_berita = trim(str_replace('&nbsp;', '', $isi_berita));
                            @endphp
                            <p class="card-text">{{ substr($isi_berita, 0, 42) }}{{ strlen($isi_berita) > 42 ? '...' : '' }}</p>
                            <a href="{{ url('berita/' . $berita->id_berita) }}" class="">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
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