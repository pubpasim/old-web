	@include('tampilan.head')
		<style type="text/css">
			#form1{
				width: 750px;
				height: 500px;
				margin-left: 300px;
			}
		</style>
		<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>

		
		<div class="row">
			<div class="panel-heading">FROM EDIT PERSYARATAN DAN KETENTUAN</div>
					<div class="panel-body" align="center">
						<div class="col-md-12">
							<form method="POST" action="/syarat_ketentuan/update">
								{{ @csrf_field() }}
									@foreach($syarat as $data)
								<div class="form-group">
									<input type="text" name="id_syarat" value="{{$data->id_syarat}}" readonly="" hidden="true">
									<textarea class="ckeditor" id="ckedtor" name="syarat" >{{$data->syarat}}</textarea>
								</div>
									@endforeach
								<button type="submit" class="btn btn-primary">POSTING </button>			
							</form>
							
						</div>
					</div>
				</div>
	@include('tampilan.foot')


