		@include('tampilan.head')
		<style type="text/css">
			#form1{
				width: 750px;
				height: 500px;
				margin-left: 300px;
			}
		</style>
		<div id="form1">
		<div class="row">
			<div class="panel-heading">FROM UBAH JADWAL</div>
					<div class="panel-body">
						<div class="col-md-6">			
							<form role="form" action="/jadwal_ppmb/update" method="POST">
								 {{ @csrf_field() }}
								 <?php  foreach($jadwalppmb as $data) {?>
								<div class="form-group">
									<label>ID Jadwal</label>
									<input class="form-control" name="id_jadwal" placeholder="Id Jadwal" value="{{$data->id_jadwal}}" readonly="">
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
			</div>	
	@include('tampilan.foot')
