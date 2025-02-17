		@include('tampilan.head')

		<div class="row" style="padding: 20px;">
			<div class="co  l-lg-12">
				<div class="panel panel-default">

					<div class="panel-body">
						<div class="panel-heading"><h2 align="center">FORM UBAH DOKUMENTASI</h2></div>
						
						

						<div class="col-md-6">

							<form role="form" action="{{url('dok_jad_survey/update/'.$data->id_dok_survey)}}" method="POST" enctype="multipart/form-data">
								@if(\Session::has('alert'))
								<div class="alert">
									{{Session::get('alert')}}
								</div>
							    @endif
							{{ @csrf_field() }}
							
							<img src="{{url('imgs/kegiatan_survey')}}/{{$data->foto}}" width="100px">
							<div class="form-group">
            					<label for="tahun">Foto</label>
            					<input type="file" id="foto" class="form-control" name="foto">
            				</div>
            				
            				<div class="form-group">
            					<label for="tahun">Keterangan</label>
            					<input type="text" id="foto" class="form-control" name="keterangan" value="{{$data->keterangan}}">
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
