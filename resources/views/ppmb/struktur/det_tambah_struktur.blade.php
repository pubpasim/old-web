		@include('tampilan.head')
		<style type="text/css">
			#form1{
				width: 750px;
				height: 500px;
				margin-left: 300px;
			}
		</style>
		<div class="row" style="padding: 20px;">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="panel-heading">FORM TAMBAH STRUKTUR KEPENGURUSAN PPMB </div>
						<div class="col-md-6">
							<form role="form" action="{{url('det_struktur_ppmb/store')}}" method="POST">
								{{ @csrf_field() }}
								<div class="form-group">
									<label>ID Panitia</label>
									<input class="form-control" name="id_pengurus" placeholder="Id Panitia" readonly="">
								</div>
								<div class="form-group">
								    	<label>Mahasiswa</label>
									<select class="form-control" id="mahasiswa" name="mahasiswa">
									
										<option value="0"> --Mahasiswa--</option>
										@foreach($mahasiswa as $data)
										<option value="{{$data->id_mahasiswa}}">{{$data->nama}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
								    <label>Angkatan</label>
									<select class="form-control" id="angkatan" name="angkatan">
										
										<option value="0"> --Angkatan--</option>
										@foreach($angkatan as $data)
										<option value="{{$data->id_angkatan}}">{{$data->angkatan}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
								    <label>Mahasiswa</label>
									<select class="form-control" id="jabatan" name="jabatan">
										<option value="0"> --Jabatan--</option>
										@foreach($jabatan as $data)
										<option value="{{$data->id_orgppmb}}">{{$data->jabatan}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
								    <label>Periode</label>
									<select class="form-control" id="periode" name="periode">
										<option value="0"> --Periode--</option>
										@foreach($periode as $data)
										<option value="{{$data->id_periode}}">{{$data->periode}}</option>
										@endforeach
									</select>
								</div>
								<button type="submit" class="btn btn-primary">TAMBAH DATA </button>

							</form>

						</div>
					</div>
				</div>	
			</div>
		</div>
		<script>
    		$("#mahasiswa").select2();
    	</script>
    	<script>
    		$("#angkatan").select2();
    	</script>
    	<script>
    		$("#jabatan").select2();
    	</script>
    	<script>
    		$("#periode").select2();
    	</script>
		
		@include('tampilan.foot')
