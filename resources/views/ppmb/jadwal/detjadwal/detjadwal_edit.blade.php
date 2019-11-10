		@include('tampilan.head')
		
		<div class="row" >
			<div class="col-lg-12">
				<div class="panel panel-default"> 
					<div class="panel-body">
						<div class="panel-heading">FORM UBAH JADWAL</div>
						<div class="col-md-6">

							<form role="form" action="{{url('detjadwal_ppmb/update')}}" method="POST">
								{{ @csrf_field() }}
								@foreach($detjadwalppmb as $d)
								<div class="form-group">
									<label>ID Jadwal</label>
									<input class="form-control" name="id_detjadwal" value="{{$d->id_detjadwal}}" placeholder="Id Jadwal" readonly="" >
								</div>
								<div class="form-group">
									<select class="form-control" id="kegiatan" name="kegiatan">
										<label>Kegiatan</label>
										<option value="{{$d->id_jadwal}}">{{$d->kegiatan}}</option>
										<option value="0"> --Kegiatan--</option>
										@foreach($kegiatan as $data)
										<option value="{{$data->id_jadwal}}">{{$data->kegiatan}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" id="periode" name="periode">
										<option value="{{$d->id_periode}}">{{$d->periode}}</option>
										<label>Periode</label>
										<option value="0"> --Periode--</option>
										@foreach($periode as $data)
										<option value="{{$data->id_periode}}">{{$data->periode}}</option>
										@endforeach
									</select>
								</div>
								
								<div class="form-group">
									<b>Tanggal Mulai</b>
									<input type="date" class="form-control" name="tanggal_awal" value="{{$d->tanggal_awal}}" placeholder="Tanggal Mulai">
									<b>Tanggal Selesai</b>
									<input type="date" class="form-control" name="tanggal_akhir" value="{{$d->tanggal_akhir}}" placeholder="Tanggal Selesai">
								</div>
								<div class="form-group">
									<label>Waktu</label>
									<input type="text" class="form-control" name="waktu" value="{{$d->waktu}}" placeholder="Waktu">
								</div>
								
								<div class="form-group">
									<label>Tempat</label>
									<textarea class="form-control" name="alamat" placeholder="Tempat">{{$d->tempat}}</textarea>
								</div>
								@endforeach
								<button type="submit" class="btn btn-primary">SIMPAN DATA </button>			
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('tampilan.foot')
