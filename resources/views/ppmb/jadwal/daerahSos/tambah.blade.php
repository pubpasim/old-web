		@include('tampilan.head')
		<div class="row" style="padding: 20px;">
			<div class="co  l-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="panel-heading">FROM TAMBAH JADWAL</div>
						<form role="form" action="{{url('daerah_sos_ppmb/store')}}" method="POST">
							@if(\Session::has('alert'))
								<div class="alert">
									{{Session::get('alert')}}
								</div>
							@endif
							{{ @csrf_field() }}
							<div class="form-group">
								<label>ID Jadwal</label>
								<input class="form-control" name="id_daerah_sos" placeholder="Id Daerah_sos" readonly="">
							</div>
							<div class="form-group">
								<select class="form-control" id="kegiatan" name="id_daerah">
									<label></label>
									<option value="0"> --Daerah--</option>
									@foreach($daerah_sos as $data)
									<option value="{{$data->id_daerah}}">{{$data->kab_kot}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<select class="form-control" id="periode" name="id_periode">
									<label>Periode</label>
									<option value="0"> --Periode--</option>
									@foreach($periode as $data)
									<option value="{{$data->id_periode}}">{{$data->periode}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<select class="form-control" id="tempat" name="tempat">
									<label>Tempat</label>
									<option value="0"> --Tempat--</option>
									@foreach($sekolah as $data)
									<option value="{{$data->id_sekolah}}">{{$data->sekolah}}</option>                          
									@endforeach
								</select>
							</div>

							<button type="submit" class="btn btn-primary">TAMBAH DATA </button>			
						</form>
					</div>
				</div>
			</div>
		</div>

		@include('tampilan.foot')
