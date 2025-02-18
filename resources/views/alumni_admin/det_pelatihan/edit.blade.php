		@include('tampilan.head')
		@foreach ($detorg_pub as $data)
		<form method="POST" action="{{URL('detorg_pub/store')}}" Class="form-horizontal" id="block-validate">
			{{csrf_field()}}
			<div class="row">
				<div class="panel-heading">INPUT DATA</div>
				<div class="panel-body">
					<div class="col-md-6">
						<form role="form">
							
							<div class="form-group">
								<label>JABATAN</label>
								<input type="text" name="orgpub" value="{{$data->id_orgpub}}">
								<input type="text" name="angkatan" value="{{$data->id_angkatan}}">
								<input type="text" name="mahasiswa" value="{{$data->id_mahasiswa}}">
							</div>
							<button type="submit" name="submit" class="btn btn-primary">TAMBAH DATA </button>							
						</div>
					</form>
					@endforeach
@include('tampilan.foot')