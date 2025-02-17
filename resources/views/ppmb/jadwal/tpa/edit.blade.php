		@include('tampilan.head')
		<style type="text/css">
			#form1{
				width: 750px;
				height: 500px;
				margin-left: 300px;
			}
		</style>

		<div class="row" >
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="panel-heading"><h2 align="center">FORM UBAH JADWAL TPA</h2></div>
						<div class="col-md-6">
							<form role="form" action="{{url('jad_tpa/update')}}" method="POST">
								{{ @csrf_field() }}
								@foreach($jad_tpa as $data)
								<div class="form-group">
									<label>ID Jadwal</label>
									<input class="form-control" name="id_jad_tpa" placeholder="Id Jadwal Tpa" readonly="" value="{{$data->id_jad_tpa}}">
								</div>
								<div class="form-group">
								    <label>Periode</label>
									<select class="form-control" id="periode" name="id_periode">
										<option value="{{$data->id_periode}}">{{$data->periode}}</option>
										<option value="0"> --Periode--</option>
										@foreach($periode as $d)
										<option value="{{$data->id_periode}}">{{$data->periode}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Daerah</label>
									<select class="form-control" id="id_daerah" name="id_daerah">
										<option value="{{$data->id_daerah}}">{{$data->kab_kot}}</option>
										<option value="0"> --Daerah--</option>
										@foreach($daerah as $d)
										<option value="{{$d->id_daerah}}">{{$d->kab_kot}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
								    <label>Tanggal</label>
									<input class="form-control" type="date" name="tanggal" placeholder="tanggal" value="{{$data->tanggal}}">
								</div>
								<div class="form-group">
								    <label>Waktu</label>
									<input class="form-control" type="time" name="waktu" placeholder="waktu" value="{{$data->waktu}}">
								</div>
								<div class="form-group">
								    <label>Tempat</label>
									<select class="form-control" id="id_sekolah" name="id_sekolah">
										<label>Tempat</label>
										<option value="{{$data->id_sekolah}}">{{$data->sekolah}}</option>    
										<option value="0"> --Tempat--</option>
										@foreach($sekolah as $d)
										<option value="{{$d->id_sekolah}}">{{$d->sekolah}}</option>                          
										@endforeach
									</select>
								</div>
								@endforeach
								<button type="submit" class="btn btn-primary">SIMPAN</button>			
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		 <script>
    		$("#periode").select2();
    		$("#id_daerah").select2();
    		$("#id_sekolah").select2();
    	</script>
		@include('tampilan.foot')
