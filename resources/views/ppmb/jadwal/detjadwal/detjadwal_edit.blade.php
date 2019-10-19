		@include('tampilan.head')
		<style type="text/css">
			#form1{
				width: 750px;
				height: 500px;
				margin-left: 300px;
			}
		</style>
		<div id="form1">
		<div class="row">
			<div class="panel-heading">FROM UBAH JADWAL</div>
					<div class="panel-body">
						<div class="col-md-6">

							<form role="form" action="/detjadwal_ppmb/update" method="POST">
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
									<select class="form-control" id="daerah" name="daerah">
										<label>Daerah</label>
										<option value="{{$d->id_daerah}}">{{$d->kab_kot}}</option>
										<option value="0"> --Daerah--</option>
										@foreach($daerah as $data)
										<option value="{{$data->id_daerah}}">{{$data->kab_kot}}</option>
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
									<input type="time" class="form-control" name="waktu" value="{{$d->waktu}}" placeholder="Waktu">
								</div>
								<div class="form-group">
									<select class="form-control" id="tempat" name="tempat">
										<label>Tempat</label>
										<option value="{{$d->id_sekolah}}">{{$d->sekolah}}</option>
										<option value="0"> --Tempat--</option>
										@foreach($sekolah as $data)
										<option value="{{$data->id_sekolah}}">{{$data->sekolah}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<textarea class="form-control" name="alamat" placeholder="Alamat">{{$d->alamat}}</textarea>
								</div>
								@endforeach
								<button type="submit" class="btn btn-primary">SIMPAN DATA </button>			
							</form>
						</div>
					</div>
				</div>
			</div>	
	@include('tampilan.foot')
