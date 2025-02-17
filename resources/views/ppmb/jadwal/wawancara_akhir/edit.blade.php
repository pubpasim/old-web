@include('tampilan.head')
		<div class="row" style="padding: 20px;">
			<div class="co  l-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
					    <div class="panel-heading"><h2 align="center">FORM UBAH JADWAL WAWANCARA AKHIR</h2></div>
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
								<select class="form-control" id="periode" name="id_periode">
									@foreach($periode as $data)
									<option value="{{$data->id_periode}}" @if($data->id_periode==$d->id_periode) selected="" @endif>{{$data->periode}}</option>
									@endforeach
								</select>
							</div>
							
							<div class="form-group">
							    <label>Peserta</label>
								<input type="text" name="peserta" value={{$d->peserta}} class="form-control" placeholder="peserta">

							</div>
							<div class="form-group">
									<label>Asal Daerah</label>
								<select class="form-control" id="daerah" name="id_daerah">
									@foreach($daerah as $data2)
									<option value="{{$data2->id_daerah}}" @if($data2->id_daerah==$d->id_daerah) selected="" @endif>{{$data2->kab_kot}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
									<label>Asal Sekolah</label>
								<select class="form-control" id="id_sekolah" name="id_sekolah">
									@foreach($sekolah as $data3)
									<option value="{{$data3->id_sekolah}}" @if($data3->id_sekolah==$d->id_sekolah) selected="" @endif>{{$data3->sekolah}}</option>                          
									@endforeach
								</select>
							</div>
							<div class="form-group">
									<label>Waktu Pelaksanaan</label>	
								<select class="form-control" id="waktu" name="waktu">
									<option value="1" @if($d->hari=="1") selected="" @endif>Hari Pertama</option>
									<option value="2" @if($d->hari=="2") selected="" @endif>Hari Kedua</option>
									<option value="3" @if($d->hari=="3") selected="" @endif>Hari Ketiga</option>
								</select>
							</div>
							<div class="form-group">
								<label>Tanggal</label>
								<input class="form-control" type="date" name="tanggal" placeholder="tanggal" value="{{$d->tanggal}}">
							</div>

							@endforeach
							<button type="submit" class="btn btn-primary">SIMPAN</button>			
						</form>
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