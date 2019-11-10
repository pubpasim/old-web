		@include('tampilan.head')
		<div class="row">
			<div class="panel-heading">FORM UBAH JADWAL</div>
			<div class="panel-body">
				<div class="col-md-6">			
					<form role="form" action="{{url('jadwal_ppmb/update')}}" method="POST">
						@if(\Session::has('alert'))
						<div class="alert">
							{{Session::get('alert')}}
						</div>
						@endif
						{{ @csrf_field() }}
						<?php  foreach($jadwalppmb as $data) {?>
							<div class="form-group">
								<label>ID Jadwal</label>
								<input class="form-control" name="id_jadwal" placeholder="Id Jadwal" value="{{$data->id_jadwal}}" readonly="">
							</div>
							<div class="form-group">
								<select class="form-control" id="kategori_tes" name="id_kategori_tes">
									<label>Kategori Kegiatan / Tes </label>
									<option value="{{$data->id_kategori_tes}}">{{$data->kategori_tes}}</option>
									<option value="0"> --Kategori Kegiatan / Tes--</option>
									@foreach($kategori as $d)
									<option value="{{$d->id_kategori_tes}}">{{$d->kategori_tes}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Kegiatan</label>
								<input class="form-control" name="jadwal" placeholder="Kegiatan" value="{{$data->kegiatan}}">
							</div>
						<?php } ?>
						<button type="submit" class="btn btn-primary">SIMPAN DATA </button>
					</form>
					
				</div>
			</div>
		</div>
		@include('tampilan.foot')
