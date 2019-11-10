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
					<div class="panel-heading">KATEGORI JADWAL TES PPMB</div>
					<div class="panel-body">		
						<form role="form" action="{{URL('kategori_jadwal_ppmb/update')}}" method="POST">
							@if(\Session::has('alert'))
							<div class="alert">
								{{Session::get('alert')}}
							</div>
							@endif
							{{ @csrf_field() }}
							<?php  foreach($kategjadwalppmb as $data) {?>
								<div class="form-group">
									<label>Id Kategori Tes</label>
									<input class="form-control" name="id_kategori_tes" placeholder="Id Kategori Tes" value="{{$data->id_kategori_tes}}" readonly="">
								</div>
								<div class="form-group">
									<label>Kategori Tes</label>
									<input class="form-control" name="kategori_tes" placeholder="Kategori Tes" value="{{$data->kategori_tes}}">
								</div>
							<?php } ?>
							<button type="submit" class="btn btn-primary">SIMPAN DATA </button>
						</form>
						
					</div>
				</div>
			</div>
		</div>	
		@include('tampilan.foot')
