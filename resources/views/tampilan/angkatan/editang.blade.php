
@include('tampilan.head')
	@foreach($ang as $data)
	<form method="POST" action="{{URL('tampilan/angkatan/'.$data->id_angkatan)}}" Class="form-horizontal" id="block-validate">
		{{csrf_field()}} 
		<div class="row" style="padding: 20px;">
			<div class="panel-heading">FORM UBAH DATA ANGKATAN</div>
			<div class="panel-body">
				<div class="col-md-6">
					<form role="form">

						<div class="form-group">
							<label>NAMA ANGKATAN</label>
							<input class="form-control" placeholder="Nama Angkatan" name="nama_angkatan" value="{{$data->nama_angkatan}}">
						</div>
						<div class="form-group">
							<label>ANGKATAN</label>
							<input class="form-control" placeholder="Angkatan" name="angkatan" value="{{$data->angkatan}}">

							<button type="submit" class="btn btn-primary">UBAH DATA </button>

						</div>
					</form>
				</div>
			</div>
		</div>
	</form>	
	@endforeach

@include('tampilan.foot')
