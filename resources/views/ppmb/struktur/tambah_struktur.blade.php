		@include('tampilan.head')
		
			
	<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
		    <div class="row" style="padding: 20px;">
					<div class="panel-body">
						<div class="page-header"><h3>Form Tambah Jabatan PPMB</h3></div>
						<div class="col-md-6">

							<form role="form" action="{{url('struktur_ppmb/store')}}" method="POST">
								{{ @csrf_field() }}
								<div class="form-group">
									<label>ID Jabatan</label>
									<input class="form-control" name="id_jabatan" placeholder="Id Jabatan" readonly="">
								</div>
								<div class="form-group">
									<label>Jabatan</label>
									<input class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
								</div>
								
								<button type="submit" class="btn btn-primary">TAMBAH DATA </button>			
							</form>
						</div>
					</div>
				</div>
		</div>
	</div>	
</div>
		
			
            	<script>
            		$("#jabatan").select2();
            	</script>
            	
			@include('tampilan.foot')
