<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PUB Admin</title>
	<link rel="shortcut icon" href="/imgs/pub.png" />
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link href="/lumino/css/bootstrap.min.css" rel="stylesheet">
	<link href="/lumino/css/datepicker3.css" rel="stylesheet">
	<link href="/lumino/css/bootstrap-table.css" rel="stylesheet">
	<link href="/lumino/css/styles.css" rel="stylesheet">
	<!--Icons-->
	<script src="/lumino/js/lumino.glyphs.js"></script>
	<style type="text/css" src="/lumino/css/design.css"></style>
	

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>
<style type="text/css">
	#hide{
		display: none;
	}
</style>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>PUB'S</span>Admin</a>

				<ul class="user-menu">
					

					<a href="{{url('pertanyaan')}}"><img src="{{"imgs"}}/{{"xx.png"}}" width="70px" style="position: relative;"></a>
					<span class="label label-warning" style="position: relative;bottom:20px;right: 15%;">{{Session::get("jumChat")}}</span>
					
					

					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{url('login')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="{{url('admin')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li class="dropdown " >
				<a @if(\Session::get("level")=="admin_pub" || \Session::get("level")=="ikatan_alumni") id="hide" @endif href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> PPMB <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="{{url('/det_struktur_ppmb')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Struktur Organisasi</a></li>
					<li><a href="{{url('/syarat_ketentuan')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg></svg> Syarat dan Ketentuan</a></li>
					<li><a href="{{url('/detjadwal_ppmb')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Jadwal</a></li>
					<li><a href="{{url('hasilSeleksi')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Hasil Seleksi</a></li>
					<li><a href="{{url('dokumentasi')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Dokumentasi</a></li>
					<li><a href="{{url('uploadFormulir')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Upload Formulir</a></li>
				</ul>
			</li>
			<li class="dropdown " > 
				<a @if(\Session::get("level")=="admin_ppmb" || \Session::get("level")=="ikatan_alumni" ) id="hide" @endif href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> PUB <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">

					<li><a href="{{url('detorg_pub')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Struktur Organisasi</a></li>
					<li><a href="{{url('mahasiswa')}}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Data Mahasiswa PUB</a></li>
					<li><a href="{{url('dokumentasiPub')}}"><svg class="glyph stroked landscape"><use xlink:href="#stroked-landscape"/></svg>Dokumentasi PUB</a></li>

				</ul>
			</li>
			<li class="dropdown " >
				<a @if(\Session::get("level")=="admin_pub" || \Session::get("level")=="admin_ppmb" || \Session::get("level")=="ikatan_alumni" ) id="hide" @endif href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> Alumni PUB <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="{{url('Alumni_admin/index')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Daftar Alumni</a></li>
					<li><a href="{{url('alumni/aktivitas')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg></svg> Aktivitas Alumni</a></li>
					<li><a href="{{url('alumni/infaq')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"></use></svg> Data Infaq</a></li>
					
				</ul>
			</li>

			<li class="dropdown " >
				<a @if(\Session::get("level")=="admin_pub" || \Session::get("level")=="admin_ppmb" ) id="hide" @endif href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> Ikatan Alumni PUB <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="{{url('strukturOrgAlumni')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Struktur Organisasi</a></li>
					<li><a href="{{url('kegiatanAlumni')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg></svg> Kegiatan Alumni PUB</a></li>				

					<li><a href="{{url('legalitasAdmin')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg></svg> Legalitas</a></li>				

				</ul>
			</li>
			<li class="dropdown ">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg> Master <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="{{url('tampilan/angkatan/viewang')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Angkatan</a></li>

					<li><a href="{{url('periode')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Periode Kepengurusan</a></li>


					<li><a href="{{url('struktur_organisasi/index')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Jabatan PUB</a></li>
					<li><a href="{{url('struktur_organisasi2/index')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Jabatan Ikatan Alumni</a></li>

					<li><a href="{{url('tampilUser')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Data User</a></li>

					<li><a href="{{url('struktur_ppmb')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Jabatan PPMB</a></li>

					<li><a href="{{url('jadwal_ppmb')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Kegiatan PPMB</a></li>
					<li><a href="{{url('tampilan/daerah/viewdae')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Daerah</a></li>

					<li><a href="{{url('tampilan/sekolah/viewsek')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Asal Sekolah</a></li>


					<li><a href="{{url('tampilan/jurusan/viewjur')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Jurusan</a></li>

					<li><a href="{{url('status_sos')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Status Sosial</a></li>

					<li><a href="{{url('status_pub/index/')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Status PUB</a></li>

					<li><a href="{{url('status_pub')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Status PUB</a></li>
					
				</ul>
			</li>
			<li><a href="{{url('login')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
		</ul>

	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
	