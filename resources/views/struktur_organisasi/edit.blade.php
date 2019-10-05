		@include('tampilan.head')
		@foreach ($organisasi as $data)
		<form method="POST" action="{{URL('struktur_organisasi/store')}}" Class="form-horizontal" id="block-validate">
			{{csrf_field()}}
			<div class="row">
				<div class="panel-heading">INPUT DATA</div>
				<div class="panel-body">
					<div class="col-md-6">
						<form role="form">
							
							<div class="form-group">
								<label>JABATAN</label>
								<input type="text" name="jabatan" value="{{$data->jabatan}}">
							</div>
							<button type="submit" name="submit" class="btn btn-primary">TAMBAH DATA </button>							
						</div>
					</form>
					@endforeach
@include('tampilan.foot')