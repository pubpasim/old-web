		@include('tampilan.head')
		<style type="text/css">
			#form1{
				width: 750px;
				height: 500px;
				margin-left: 300px;
			}
		</style>
	<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
		    <div class="row" style="padding: 20px;">
					<div class="panel-body">
						<div class="page-header"><h3>Form Tambah Kategori Tes</h3></div>
						<div class="col-md-6">
							<form role="form" action="{{URL('kategori_jadwal_ppmb/store')}}" method="POST">
								 {{ @csrf_field() }}
								<div class="form-group">
									<label>ID Jadwal</label>
									<input class="form-control" name="id_kategori_tes" placeholder="Id Kategori Tes" readonly="">
								</div>
								<div class="form-group">
									<label>Kategori Tes</label>
									<input class="form-control" name="kategori_tes" placeholder="Kategori Tes">
								</div>
								<button type="submit" class="btn btn-primary">TAMBAH DATA </button>			
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('tampilan.foot')
