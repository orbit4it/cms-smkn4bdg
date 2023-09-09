@extends('layouts.template')
@section('title', $studi->nama)
@section('content')

    <section class="halaman">
        <div class="container">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Program Studi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-8 col-12 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ $studi->foto }}" alt="Teknik Komputer Jaringan"
                            style="width: auto; height: 50%; margin: 0em auto;">
                        <div class="card-body">
                            <h2 class="card-title" style="text-transform: uppercase">{{ $studi->nama }}</h2>
                            {!! $studi->deskripsi !!}

                            <table class="table table-bordered">
                                <thead>

                                    <tr>
                                        <th rowspan="2">NO</th>
                                        <th rowspan="2" colspan="2">MATA PELAJARAN</th>
                                        <th colspan="{{ $punyaBerapaSemester }}">PELAJARAN PER SEMESTER</th>
                                        <th rowspan="2">JML</th>
                                    </tr>
                                    {{-- Semester --}}
                                    <tr style="background-color:#104E8B; color: #fff; text-align: center;">
                                        @for ($i = 1; $i <= $punyaBerapaSemester; $i++)
                                            <td>{{ $i }}</td>
                                        @endfor
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($studi->mataPelajaran as $mataPelajaran)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td colspan="2">
                                                <b>
                                                    {{ $mataPelajaran->nama }}
                                                </b>
                                            </td>
                                            {{-- Space Semester --}}
                                            <td colspan="{{ $punyaBerapaSemester }}">&nbsp;</td>

                                            <td
                                                rowspan="{{ $studi->pembelajaran->where('id_mata_pelajaran', $mataPelajaran->id_mata_pelajaran)->groupBy('nama')->count('id_pembelajaran') + 1 }}">
                                                {{ $studi->pembelajaran->where('id_mata_pelajaran', $mataPelajaran->id_mata_pelajaran)->sum('total_pembelajaran') }}
                                            </td>
                                        </tr>

                                        @foreach ($studi->pembelajaran->where('id_mata_pelajaran', $mataPelajaran->id_mata_pelajaran)->groupBy('nama') as $nama_pembelajaran => $value)
                                            <tr>
                                                <td>&nbsp;</td>

                                                <td>
                                                    {{ chr(96 + $loop->iteration) }}
                                                </td>

                                                <td>{{ $nama_pembelajaran }}</td>
                                                @foreach ($value->groupBy('semester') as $semester)
                                                    <td>{{ $semester->sum('total_pembelajaran') }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    <tr>
                                        <td colspan="3" style="text-align: center;"><b>Total</b></td>
                                        @foreach ($studi->pembelajaran->groupBy('semester') as $semester)
                                            <td>{{ $semester->sum('total_pembelajaran') }}</td>
                                        @endforeach
                                        <td>{{ $studi->pembelajaran->sum('total_pembelajaran') }}</td>
                                    </tr>
                                </tbody>
                            </table>
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
            box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
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
