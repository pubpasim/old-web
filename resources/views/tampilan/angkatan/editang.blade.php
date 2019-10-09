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
	@include('tampilan.head')
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		@foreach($ang as $data)
		<form method="POST" action="{{URL('tampilan/angkatan/'.$data->id_angkatan)}}" Class="form-horizontal" id="block-validate">
		{{csrf_field()}}>
		<div class="row">
			<div class="panel-heading">FROM UBAH DATA ANGKATAN</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form">
							
								<div class="form-group">
									<label>NAMA ANGKATAN</label>
									<input class="form-control" placeholder="Nama Angkatan" name="nama_angkatan" value="{{$data->nama_angkatan}}">
								</div>
								<div class="form-group">
									<label>ANGKATAN</label>
									<input class="form-control" placeholder="Angkatan" name="angkatan" value="{{$data->angkatan}}">
								
								<button type="submit" class="btn btn-primary">UBAH DATA </button>
								
																
								
					
		</div>
	</form>
	  @endforeach
		<!--/.row-->	
	</div><!--/.main-->

	@include('tampilan.foot')
</body>

</html>
