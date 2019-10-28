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
			<div class="panel-heading">FROM UBAH KATEGORI TES</div>
					<div class="panel-body">
						<div class="col-md-6">			
							<form role="form" action="{{URL('kategori_jadwal_ppmb/update')}}" method="POST">
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
