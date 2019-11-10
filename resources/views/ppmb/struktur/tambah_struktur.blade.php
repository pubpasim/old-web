		@include('tampilan.head')
		
		<div class="row" style="padding: 20px;">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="panel-heading">FORM TAMBAH DATA JABATAN</div>
						<div class="col-md-6">

							<form role="form" action="{{url('struktur_ppmb/store')}}" method="POST">
								@if(\Session::has('alert'))
								<div class="alert">
									{{Session::get('alert')}}
								</div>
								@endif
								{{ @csrf_field() }}
								<div class="form-group">
									<label>ID Jabatan</label>
									<input class="form-control" name="id_jabatan" placeholder="Id Jabatan" readonly="">
								</div>
								<div class="form-group">
									<label>Jabatan</label>
									<input class="form-control" name="jabatan" placeholder="Jabatan">
								</div>
								
								<button type="submit" class="btn btn-primary">TAMBAH DATA </button>			
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		@include('tampilan.foot')
