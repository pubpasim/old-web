<!DOCTYPE html>
<html lang="en">
<head>
  <title>PUB Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="/css/slide.css" rel="stylesheet">
  <link href="/css/footer.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
  <div id="head">
    <a class="nav navbar-nav" href="{{url('/')}}" style="color: white;"><img src="{{url('imgs')}}/{{('pub web.png') }}" height="70"></a>
    <div id="des">

    </div>
  </div>
  <nav class="navbar navbar-inverse" style="border-radius: 0px;">
    <div class="container-fluid">
      <div class="navbar-header">
      </div>
      <ul class="nav navbar-nav">
        <li><a href="{{url('/')}}">HOME</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">PPMB <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Profile PPMB</a></li>
            <li><a href="#">Kepanitiaan PPMB</a></li>
            <li><a href="#">Jadwal PPMB</a></li>
            <li><a href="#">Hasil Seleksi</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">PUB Aktif<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Profile PUB</a></li>
            <li><a href="#">Organisasi PUB</a></li>
            <li><a href="{{url('user/mahasiswa')}}">Mahasiswa PUB</a></li>
            <li><a href="#">Pelatihan PUB</a></li>
            <li><a href="#">Kegiatan PUB</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Alimni PUB <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Data Alumni PUB</a></li>
            <li><a href="#">Data Infaq Alumni PUB</a></li>
            <li><a href="#">Kegiatan Alumni</a></li>
          </ul>
        </li>
        <li><a href="#">Profile Pembina PUB</a></li>
        <li><a href="#">Contac Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-th"></span> Sign Up</a></li>
        <li><a href="{{url('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </nav>
  <div id="bg">
    <img src="{{url('imgs')}}/{{('pasim.jpg') }}" style="width: 100%;">
    
    <div id="bar">
      <marquee> 
        <h2>Pemberdayaan Umat Berkelanjutan Uiversitas Nasional PASIM</h2>
      </marquee>
    </div>
  </div>
