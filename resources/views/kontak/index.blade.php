@extends('layouts.template')
@section('content')
    <section class="kontak">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 kontak-konten">
                    <h1 class="kontak-judul">Kontak Kami</h1>
                    <p>Hubungi kami untuk pertanyaan atau informasi lebih lanjut tentang SMKN 4 Bandung. Kami siap melayani
                        Anda dengan senang hati. <br> <br> Jam Kerja:
                        Senin-Jumat: 08.00 - 16.00 WIB </p>
                    <a href="mailto:{{ $kontak->email }}" class="btn btn-primary">
                        <i class="fa fa-envelope-o"></i> Kirim Pesan
                    </a>
                    <hr class="pembagi">
                    <p class="kontak-sumber"><span>Telepon: </span>{{ $kontak->telepon }}</p>
                    <p class="kontak-sumber"><span>Alamat: </span> {{ $kontak->alamat }} </p>

                    {{-- Sosmed --}}
                    <div class="col-lg-6 col-sm-12 kontak-sosmed">

                        <div class="row ">
                            <div class="col-2">
                                {{-- Facebook --}}
                                <a href={{ $kontak->facebook_link }}>
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M27 0H5C2.23858 0 0 2.23858 0 5V27C0 29.7614 2.23858 32 5 32H27C29.7614 32 32 29.7614 32 27V5C32 2.23858 29.7614 0 27 0Z"
                                            fill="#000000" />
                                        <path
                                            d="M24 16C24 11.6 20.4 8 16 8C11.6 8 8 11.6 8 16C8 20 10.9 23.3 14.7 23.9V18.3H12.7V16H14.7V14.2C14.7 12.2 15.9 11.1 17.7 11.1C18.6 11.1 19.5 11.3 19.5 11.3V13.3H18.5C17.5 13.3 17.2 13.9 17.2 14.5V16H19.4L19 18.3H17.1V24C21.1 23.4 24 20 24 16Z"
                                            fill="white" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col-2">
                                {{-- Instagram --}}
                                <a href={{ $kontak->instagram_link }}>
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M27 0H5C2.23858 0 0 2.23858 0 5V27C0 29.7614 2.23858 32 5 32H27C29.7614 32 32 29.7614 32 27V5C32 2.23858 29.7614 0 27 0Z"
                                            fill="#000000" />
                                        <path
                                            d="M16 9.2C18.2 9.2 18.5 9.2 19.4 9.2C20.2 9.2 20.6 9.4 20.9 9.5C21.3 9.7 21.6 9.8 21.9 10.1C22.2 10.4 22.4 10.7 22.5 11.1C22.6 11.4 22.7 11.8 22.8 12.6C22.8 13.5 22.8 13.7 22.8 16C22.8 18.3 22.8 18.5 22.8 19.4C22.8 20.2 22.6 20.6 22.5 20.9C22.3 21.3 22.2 21.6 21.9 21.9C21.6 22.2 21.3 22.4 20.9 22.5C20.6 22.6 20.2 22.7 19.4 22.8C18.5 22.8 18.3 22.8 16 22.8C13.7 22.8 13.5 22.8 12.6 22.8C11.8 22.8 11.4 22.6 11.1 22.5C10.7 22.3 10.4 22.2 10.1 21.9C9.8 21.6 9.6 21.3 9.5 20.9C9.4 20.6 9.3 20.2 9.2 19.4C9.2 18.5 9.2 18.3 9.2 16C9.2 13.7 9.2 13.5 9.2 12.6C9.2 11.8 9.4 11.4 9.5 11.1C9.7 10.7 9.8 10.4 10.1 10.1C10.4 9.8 10.7 9.6 11.1 9.5C11.4 9.4 11.8 9.3 12.6 9.2C13.5 9.2 13.8 9.2 16 9.2ZM16 7.7C13.7 7.7 13.5 7.7 12.6 7.7C11.7 7.7 11.1 7.9 10.6 8.1C10.1 8.3 9.6 8.6 9.1 9.1C8.6 9.6 8.4 10 8.1 10.6C7.9 11.1 7.8 11.7 7.7 12.6C7.7 13.5 7.7 13.8 7.7 16C7.7 18.3 7.7 18.5 7.7 19.4C7.7 20.3 7.9 20.9 8.1 21.4C8.3 21.9 8.6 22.4 9.1 22.9C9.6 23.4 10 23.6 10.6 23.9C11.1 24.1 11.7 24.2 12.6 24.3C13.5 24.3 13.8 24.3 16 24.3C18.2 24.3 18.5 24.3 19.4 24.3C20.3 24.3 20.9 24.1 21.4 23.9C21.9 23.7 22.4 23.4 22.9 22.9C23.4 22.4 23.6 22 23.9 21.4C24.1 20.9 24.2 20.3 24.3 19.4C24.3 18.5 24.3 18.2 24.3 16C24.3 13.8 24.3 13.5 24.3 12.6C24.3 11.7 24.1 11.1 23.9 10.6C23.7 10.1 23.4 9.6 22.9 9.1C22.4 8.6 22 8.4 21.4 8.1C20.9 7.9 20.3 7.8 19.4 7.7C18.5 7.7 18.3 7.7 16 7.7Z"
                                            fill="white" />
                                        <path
                                            d="M16 11.7C13.6 11.7 11.7 13.6 11.7 16C11.7 18.4 13.6 20.3 16 20.3C18.4 20.3 20.3 18.4 20.3 16C20.3 13.6 18.4 11.7 16 11.7ZM16 18.8C14.5 18.8 13.2 17.6 13.2 16C13.2 14.5 14.4 13.2 16 13.2C17.5 13.2 18.8 14.4 18.8 16C18.8 17.5 17.5 18.8 16 18.8Z"
                                            fill="white" />
                                        <path
                                            d="M20.4 12.6C20.9523 12.6 21.4 12.1523 21.4 11.6C21.4 11.0477 20.9523 10.6 20.4 10.6C19.8477 10.6 19.4 11.0477 19.4 11.6C19.4 12.1523 19.8477 12.6 20.4 12.6Z"
                                            fill="white" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col-2">
                                {{-- Twitter --}}
                                <a href={{$kontak->twitter_link}}>
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M27 0H5C2.23858 0 0 2.23858 0 5V27C0 29.7614 2.23858 32 5 32H27C29.7614 32 32 29.7614 32 27V5C32 2.23858 29.7614 0 27 0Z"
                                            fill="#000000" />
                                        <path
                                            d="M24 11C23.4 11.3 22.8 11.4 22.1 11.5C22.8 11.1 23.3 10.5 23.5 9.7C22.9 10.1 22.2 10.3 21.4 10.5C20.8 9.9 19.9 9.5 19 9.5C16.9 9.5 15.3 11.5 15.8 13.5C13.1 13.4 10.7 12.1 9 10.1C8.1 11.6 8.6 13.5 10 14.5C9.5 14.5 9 14.3 8.5 14.1C8.5 15.6 9.6 17 11.1 17.4C10.6 17.5 10.1 17.6 9.6 17.5C10 18.8 11.2 19.8 12.7 19.8C11.5 20.7 9.7 21.2 8 21C9.5 21.9 11.2 22.5 13 22.5C19.1 22.5 22.5 17.4 22.3 12.7C23 12.3 23.6 11.7 24 11Z"
                                            fill="white" />
                                    </svg>

                                </a>
                            </div>
                            <div class="col-2">
                                {{-- Tik Tok --}}
                                <a href={{$kontak->tiktok_link}}>
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5 0C2.23859 0 0 2.23858 0 5V27C0 29.7614 2.23859 32 5 32H27C29.7614 32 32 29.7614 32 27V5C32 2.23858 29.7614 0 27 0H5ZM19.1182 8C19.1182 8.23775 19.1404 8.4719 19.1813 8.69851C19.3781 9.74606 19.998 10.645 20.8592 11.2059C21.4605 11.5997 22.1732 11.8263 22.9415 11.8263L22.9413 12.4393V14.5753C21.516 14.5753 20.1946 14.1184 19.1182 13.3457V18.9366C19.1182 21.7265 16.8466 24 14.0591 24C12.9827 24 11.9805 23.6581 11.1602 23.0824C9.85367 22.1648 9 20.6491 9 18.9366C9 16.143 11.2679 13.8732 14.0554 13.8769C14.2892 13.8769 14.5157 13.8955 14.7384 13.9252V14.5753L14.7302 14.5792L14.7383 14.579V16.7337C14.5231 16.6668 14.2929 16.6259 14.0554 16.6259C12.7823 16.6259 11.7467 17.6624 11.7467 18.9366C11.7467 19.8245 12.2515 20.5934 12.9864 20.9835C12.9973 20.9984 13.0083 21.0132 13.0195 21.0278C13.0111 21.0115 13.0013 20.9955 12.9901 20.9798C13.313 21.1507 13.6768 21.2472 14.0628 21.2472C15.3062 21.2472 16.3233 20.2554 16.3678 19.0221L16.3715 8H19.1182Z"
                                            fill="black" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col-2">
                                {{-- Youtube --}}
                                <a href={{$kontak->youtube_link}}>
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M27 0H5C2.23858 0 0 2.23858 0 5V27C0 29.7614 2.23858 32 5 32H27C29.7614 32 32 29.7614 32 27V5C32 2.23858 29.7614 0 27 0Z"
                                            fill="#000000" />
                                        <path
                                            d="M23.6 12.1C23.4 11.4 22.9 10.9 22.2 10.7C21 10.4 15.9 10.4 15.9 10.4C15.9 10.4 10.9 10.4 9.60001 10.7C8.90001 10.9 8.4 11.4 8.2 12.1C8 13.4 8 16 8 16C8 16 8 18.6 8.3 19.9C8.5 20.6 9 21.1 9.7 21.3C10.9 21.6 16 21.6 16 21.6C16 21.6 21 21.6 22.3 21.3C23 21.1 23.5 20.6 23.7 19.9C24 18.6 24 16 24 16C24 16 24 13.4 23.6 12.1ZM14.4 18.4V13.6L18.6 16L14.4 18.4Z"
                                            fill="white" />
                                    </svg>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1 space"></div>
                <div class="container-gedung col-lg-5">
                    <img src="{{ asset('image/gedung-smkn4.jpg') }}" alt="gedung-smkn4bdg" class="foto-gedung">
                </div>
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

        .pembagi {
            width: 100%;
            margin: 2em 0 2em 0;
        }

        .kontak {
            padding: 2em 0 4em;
            width: 100%;
        }

        .kontak-judul {
            font-size: 64px;
            font-weight: 700;
        }

        @media screen and (max-width: 480px) {
            .kontak-judul {
                font-size: 32px;
            }
        }

        .button-kirim-email>i {
            margin-right: 0.8em;
        }

        .kontak-sumber>span {
            color: #8a8a8a;
        }

        .kontak-sosmed {
            margin: 2em 0;
            padding: 0;
        }


        .container-gedung {
            height: 80vh;
            max-height: 600px;
        }

        @media screen and (max-width: 480px) {
            .container-gedung {
                height: 300px;
            }
        }

        .foto-gedung {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: right center;
        }

        @media screen and (max-width: 480px) {
            .space {
                display: none;
            }
        }
    </style>
@endpush
