<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<meta name="viewport" width="1240">-->
    <!-- Title -->
    <title>
        @if(isset($title))
        {{ $title }}
        @else
        Pemberdayaan Umat Berkelanjutan
        @endif
    </title>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8MK8VQVX4W"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-8MK8VQVX4W');
    </script>

    <link href="{{url("//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css")}}" rel="stylesheet"
        id="bootstrap-css">
    <script src="{{url("//code.jquery.com/jquery-1.11.1.min.js")}}"></script>
    <script src="{{url("//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js")}}"></script>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{url("/roberto-master/style.css")}}">
    <!--   <link rel="stylesheet" href="{{url("https://www.w3schools.com/w3css/4/w3.css")}}"> -->

    <link href="{{url("//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css")}}" rel="stylesheet"
        id="bootstrap-css">
    <script src="{{url("//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js")}}"></script>
    <script src="{{url("//code.jquery.com/jquery-1.11.1.min.js")}}"></script>

    <link href="{{url("/lumino/css/bootstrap-table.css")}}" rel="stylesheet">
    <link href="{{url("/css/chat.css")}}" rel="stylesheet">
    <link href="{{url("/css/slide.css")}}" rel="stylesheet">
    <link href="{{url("/css/struktur.css")}}" rel="stylesheet">
    <link href="{{url("/css/footer.css")}}" rel="stylesheet">

    <link rel="stylesheet" href="{{url("https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{url("//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css")}}">

    <script src="{{url("https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js")}}"></script>
    <script src="{{url("https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js")}}"></script>

    <style type="text/css">
        #pesan {
            width: 100%;
            height: 35px;
            border-radius: 5px;
            border-style: groove;
            padding: 20px;
            margin: 10px;
        }

        #text {
            margin: 10px;
            width: 100%;
            height: 200px;
        }

        .chat-container {
            padding: 0 8px;
        }

        .chat {
            max-width: 512px;
            margin: auto;
        }

        .panel-head {
            background-color: #404040;
            color: white;
            padding: 16px;
            margin: 0;
            border-radius: 6px 6px 0 0;
        }

        .chat-content {
            padding: 8px;
            background-color: #eeeeee;
            overflow-y: scroll;
            max-height: 50vh;
        }

        .pesan {
            display: flex;
            margin-bottom: 8px;
            max-width: 75%;
            clear: both;
        }

        .pesan:last-child {
            margin-bottom: 0;
        }

        .pesan img {
            width: 32px;
            height: 32px;
        }

        .kotak-pesan {
            padding: 6px 10px;
            border-radius: 4px;
        }

        .pertanyaan .kotak-pesan {
            background-color: white;
            margin-left: 4px;
        }

        .jawaban .kotak-pesan {
            background-color: #dddddd;
            margin-right: 4px;
        }

        .jawaban {
            float: right;
        }

        .nama-pengirim {
            font-weight: bold;
        }

        .isi-pesan {
            margin-top: 4px;
        }

        .waktu-kirim {
            float: right;
            margin-top: 4px;
        }

        .chat-foot {
            background-color: #dddddd;
            padding: 12px;
            border-radius: 0 0 6px 6px;
            text-align: center;
        }

        .tombol {
            background-color: #4285f4;
            border: none;
            color: white !important;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none !important;
        }

        .tombol:hover {
            background-color: #185abc;
        }

        .tombol-besar {
            font-size: large;
            padding: 10px 16px;
        }

        .single-welcome-slide .welcome-text h2 {
            margin-bottom: 64px;
        }
    </style>

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" fill="white">
            <path class="st0" d="M84,22.5v8c-0.9,0.5-1.5,1.4-1.5,2.5c0,1.2,0.7,2.2,1.7,2.7H84L81,42c2.4,2.4,6.6,2.4,9,0l-3-6.3h-0.2
       c1-0.5,1.7-1.5,1.7-2.7c0-1.1-0.6-2-1.5-2.5v-9.1l9-3.4L48,0L0,18l48,18L84,22.5z"></path>
            <path class="st0" d="M24,33v9c13.2,13.2,34.8,13.2,48,0v-9l-24,9L24,33z"></path>
            <path class="st0" d="M48,60l-2.5-1.3C31.3,51.7,15.8,48,0,48l6,36l7.7,1.1c8.8,1.3,17.5,3.7,25.7,7.2L48,96l8.6-3.7
       c8.2-3.5,16.8-5.9,25.7-7.2L90,84l6-36c-15.8,0-31.3,3.7-45.5,10.7L48,60z M35.8,75.4h-1.9v-3.8h1.9c0.5,0,0.9-0.4,0.9-0.9
       s-0.4-0.9-0.9-0.9h-1.9c-0.5,0-0.9,0.4-0.9,0.9V81h-3.8V70.7c0-2.6,2.1-4.7,4.7-4.7h1.9c2.6,0,4.7,2.1,4.7,4.7S38.4,75.4,35.8,75.4
       z M55.5,70.7c0-2.6,2.1-4.7,4.7-4.7h1.9c2.6,0,4.7,2.1,4.7,4.7c0,1.1-0.4,2-1,2.8c0.6,0.8,1,1.8,1,2.8c0,2.6-2.1,4.7-4.7,4.7h-1.9
       v-3.8h1.9c0.5,0,0.9-0.4,0.9-0.9s-0.4-0.9-0.9-0.9h-1.9v-3.8h1.9c0.5,0,0.9-0.4,0.9-0.9s-0.4-0.9-0.9-0.9h-1.9
       c-0.5,0-0.9,0.4-0.9,0.9V81h-3.8V70.7z M53.6,76.3c0,2.6-2.1,4.7-4.7,4.7h-1.9c-2.6,0-4.7-2.1-4.7-4.7V66h3.8v10.3
       c0,0.5,0.4,0.9,0.9,0.9h1.9c0.5,0,0.9-0.4,0.9-0.9V66h3.8V76.3z"></path>
        </svg>
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <header class="header-area">
        <div class="top-header-area">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <div class="top-header-content">
                            @php
                            $pembina=DB::table('tb_pembina')->first();
                            @endphp
                            <a href="{{url("https://wa.me/$pembina->no_hp")}}" target="_blank"><i
                                    class="fa fa-whatsapp"></i> <span>{{$pembina->no_hp}}</span></a>


                            <button type="button" class="btn btn-primary tombol" data-toggle="modal"
                                data-target="#exampleModal">
                                <i class="icon_mail"></i> <span>Hubungi Kami</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Header Area End -->

        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="robertoNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="{{url("/")}}" style="color: white;"><img
                                src="{{url("imgs")}}/{{("pub-website-logo.png")}}" width="144"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->

                            <div class="classy-menu">
                                <!-- Menu Close Button -->
                                <div class="classycloseIcon">
                                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                                </div>
                                <!-- Nav Start -->
                                <div class="classynav">
                                    <ul id="nav">
                                        <li class="active"><a href="{{url("/")}}">Beranda</a></li>
                                        <li><a href="{{url("#")}}" id="ppmb">PPMB PUB</a>
                                            <ul class="dropdown">
                                                <li><a href="{{url("organisasi_ppmb")}}">• Kepanitiaan PPMB</a></li>
                                                <li><a href="{{url("jadwal_ppmb_user")}}">• Jadwal PPMB</a></li>
                                                <li><a href="{{url("syarat_user")}}">• Syarat & Ketentuan</a></li>
                                                <li><a href="{{url("user_hasilSeleksi")}}">• Hasil Seleksi</a></li>
                                                <li><a href="{{url("user_dok_ppmb")}}">• Dokumentasi PPMB</a></li>
                                                <li><a href="{{url("download_formulir")}}" target="_blank">• Download
                                                        Formulir</a></li>
                                                <li><a href="{{url("zonasi_covid19_daerah_tpa")}}">• Zonasi
                                                        COVID-19</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{url("#")}}" id="pub">PUB Aktif</a>
                                            <ul class="dropdown">
                                                <li><a href="{{url("pub_profile")}}">• Sekilas PUB</a></li>
                                                <li><a href="{{url("organisasi_pub")}}">• Organisasi PUB</a></li>
                                                <li><a href="{{url("user/mahasiswa")}}">• Mahasiswa PUB</a></li>
                                                <li><a href="{{url("pelatihan")}}">• Pelatihan PUB</a></li>
                                                <li><a href="{{url("kegiatanPub")}}">• Dokumentasi PUB</a></li>

                                            </ul>
                                        </li>
                                        <li><a href="{{url("#")}}" id="alumni">Alumni PUB</a>
                                            <ul class="dropdown">
                                                <li><a href="{{url("user_alumni")}}">• Data Alumni PUB</a></li>
                                                <li><a href="{{url("user_infaq")}}">• Data Infaq Alumni</a></li>
                                                <li><a href="{{url("totalAlumni")}}">• Total Alumni</a></li>
                                                <!--<li><a href="{{url("totalAlumni")}}">-Kegiatan Alumni</a></li>-->
                                                <li><a href="#">• Ikatan Alumni PUB</a>
                                                    <ul class="dropdown">
                                                        <li><a href="{{url("org_ikatan_alumni")}}">• Struktur
                                                                Organisasi</a></li>
                                                        <li><a href="{{url("keg_ikatan_alumni")}}">• Kegiatan Alumni
                                                                PUB</a></li>
                                                        <li><a href="{{url("legalitas")}}">• Legalitas</a></li>
                                                    </ul>

                                                </li>

                                            </ul>
                                        </li>
                                        <li><a href="{{url("pembinaPub")}}">Pembina PUB</a></li>


                                    </ul>

                                    <!-- Search -->
                                    <div class="search-btn ml-4">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </div>

                                    <!-- Book Now -->
                                    <div class="book-now-btn ml-3 ml-lg-5">
                                        <a href="{{url("login")}}">LOGIN<i class="fa fa-long-arrow-right"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <!-- Nav End -->
                            </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
</body>
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Hubungi Kami</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{url('storePertanyaan')}}">
                {{csrf_field()}}
                <div class="modal-body">
                    <input id="pesan" type="text" name="nama" placeholder="Masukkan Nama"><br>
                    <input id="pesan" type="text" name="sekolah" placeholder="Masukkan Asal Sekolah"><br>
                    <input id="pesan" type="text" name="daerah" placeholder="Masukkan Asal Daerah"><br>
                    <input id="pesan" type="text" name="no_hp" placeholder="Masukkan No Hp"><br>
                    <textarea id="text" placeholder="Pertanyaan..." name="pertanyaan"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Header Area End -->