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
			<div class="panel-heading">FROM UBAH DAERAH YANG DISOSIALISASI</div>
					<div class="panel-body">
						<div class="col-md-6">

							<form role="form" action="{{url('daerah_sos_ppmb/update')}}" method="POST">
								@foreach($daerah_sos as $d)
								 {{ @csrf_field() }}
								<div class="form-group">
									<label>ID Jadwal</label>
									<input class="form-control" name="id_daerah_sos" placeholder="Id Daerah_sos" readonly="" value="{{$d->id_daerah_sos}}">
								</div>
								<div class="form-group">
									<select class="form-control" id="kegiatan" name="id_daerah">
										<label></label>
										<option value="{{$d->id_daerah}}">{{$d->kab_kot}}
										<option value="0"> --Daerah--</option>
										@foreach($daerah_sos as $data)
										<option value="{{$data->id_daerah}}">{{$data->kab_kot}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" id="periode" name="id_periode">
										<label>Periode</label>
										<option value="{{$d->id_periode}}">{{$d->periode}}</option>
										<option value="0"> --Periode--</option>
										@foreach($periode as $data)
										<option value="{{$data->id_periode}}">{{$data->periode}}</option>
										@endforeach
									</select>
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
								@endforeach
								
								<button type="submit" class="btn btn-primary">TAMBAH DATA </button>			
							</form>
						</div>
					</div>
				</div>
			</div>	
	@include('tampilan.foot')
