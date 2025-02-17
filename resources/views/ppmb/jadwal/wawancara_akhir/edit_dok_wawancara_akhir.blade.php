		@include('tampilan.head')

		<div class="row" style="padding: 20px;">
			<div class="co  l-lg-12">
				<div class="panel panel-default">

					<div class="panel-body">
						<div class="panel-heading"><h2 align="center">FORM UBAH DOKUMENTASI</h2></div>
						
						

						<div class="col-md-6">

							<form role="form" action="{{url('dok_jad_wawancara_akhir/update/'.$data->id)}}" method="POST" enctype="multipart/form-data">
								@if(\Session::has('alert'))
								<div class="alert">
									{{Session::get('alert')}}
								</div>
							    @endif
							{{ @csrf_field() }}
							
							<img src="{{url('imgs/kegiatan_wawancara')}}/{{$data->foto}}" width="100px">
							<div class="form-group">
            					<label for="tahun">Foto</label>
            					<input type="file" id="foto" class="form-control" name="foto">
            				</div>
            				
            				<div class="form-group">
            					<label for="tahun">Keterangan</label>
            					<input type="text" id="foto" class="form-control" name="keterangan" value="{{$data->keterangan}}">
            				</div>
            				
            				<div class="form-group">
								<label>Hari</label>
								<select class="form-control" id="x" name="hari">
									
									<option value="0"> Hari Ke-</option>
									<option value="1" @if($data->hari=="1") selected="" @endif)>1</option>
									<option value="2" @if($data->hari=="2") selected="" @endif)>2</option>
									<option value="3" @if($data->hari=="3") selected="" @endif)>3</option>
								</select>
							</div>
							<div class="form-group">
								<label>Periode</label>
								<select class="form-control" id="x" name="periode">
									<option value="0">Periode</option>
									@foreach($periode as $per)
									<option value="{{$per->id_periode}}" @if($per->id_periode==$data->fk_periode) selected="" @endif) >{{$per->periode}}</option>
									@endforeach
								</select>
							</div>
							
            				
							<button type="submit" class="btn btn-primary">UBAH DATA </button>			
							
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		 <script>
    		$("#tempat").select2();
    		$("#daerah").select2();
    	</script>
		@include('tampilan.foot')
