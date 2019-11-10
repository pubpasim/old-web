		@include('tampilan.head')
		<style type="text/css">
			#form1{
				width: 750px;
				height: 500px;
				margin-left: 300px;
			}
		</style>
		<div class="row" style="padding: 20px;">
			<div class="co  l-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="panel-heading"><h2 align="center">FORM UBAH JADWAL</h2></div>
						<form role="form" action="{{url('jad_survey/update')}}" method="POST">
							@if(\Session::has('alert'))
							<div class="alert">
								{{Session::get('alert')}}
							</div>
							@endif
							@foreach($jad_survey as $d)
							{{ @csrf_field() }}

							<div class="form-group">
								<label>ID Jadwal</label>
								<input class="form-control" name="id_jad_survey" placeholder="Id Jadwal Survey" value="{{$d->id_jad_survey}}" readonly="">
							</div>
							<div class="form-group">
									<label>Periode</label>
								<select class="form-control" id="periode" name="id_periode">
									<option value="{{$d->id_periode}}">{{$d->periode}}</option>
									<option value="0"> --Periode--</option>
									@foreach($periode as $data)
									<option value="{{$data->id_periode}}">{{$data->periode}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Daerah</label>
								<select class="form-control" id="daerah" name="id_daerah">
									<option value="{{$d->id_daerah}}">{{$d->kab_kot}}</option>
									<option value="0"> --Daerah--</option>
									@foreach($daerah as $data)
									<option value="{{$data->id_daerah}}">{{$data->kab_kot}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Tanggal Awal</label>
								<input class="form-control" type="date" name="tanggal_awal" placeholder="Tanggal Awal" value="{{$d->tanggal_awal}}">
							</div>
							<div class="form-group">
								<label>Tanggal Akhir</label>
								<input class="form-control" type="date" name="tanggal_akhir" placeholder="Tanggal Akhir" value="{{$d->tanggal_akhir}}">
							</div>
							<div class="form-group">
								<label>Jumlah Peserta</label>
								<input class="form-control" type="text" name="jumlah_peserta" placeholder="Jumlah Peserta" value="{{$d->jumlah_peserta}}">
							</div>
							<button type="submit" class="btn btn-primary">UBAH DATA </button>	
							@endforeach		
						</form>
					</div>
				</div>
			</div>
		</div>


	@include('tampilan.foot')
