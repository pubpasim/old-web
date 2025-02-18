	@include('tampilan.head')
	<style type="text/css">
		#form1{
			width: 750px;
			height: 500px;
			margin-left: 300px;
		}
	</style>
	<div id="form1">
		<form method="POST" action="{{URL('alumni_admin/det_pelatihan/store')}}" Class="form-horizontal" id="block-validate">
			{{csrf_field()}}
			<div class="row">
				<div class="panel-heading">TAMBAH DATA</div>
				<div class="panel-body">
					<div class="col-md-6">
						<form role="form">
							
							<div class="form-group">
								<label>Struktur Organisasi</label>


								<div class="col-75">
									<select id="det_orgpub" name="angkatan">
										<option value="0"> --Angkatan--</option>
										@foreach($angkatan as $data)
										<option value="{{$data->id_angkatan}}">{{$data->angkatan}}</option>
									
										@endforeach
									</select>
								</div>

								<div class="col-75">
									<select id="det_orgpub" name="pelatihan">
										<option value="0"> --Pelatihan--</option>
										@foreach($pelatihan as $data)
										<option value="{{$data->id_pelatihan}}">{{$data->pelatihan}}</option>
										@endforeach
									</select>
								</div>
									
								</div>
							<div class="col-75">
							<button type="submit" name="submit" class="btn btn-primary">TAMBAH DATA</button>
							</div>

																
								
					
		</div>
	</form>
							</div>

							<div class="col-75">
								<select id="det_orgpub" name="angkatan">
									<option value="0"> --Angkatan--</option>
									@foreach($angkatan as $data)
									<option value="{{$data->id_angkatan}}">{{$data->angkatan}}</option>
									
									@endforeach
								</select>
							</div>

							<div class="col-75">
								<select id="det_orgpub" name="pelatihan">
									<option value="0"> --Pelatihan--</option>
									@foreach($pelatihan as $data)
									<option value="{{$data->id_pelatihan}}">{{$data->pelatihan}}</option>
									@endforeach
								</select>
							</div>

							<div class="col-75">
								<div class="form-group">
									<b>File Gambar</b><br/>
									<input type="file" name="file">
								</div>
							</div>
							
							<button type="submit" name="submit" class="btn btn-primary">TAMBAH DATA</button>
						</form>
					</div>
				</div>
			</div>
		</form>
		<!--/.row-->	
	</div><!--/.main-->

	@include('tampilan.foot')
