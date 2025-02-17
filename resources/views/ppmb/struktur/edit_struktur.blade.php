		@include('tampilan.head')
		<style type="text/css">
			#form1{
				width: 750px;
				height: 500px;
				margin-left: 300px;
			}
		</style>
		<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
		    <div class="row" style="padding: 20px;">
					<div class="panel-body">
						<div class="page-header"><h3>Form Ubah Jabatan PPMB</h3></div>
						<div class="col-md-6">
							<form role="form" action="{{url('struktur_ppmb/update')}}" method="POST">
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
								<button type="submit" class="btn btn-primary">SIMPAN DATA </button>			
							</form>
						</div>
					</div>
				</div>
	       </div>
		</div>
	</div>
	@include('tampilan.foot')
