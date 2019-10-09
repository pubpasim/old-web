
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Data Mahasiswa</title>

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
				<a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
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
			<li><a href="index.html"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="widgets.html"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Widgets</a></li>
			<li><a href="charts.html"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Charts</a></li>
			<li class="active"><a href="tables.html"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Tables</a></li>
			<li><a href="forms.html"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Forms</a></li>
			<li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li>
			<li><a href="icons.html"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Dropdown 
				</a>
				<ul class="children collapse" id="sub-item-1">
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
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Daftar Angkatan PUB</h1>
			</div>
		</div><!--/.row-->

@include('tampilan.head')
	<style>
		#dataTable {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 75%;
			margin-right: 50px;
		}

		#dataTable td, #dataTable th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		#dataTable tr:nth-child(even){background-color: #f2f2f2;}

		#dataTable tr:hover {background-color: #ddd;}

		#dataTable th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #4CAF50;
			color: white;
		}
		* {
			box-sizing: border-box;
		}

		input[type=text], select, textarea {
			width: 100%;
			padding: 17px;
			border: 1px solid #ccc;
			border-radius: 4px;
			resize: vertical;
		}

		label {
			padding: 12px 12px 12px 0;
			display: inline-block;
		}

		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			margin-left: 100px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			float: left;
		}

		input[type=submit]:hover {
			background-color: #45a049;
		}

		.container {
			border-radius: 5px;
			background-color: #ffffff;
			padding: 30px;
		}

		.col-25 {
			padding-left: 100px;
			width: 25%;
			margin-top: 6px;
		}

		.col-75 {
			padding-left: 100px;
			width: 50%;
			margin-top: 6px;
		}
		#form1{
			width: 750px;
			height: 500px;
			margin-left: 300px;
		}
		/* Clear floats after the columns */
		.row:after {
			content: "";
			display: table;
			clear: both;
		}

		/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
		@media screen and (max-width: 600px) {
			.col-25, .col-75, input[type=submit] {
				width: 100%;
				margin-top: 0;
			}
		}

	</style>

	<div id="form1">
		<h1>Daftar Mahasiswa PUB</h1>
		<div class="container">
			<a href="{{url('tambahAlumni')}}"><button class="btn btn-primary" style=" background-color: #339966; width: 100%;"><svg class="glyph stroked plus sign" style="height: 30px;"><use xlink:href="#stroked-plus-sign"/></svg></button></a>
			<table id="myTable">				
				<thead>
					<tr>
						<th>NIM</th>
						<th>NAMA</th>
						<th>ASAL DAERAH</th>
						<th>ASAL SEKOLAH</th>
						<th>JABATAN DI PUB</th>
						<th>JABATAN DI PPMB</th>
						<th>STATUS PERNIKAHAN</th>
						<th>JURUSAN</th>
						<th>AKSI</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($mahasiswa as $mhs)
					<tr>
						<td>{{$mhs->nim}}</td>
						<td>{{$mhs->nama}}</td>
						<td>{{$mhs->kab_kot}}</td>
						<td>{{$mhs->sekolah}}</td>
						<td>{{$mhs->jabatan_pub}}</td>
						<td>{{$mhs->jabatan}}</td>
						<td>{{$mhs->status}}</td>
						<td>{{$mhs->nama_jur}}</td>
						<td><button type="reset" class="btn btn-default">Detail</button></td>
						<td><button class="btn btn-primary" style="background-color: red;">Hapus</button></td>
						<td><button class="btn btn-primary">Edit</button></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@include('tampilan.foot')

