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
						<div class="panel-heading">Form Edit Struktur Organisasi PPMB</div>
						<div class="col-md-6">

							<form role="form" action="/det_struktur_ppmb/update" method="POST">
								@foreach($detorgppmb as $d)
								{{ @csrf_field() }}
								<div class="form-group">
									<label>ID Panitia</label>
									<input class="form-control" name="id_pengurus" value="{{$d->id_detil}}" placeholder="Id Panitia" readonly="">
								</div>

								<div class="form-group">
									<select class="form-control" id="mahasiswa" name="mhs">
										<label>Mahasiswa</label>
										<option value="{{$d->id_mahasiswa}}">{{$d->nama}}</option>
										<option > --Mahasiswa--</option>
										@foreach($mahasiswa as $data)
										<option value="{{$data->id_mahasiswa}}">{{$data->nama}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" id="angkatan" name="ang">
										<label>Angkatan</label>
										<option value="{{$d->id_angkatan}}">{{$d->angkatan}}</option>
										<option value="0"> --Angkatan--</option>
										@foreach($angkatan as $data)
										<option value="{{$data->id_angkatan}}">{{$data->angkatan}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" id="jabatan" name="jab">
										<label>Jabatan</label>
										<option value="{{$d->id_orgppmb}}">{{$d->jabatan}}</option>
										<option value="0"> --Jabatan--</option>
										@foreach($jabatan as $data)
										<option value="{{$data->id_orgppmb}}">{{$data->jabatan}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" id="periode" name="periode">
										<label>Periode</label>
										<option value="{{$d->id_periode}}">{{$d->periode}}</option>
										<option value="0"> --Periode--</option>
										@foreach($periode as $data)
										<option value="{{$data->id_periode}}">{{$data->periode}}</option>
										@endforeach
									</select>
								</div>
								@endforeach
								<button type="submit" class="btn btn-primary">SIMPAN DATA </button>

							</form>

						</div>
					</div>
				</div>
				@include('tampilan.foot')
