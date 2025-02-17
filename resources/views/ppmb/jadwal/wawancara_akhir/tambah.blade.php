[21.21, 16/11/2019] Mw Sihab: @include('tampilan.head')
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
						<div class="panel-heading"><h2 align="center">FORM TAMBAH JADWAL WAWANCARA AKHIR</h2></div>

						<div class="col-md-6">

							<form role="form" action="{{url('jad_wawancara_akhir/store')}}" method="POST">
								@if(\Session::has('alert'))
								<div class="alert">
									{{Session::get('alert')}}
								</div>
								@endif
								{{ @csrf_field() }}
								<div class="form-group">
									<label>ID Jadwal</label>
									<input class="form-control" name="id_jad_wawancara_akhir" placeholder="Id jadwal wawancara akhir" readonly="">
								</div>
								<div class="form-group">
									<label>Periode</label>
									<select class="form-control" id="periode" name="id_periode">
										<option value="0"> --Periode--</option>
										@foreach($periode as $data)
										<option value="{{$data->id_periode}}">{{$data->periode}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Peserta</label>
									<input type="text" name="peserta"  class="form-control" placeholder="peserta">

								</div>
								<div class="form-group">
									<label>Daerah</label>
									<select class="form-control" id="daerah" name="id_daerah">
										<option value="0"> --Asal Daerah--</option>
										@foreach($daerah as $data)
										<option value="{{$data->id_daerah}}">{{$data->kab_kot}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Asal Sekolah</label>
									<select class="form-control" id="id_sekolah" name="id_sekolah">
										<option value="0"> --Asal Sekolah--</option>
										@foreach($sekolah as $data)
										<option value="{{$data->id_sekolah}}">{{$data->sekolah}}</option>                          
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Hari Pelaksanaan</label>
									<select class="form-control" id="waktu" name="waktu">
										<option value="0"> --Waktu Pelaksanaan--</option>
										<option value="1">Hari Pertama</option>
										<option value="2">Hari Kedua</option>
										<option value="3">Hari Ketiga</option>
									</select>
								</div>
								<div class="form-group">
									<label>Tanggal Pelaksanaan</label>
									<input class="form-control" type="date" name="tanggal" placeholder="tanggal">
								</div>
								
								
								<button type="submit" class="btn btn-primary">TAMBAH DATA </button>			
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
    		$("#periode").select2();
    		$("#daerah").select2();
    		$("#id_sekolah").select2();
    		$("#waktu").select2();
    	</script>

		@include('tampilan.foot')