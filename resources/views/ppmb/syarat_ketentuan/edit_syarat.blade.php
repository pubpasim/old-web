	@include('tampilan.head')
		<style type="text/css">
			#form1{
				width: 750px;
				height: 500px;
				margin-left: 300px;
			}
		</style>
<script type="text/javascript" src="{{url('ckeditor/ckeditor.js')}}"></script>
	<div class="container">
		<div class="panel-heading">FROM EDIT PERSYARATAN DAN KETENTUAN</div>
		@foreach($syarat as $data)
		<form method="POST" action="{{url('syarat_ketentuan/update')}}" enctype="multipart/form-data">
			{{csrf_field()}}
				<div class="col-75">
					<input type="text" name="id_syarat" value="{{$data->id_syarat}}" readonly="" hidden="true">
				</div>
				<div class="col-75">
					<label for="tahun">Text</label>					
				</div>
				<div class="form-group">					
					<textarea class="ckeditor" id="ckedtor" name="syarat" >{{strip_tags($data->syarat)}}</textarea>
				</div>

				
				<div class="row">
					<button type="submit" class="btn btn-info">Submit</button>
				</div>
			</div>
		</form>
		@endforeach
        
</div>
@include('tampilan.foot')


