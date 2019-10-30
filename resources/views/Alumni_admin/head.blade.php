<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Alumni</title>
<!--
Neaty HTML Template
http://www.templatemo.com/tm-501-neaty
-->
<!-- load stylesheets -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
<link rel="stylesheet" href="/neaty/css/bootstrap.min.css">                                      <!-- Bootstrap style -->
<link rel="stylesheet" href="/neaty/css/magnific-popup.css">                                <!-- Magnific pop up style, http://dimsemenov.com/plugins/magnific-popup/ -->
<link rel="stylesheet" href="/neaty/css/templatemo-style.css">    
<link rel="shortcut icon" href="/imgs/pub.png" />                               <!-- Templatemo style -->


<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300" rel="stylesheet" type="text/css">
<link href="style.css" type="tex/css" rel="stylesheet" media="all">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        $("#Div1 input").keypress(function (e) {



        });
    });
</script>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
        background-color: #4CAF50;
        color: white;
    }
    .foto{
        width: 20%;
        height: 100%;
        position: relative;
        left: 39%;
    }
    #judul{
        color: #2980B9;
        text-align: center;
    }
    head{
        font-family: cursive;
    }
    button,#btn{
        background-color:#2980B9;
        color: white;
        border-style: groove;
        padding: 5px;
        border-radius: 5px; 
        cursor: pointer;
    }
    button .hapus{
        background-color:#DC143C;
    }
    #ll li{
        padding-top: 0px;
        padding-left: 50px;
    }
     .alert{
    width: 93%;
    height: 100%;
    background-color: #ff9999;
    padding: 10px;
    text-align: center;
    border-radius: 3px;
    color: white;
    font-style: bold;
    font-family: century gothic;
  }
</style>
</head>
<body>    
    <div class="container">
        <div class="row">
            <div class="tm-left-right-container">
                <!-- Left column: logo and menu -->
                <div class="tm-blue-bg tm-left-column">                        
                    <div class="tm-logo-div text-xs-center">
                        <img src="{{url('imgs/mahasiswa')}}/{{$data->file}}" alt="Logo" width="120">
                        <h1 class="tm-site-name">{{$data->nama}}</h1>
                    </div>

                    <ul id="ll" style="margin-top: -5px;">
                        <li class="tm-nav-item">
                            <a href="{{url('admin/alumni/'.$data->id_mahasiswa)}}" class="tm-nav-item-link">Beranda</a>
                        </li>
                        <input type="hidden" name="id_mhs" value="{{$data->id_mahasiswa}}">
                        <li class="tm-nav-item">
                            <a href="{{url('admin/alumni/profile/'.$data->id_mahasiswa)}}" class="tm-nav-item-link">Profil</a>
                        </li>
                        <li class="tm-nav-item">
                            <a href="{{url('admin/alumni/aktivitas/'.$data->id_mahasiswa)}}" class="tm-nav-item-link">Aktivitas Saya</a>
                        </li>
                        <li class="tm-nav-item">
                            <a href="{{url('admin/alumni/akun/'.$data->id_mahasiswa)}}" class="tm-nav-item-link">Edit Akun</a>
                        </li>
                        <li class="tm-nav-item">
                            <a href="{{url('login')}}" class="tm-nav-item-link">Log out</a>
                        </li>
                    </ul>

                </div> <!-- Left column: logo and menu -->

                <!-- Right column: content -->
                <div class="tm-right-column">
                    <figure>
                        <img src="{{url('imgs')}}/{{('pasim.jpg') }}" alt="Header image" class="img-fluid">    
                    </figure>
                    <div class="tm-content-div">