		@include('tampilan.head')
		<div class="row" style="padding: 20px;">
			<div class="co  l-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form role="form" action="{{url('jad_wawancara_akhir/update')}}" method="POST">
							@if(\Session::has('alert'))
							<div class="alert">
								{{Session::get('alert')}}
							</div>
							@endif
							{{ @csrf_field() }}
							@foreach($jad_wawancara_akhir as $d)
							<div class="form-group">
								<label>ID Jadwal</label>
								<input class="form-control" name="id_jad_wawancara_akhir" placeholder="Id jadwal wawancara akhir" readonly="" value="{{$d->id_pesera_wawancara_akhir}}">
							</div>
							<div class="form-group">
								<label>Periode</label>
								<select class="form-control" id="periode" name="id_periode
									<option > --Periode--</option>
									<option value="{{$d->id_periode}}">{{$d->periode}}</option>
									@foreach($periode as $data)
									<option value="{{$data->id_periode}}">{{$data->periode}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<input type="text" name="peserta"  class="form-control" placeholder="peserta">

							</div>
							<div class="form-group">
									<label>Asal Daerah</label>
								<select class="form-control" id="daerah" name="id_daerah">
									<option value="{{$d->id_daerah}}">{{$d->kab_kot}}</option>
									<option> --Asal Daerah--</option>
									@foreach($daerah as $data)
									<option value="{{$data->id_daerah}}">{{$data->kab_kot}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
									<label>Asal Sekolah</label>
								<select class="form-control" id="id_sekolah" name="id_sekolah">
									<option value="{{$d->id_sekolah}}">{{$d->sekolah}}</option>   
									<option > --Asal Sekolah--</option>
									@foreach($sekolah as $data)
									<option value="{{$data->id_sekolah}}">{{$data->sekolah}}</option>                          
									@endforeach
								</select>
							</div>
							<div class="form-group">
									<label>Waktu Pelaksanaan</label>	
								<select class="form-control" id="waktu" name="waktu">
									<option value="{{$d->hari}}">{{$d->hari}}</option>
									<option> --Waktu Pelaksanaan--</option>
				
								
									<option value="1">Hari Pertama</option>
									<option value="2">Hari Kedua</option>
									<option value="3">Hari Ketiga</option>
								</select>
							</div>
							<div class="form-group">
								<label>Tanggal</label>
								<input class="form-control" type="date" name="tanggal" placeholder="tanggal" value="{{$d->tanggal}}">
							</div>

							@endforeach
							<button type="submit" class="btn btn-primary">UBAH DATA </button>			
						</form>
					</div>
				</div>
			</div>
		</div>	
		@include('tampilan.foot')
