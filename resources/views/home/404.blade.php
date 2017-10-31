@extends('layouts.template')
@section('content')

    <section class="not-found">
        <div class="container">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">404 Not Found</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-8 col-12 mb-3">
                    <div class="card">
                        <div class="card-body py-3 my-3 text-center">
                            <h3 class="card-title">Halaman tidak ditemukan</h3>
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
        .not-found {
            padding: 2em 0 4em;
        }
        .card {
            box-shadow: 0 1px 2px rgba(0,0,0,.1);
            border: 0;
        }
        .card-body {
            padding: 1.5rem 2rem 3rem;
            color: #555;
        }
        .card-body img {
            max-width: 100%;
            height: auto !important;
        }
    </style>
@endpush