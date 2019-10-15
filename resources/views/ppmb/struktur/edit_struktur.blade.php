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
			<div class="panel-heading">FROM UBAH PANITIA</div>
					<div class="panel-body">
						<div class="col-md-6">

							<form role="form" action="/struktur_ppmb/update" method="POST">
								 {{ @csrf_field() }}
								 <?php  foreach($orgppmb as $data) {?>
								<div class="form-group">
									<label>ID Jabatan</label>
									<input class="form-control" name="id_jabatan" placeholder="Id Jabatan" value="{{$data->id_orgppmb}}" readonly="">
								</div>
								<div class="form-group">
									<label>Jabatan</label>
									<input class="form-control" name="jabatan" placeholder="Jabatan" value="{{$data->jabatan}}">
								</div>
								<?php } ?>
								<button type="submit" class="btn btn-primary">TAMBAH DATA </button>			
							</form>
						</div>
					</div>
				</div>
			</div>	
	@include('tampilan.foot')
