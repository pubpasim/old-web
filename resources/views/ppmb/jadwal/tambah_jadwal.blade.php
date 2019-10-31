		@include('tampilan.head')
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">JADWAL KEGIATAN PPMB</div>
					<div class="panel-body">
						<form role="form" action="/jadwal_ppmb/store" method="POST">
							{{ @csrf_field() }}
							<div class="form-group">
								<label>ID Jadwal</label>
								<input class="form-control" name="id_jadwal" placeholder="Id Jadwal" readonly="">
							</div>
							<div class="form-group">
								<select class="form-control" id="kategori_tes" name="id_kategori_tes">
									<label>Kategori Kegiatan / Tes </label>
									<option value="0"> --Kategori Kegiatan / Tes--</option>
									@foreach($kategori as $data)
									<option value="{{$data->id_kategori_tes}}">{{$data->kategori_tes}}</option>
									@endforeach
								</select>
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
		</div>

		@include('tampilan.foot')
