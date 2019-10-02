<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Tables</title>

<link href="/lumino/css/bootstrap.min.css" rel="stylesheet">
<link href="/lumino/css/datepicker3.css" rel="stylesheet">
<link href="/lumino/css/bootstrap-table.css" rel="stylesheet">
<link href="/lumino/css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="/lumino/js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

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
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
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
			<li class="active"><a href="/lumino/index.html"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li class="dropdown ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> PUB <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{url('tampilan/angkatan/viewang')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Daftar Angkatan</a></li>
							<li><a href="{{url('tampilan/sekolah/viewsek')}}"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg></svg> Asal Sekolah</a></li>
							<li><a href="{{url('tampilan/daerah/viewdae')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-blank-document"></use></svg> Asal Daerah</a></li>
							<li><a href="{{url('tampilan/jurusan/viewjur')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-blank-document"></use></svg> Jurusan</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-blank-document"></use></svg> Status Di PUB</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-blank-document"></use></svg> Status Sosial</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-blank-document"></use></svg> Jabatan di PUB</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-blank-document"></use></svg> Jabatan di PPMB</a></li>
						</ul>
					</li>
			<li class="dropdown ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> PPMB <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>Struktur Organisasi</a></li>
							<li><a href="#"><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg></svg> Syarat dan Ketentuan</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Jadwal</a></li>
						</ul>
					</li>
					<li>	
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> ALUMNI <span class="caret"></span></a>
					</li>			<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 1
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 2
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 3
						</a>
					</li>
				</ul>
			</li>
			<li role="presentation" class="divider"></li>
			<li><a href="login.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		<form method="POST" action="{{URL('daerahModel')}}" Class="form-horizontal" id="block-validate">
		{{csrf_field()}}>
		<div class="row">
			<div class="panel-heading">FROM TAMBAH DATA DAERAH</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form">
							
								<div class="form-group">
									<label>NAMA DAERAH</label>
									<input class="form-control" placeholder="Nama Daerah" name="kab_kot">
								</div>
								<button type="submit" class="btn btn-primary">TAMBAH DATA </button>
								
																
								
					
		</div>
	</form>
		<!--/.row-->	
	</div><!--/.main-->

	<script src="/lumino/js/jquery-1.11.1.min.js"></script>
	<script src="/lumino/js/bootstrap.min.js"></script>
	<script src="/lumino/js/chart.min.js"></script>
	<script src="/lumino/js/chart-data.js"></script>
	<script src="/lumino/js/easypiechart.js"></script>
	<script src="/lumino/js/easypiechart-data.js"></script>
	<script src="/lumino/js/bootstrap-datepicker.js"></script>
	<script src="/lumino/js/bootstrap-table.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
