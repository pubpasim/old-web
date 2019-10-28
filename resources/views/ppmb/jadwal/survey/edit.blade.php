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
			<div class="panel-heading">FORM UBAH JADWAL</div>
					<div class="panel-body">
						<div class="col-md-6">

							<form role="form" action="{{url('jad_survey/update')}}" method="POST">
								@foreach($jad_survey as $d)
								 {{ @csrf_field() }}
								<div class="form-group">
									<label>ID Jadwal</label>
									<input class="form-control" name="id_jad_survey" placeholder="Id Jadwal Survey" value="{{$d->id_jad_survey}}" readonly="">
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
									<select class="form-control" id="daerah" name="id_daerah">
										<label></label>
										<option value="{{$d->id_daerah}}">{{$d->kab_kot}}</option>
										<option value="0"> --Daerah--</option>
										@foreach($daerah as $data)
										<option value="{{$data->id_daerah}}">{{$data->kab_kot}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<input class="form-control" type="date" value="{{$d->waktu}}" name="tanggal" placeholder="tanggal">
								</div>
								<div class="form-group">
									<input class="form-control" type="text" name="jumlah peserta" placeholder="Jumlah Peserta" value="{{$d->jumlah_peserta}}">
								</div>
								<button type="submit" class="btn btn-primary">TAMBAH DATA </button>	
								@endforeach		
							</form>
						</div>
					</div>
				</div>
			</div>	
	@include('tampilan.foot')
