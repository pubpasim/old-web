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
			<div class="panel-heading">FROM TAMBAH PANITIA</div>
					<div class="panel-body">
						<div class="col-md-6">

							<form role="form" action="/struktur_ppmb/store" method="POST">
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
	@include('tampilan.foot')
