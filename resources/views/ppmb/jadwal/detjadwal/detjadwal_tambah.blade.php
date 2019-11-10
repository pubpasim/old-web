		@include('tampilan.head')
		
		<div class="row" >
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h2 align="center">Tambah Data Jadwal PPMB</h2></div>
					<div class="panel-body">
						<form role="form" action="{{url('/detjadwal_ppmb/store')}}" method="POST">
							@if(\Session::has('alert'))
							<div class="alert">
								{{Session::get('alert')}}
							</div>
							@endif
							{{ @csrf_field() }}
							<div class="form-group">
								<label>ID Jadwal</label>
								<input class="form-control" name="id_detjadwal" placeholder="Id Jadwal" readonly="">
							</div>
							<div class="form-group">
								<label>Kegiatan</label>
								<select class="form-control" id="kegiatan" name="kegiatan">

									<option value="0"> --Kegiatan--</option>
									@foreach($kegiatan as $data)
									<option value="{{$data->id_jadwal}}">{{$data->kegiatan}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Kegiatan</label>
								<select class="form-control" id="periode" name="periode">

									<option value="0"> --Periode--</option>
									@foreach($periode as $data)
									<option value="{{$data->id_periode}}">{{$data->periode}}</option>
									@endforeach
								</select>
							</div>
							
							<div class="form-group">
								<b>Tanggal Mulai</b>
								<input type="date" class="form-control" name="tanggal_awal" placeholder="Tanggal Mulai">
								<b>Tanggal Selesai</b>
								<input type="date" class="form-control" name="tanggal_akhir" placeholder="Tanggal Selesai">
							</div>
							<div class="form-group">
								<label>Waktu</label>
								<input type="text" class="form-control" name="waktu" placeholder="Waktu">
							</div>
							
							<div class="form-group">
								<label>Tempat</label>
								<textarea class="form-control" name="alamat" placeholder="Tempat"></textarea>
							</div>
							<button type="submit" class="btn btn-primary">TAMBAH DATA </button>			
						</form>
					</div>
				</div>
			</div>	
		</div>
	</div>

	@include('tampilan.foot')
