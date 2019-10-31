 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Pemberdayaan Umat Berkelanjutan</title>



  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <!-- Favicon -->
  <link rel="icon" href="./img/core-img/favicon.png">
  <link rel="shortcut icon" href="/imgs/pub.png" />
  <!-- Stylesheet -->
  <link rel="stylesheet" href="/roberto-master/style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <link href="/lumino/css/bootstrap-table.css" rel="stylesheet">
  <link href="/css/chat.css" rel="stylesheet">
  <link href="/css/slide.css" rel="stylesheet">
  <link href="/css/struktur.css" rel="stylesheet">
  <link href="/css/footer.css" rel="stylesheet">
  <link href="/lumino/css/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
    #pesan{
      width: 100%;
      height: 35px;
      border-radius: 5px;
      border-style: groove;
      padding: 20px;
      margin: 10px;
    }
    #text{
      margin: 10px;
      width: 100%;
      height: 200px;
    }
    
  </style>

</head>

<body style="font-family: century gothic;">
  <!-- Preloader -->
  <div id="preloader">
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
              <a href="{{url('https://wa.me/6285722752570')}}" target="_blank"><i class="fa fa-whatsapp"></i> <span>0857-2275-2570</span></a>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="icon_mail"></i> <span>Chat with us</span>
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
            <a class="nav-brand" href="{{url('/')}}" style="color: white;"><img src="{{url('imgs')}}/{{('pub web.png') }}" height="150" width="200" ></a>

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
              <div class="classynav" >
                <ul id="nav">
                  <li class="active"><a href="{{url('/')}}">Home</a></li>
                  <li><a href="#" id="ppmb">PPMB PUB</a>
                    <ul class="dropdown">
                      <li><a href="/organisasi_ppmb/">- Kepanitiaan PPMB</a></li>
                      <li><a href="/jadwal_ppmb_user">- Jadwal PPMB</a></li>
                      <li><a href="/syarat_user">- Syarat & Ketentuan</a></li>                          
                      <li><a href="{{url('user_hasilSeleksi')}}">- Hasil Seleksi</a></li>
                      <li><a href="{{url('user_dok_ppmb')}}">- Dokumentasi PPMB</a></li>
                      <li><a href="{{url('user_down_formulir')}}" target="_blank">- Download Formulir</a></li>
                    </ul>
                  </li>
                  <li><a href="#" id="pub">PUB Aktif</a>
                    <ul class="dropdown">
                      <li><a href="{{url('pub_profile')}}">-Sekilas PUB</a></li>
                      <li><a href="{{url('organisasi_pub')}}">-Organisasi PUB</a></li>
                      <li><a href="{{url('user/mahasiswa')}}">-Mahasiswa PUB</a></li>
                      <li><a href="{{url('pelatihan')}}">-Pelatihan PUB</a></li>
                      <li><a href="{{url('kegiatanPub')}}">-Dokumentasi PUB</a></li>

                    </ul>
                  </li>
                  <li><a href="#" id="alumni">Alumni PUB</a>
                    <ul class="dropdown">
                      <li><a href="{{url('user_alumni')}}">-Data Alumni PUB</a></li>
                      <li><a href="{{url('user_infaq')}}">-Data Infaq Alumni</a></li>
                      <li><a href="#">-Ikatan Alumni PUB</a>
                        <ul class="dropdown">
                          <li><a href="{{url('org_ikatan_alumni')}}">-Organisasi</a></li>
                          <li><a href="{{url('keg_ikatan_alumni')}}">-Dokumentasi</a></li>
                          <li><a href="{{url('legalitas')}}">-Legalitas</a></li>
                        </ul>

                      </li>
                      <li><a href="{{url('totalAlumni')}}">-Total Alumni</a></li>
                    </ul>
                  </li>
                  <li><a href="{{url('pembinaPub')}}">Pembina PUB</a></li>
                  
                  
                </ul>

                <!-- Search -->
                <div class="search-btn ml-4">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </div>

                <!-- Book Now -->
                <div class="book-now-btn ml-3 ml-lg-5">
                  <a href="{{url('login')}}">LOGIN<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
              </div>
              <!-- Nav End -->
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Chatting with Us</b></h5>
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
            <textarea id="text" placeholder="Pertanyaan..." name="pertanyaan"></textarea>
          </div>        
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">keluar</button>
            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Header Area End -->  