	@include('tampilan.head')
	<style type="text/css">
		#form1{
			width: 750px;
			height: 500px;
			margin-left: 300px;
		}

		#uploadFile{
		height: 50px;
		width: 510px;
		border-radius: 5px;
		border-style: groove;
	}
	</style>
	<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="panel-heading"><center>FORM EDIT PROFIL PUB</center></div>
				<div class="col-md-12">
					<form method="POST" action="{{url('profil_pub/update')}}">
						{{ @csrf_field() }}
						@if(\Session::has('alert'))
						<div class="alert">
							{{Session::get('alert')}}
						</div>
						@endif
						@foreach($profil_pub as $data)
						<div class="form-group">
							<input type="text" name="id_profilPub" value="{{$data->id_profilPub}}" readonly="" hidden="true">
						</div>
						<div class="form-group">
							<div class="col-25">
								<label for="logo">Logo Profil</label>
							</div>
							<img src="{{url('imgs/logoProfil')}}/{{$data->gambar}}" width="150">
							<input id="uploadFile" value="{{$data->gambar}}" type="file" name="gambar" >
						</div>
						<div class="form-group">
							<div class="col-25">
								<label for="isi">Isi Profil</label>
							</div>
							<textarea class="ckeditor" id="ckedtor" name="profil_pub" >{{$data->profil_pub}}</textarea>
						</div>
						@endforeach
						<button type="submit" class="btn btn-primary">POSTING </button>			
					</form>

				</div>
			</div>
		</div>
	</div>
	@include('tampilan.foot')


