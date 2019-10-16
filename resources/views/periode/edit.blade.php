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
				<div class="panel-heading">FROM UBAH PERIODE</div>
				<div class="panel-body">
					<div class="col-md-6">

						<form role="form" action="/periode/update" method="POST">
							{{ @csrf_field() }}
							@foreach($periode as $data)
							<div class="form-group">
								<label>ID Periode</label>
								<input class="form-control" name="id_periode" value="{{$data->id_periode}}" placeholder="Id Periode" readonly="">
							</div>
							<div class="form-group">
								<label>Periode</label>
								<input class="form-control" name="periode" value="{{$data->periode}}" placeholder="Periode">
							</div>
							@endforeach
							<button type="submit" class="btn btn-primary">SIMPAN DATA </button>			
						</form>
					</div>
				</div>
			</div>
		</div>	
		@include('tampilan.foot')
