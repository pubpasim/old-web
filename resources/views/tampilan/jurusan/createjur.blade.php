
@include('tampilan.head')	
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Icons</li>
		</ol>
	</div><!--/.row-->
	<form method="POST" action="{{URL('jurusanModel')}}" Class="form-horizontal" id="block-validate">
		{{csrf_field()}}>
		<div class="row">
			<div class="panel-heading">FROM TAMBAH DATA JURUSAN</div>
			<div class="panel-body">
				<div class="col-md-6">
					<form role="form">

						<div class="form-group">
							<label>NAMA JURUSAN</label>
							<input class="form-control" placeholder="Nama Jurusan" name="nama_jur">
						</div>
						<button type="submit" class="btn btn-primary">TAMBAH DATA </button>
					</form>
				</div>
			</div>
		</div>
	</form>
	<!--/.row-->	
</div><!--/.main-->
@include('tampilan.foot')
