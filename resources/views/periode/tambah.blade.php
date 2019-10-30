		@include('tampilan.head')
			<div class="row">
				<div class="col-lg-12">
					<h2 class="page-header" align="center">Form Tambah Periode</h2>
				</div>
			</div><!--/.row-->
			<div class="row" >
				<div class="col-lg-12">
					<div class="panel panel-default">
						<form role="form" action="{{url('periode/store')}}" method="POST">
							{{csrf_field()}}
							<div class="row" style="padding: 20px;">
								<div class="panel-body">
									<div class="form-group">
										<label>ID Periode</label>
										<input class="form-control" name="id_periode" placeholder="Id Periode" readonly="">
									</div>
									<div class="form-group">
										<label>Periode</label>
										<input class="form-control" name="periode" placeholder="Periode">
									</div>
									<button type="submit" class="btn btn-primary">TAMBAH DATA </button>			
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>		
		
		@include('tampilan.foot')
