		@include('tampilan.head')
		
		<div class="row">
			<div class="panel-heading">FROM TAMBAH PERIODE</div>
			<div class="panel-body">
				<div class="col-md-6">

					<form role="form" action="/periode/store" method="POST">
						{{ @csrf_field() }}
						<div class="form-group">
							<label>ID Periode</label>
							<input class="form-control" name="id_periode" placeholder="Id Periode" readonly="">
						</div>
						<div class="form-group">
							<label>Periode</label>
							<input class="form-control" name="periode" placeholder="Periode">
						</div>
						<button type="submit" class="btn btn-primary">TAMBAH DATA </button>			
					</form>
				</div>
			</div>
		</div>
		
		@include('tampilan.foot')
