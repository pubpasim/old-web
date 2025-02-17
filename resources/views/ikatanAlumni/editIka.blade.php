		@include('tampilan.head')
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header" align="center">Form Ubah Periode</h2>
			</div>
		</div><!--/.row-->
		<div class="row" >
			<div class="col-lg-12">
				<div class="panel panel-default">
					<form role="form" action="{{url('periode/updateIka/'.$id)}}" method="POST">
						{{csrf_field()}}
						<div class="row" style="padding: 20px;">
							<div class="panel-body">
								@foreach($periode as $data)
								
								<div class="form-group">
									<label>Periode</label>
									<input class="form-control" name="periode" value="{{$data->periode}}" placeholder="Periode">
								</div>
								@endforeach
								<button type="submit" class="btn btn-primary">SIMPAN DATA </button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>				
		@include('tampilan.foot')
