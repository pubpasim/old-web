		@include('tampilan.head')
		
		<div class="row">
			<div class="panel-heading">FROM TAMBAH PANITIA</div>
					<div class="panel-body">
						<div class="col-md-6">

							<form role="form" action="/jadwal_ppmb/store" method="POST">
								 {{ @csrf_field() }}
								<div class="form-group">
									<label>ID Jadwal</label>
									<input class="form-control" name="id_jadwal" placeholder="Id Jadwal" readonly="">
								</div>
								<div class="form-group">
									<label>Kegiatan</label>
									<input class="form-control" name="jadwal" placeholder="kegiatan">
								</div>
								<button type="submit" class="btn btn-primary">TAMBAH DATA </button>			
							</form>
						</div>
					</div>
				</div>
			
	@include('tampilan.foot')
