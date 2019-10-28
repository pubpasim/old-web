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
			<div class="panel-heading">FROM TAMBAH JADWAL</div>
					<div class="panel-body">
						<div class="col-md-6">

							<form role="form" action="{{url('jad_wawancara_akhir/store')}}" method="POST">
								 {{ @csrf_field() }}
								<div class="form-group">
									<label>ID Jadwal</label>
									<input class="form-control" name="id_jad_wawancara_akhir" placeholder="Id jadwal wawancara akhir" readonly="">
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
									<input type="text" name="peserta"  class="form-control" placeholder="peserta">

								</div>
								<div class="form-group">
									<select class="form-control" id="daerah" name="id_daerah">
										<label></label>
										<option value="0"> --Asal Daerah--</option>
										@foreach($daerah as $data)
										<option value="{{$data->id_daerah}}">{{$data->kab_kot}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" id="id_sekolah" name="id_sekolah">
										<label></label>
										<option value="0"> --Asal Sekolah--</option>
										@foreach($sekolah as $data)
										<option value="{{$data->id_sekolah}}">{{$data->sekolah}}</option>                          
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" id="waktu" name="waktu">
										<label></label>
										<option value="0"> --Waktu Pelaksanaan--</option>
										<option value="1">Hari Pertama</option>
										<option value="2">Hari Pertama</option>
										<option value="3">Hari Ketiga</option>
									</select>
								</div>
								<div class="form-group">
									<input class="form-control" type="date" name="tanggal" placeholder="tanggal">
								</div>
								
								
								<button type="submit" class="btn btn-primary">TAMBAH DATA </button>			
							</form>
						</div>
					</div>
				</div>
			</div>	
	@include('tampilan.foot')
