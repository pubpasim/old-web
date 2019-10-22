<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Neaty HTML Web Template</title>
<!--
Neaty HTML Template
http://www.templatemo.com/tm-501-neaty
-->
<!-- load stylesheets -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
<link rel="stylesheet" href="/neaty/css/bootstrap.min.css">                                      <!-- Bootstrap style -->
<link rel="stylesheet" href="/neaty/css/magnific-popup.css">                                <!-- Magnific pop up style, http://dimsemenov.com/plugins/magnific-popup/ -->
<link rel="stylesheet" href="/neaty/css/templatemo-style.css">                                   <!-- Templatemo style -->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elesments and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
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
                    <nav>
                        <ul >
                            <li class="tm-nav-item">
                                <a href="{{url('admin/alumni/'.$data->id_mahasiswa)}}" class="tm-nav-item-link">Beranda</a>
                            </li>
                            <input type="hidden" name="id_mhs" value="{{$data->id_mahasiswa}}">
                            <li class="tm-nav-item">
                                <a href="{{url('admin/alumni/profile/'.$data->id_mahasiswa)}}" class="tm-nav-item-link">Profile</a>
                            </li>
                            <li class="tm-nav-item">
                                <a href="#galleryone" class="tm-nav-item-link">My Activity</a>
                            </li>
                            <li class="tm-nav-item">
                                <a href="#secondgallery" class="tm-nav-item-link">Data Infaq</a>
                            </li>
                            <li class="tm-nav-item">
                                <a href="#thirdgallery" class="tm-nav-item-link">Data Alumni</a>
                            </li>
                            <li class="tm-nav-item">
                                <a href="#contact" class="tm-nav-item-link">Log out</a>
                            </li>
                        </ul>
                    </nav>                                         
                </div> <!-- Left column: logo and menu -->

                <!-- Right column: content -->
                <div class="tm-right-column">
                    <figure>
                        <img src="{{url('imgs')}}/{{('pasim.jpg') }}" alt="Header image" class="img-fluid">    
                    </figure>
                    <div class="tm-content-div">