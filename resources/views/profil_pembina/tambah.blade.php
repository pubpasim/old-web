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
				<div class="panel-heading"><center>FORM TAMBAH DATA PROFIL PEMBINA</center></div>
				<div class="col-md-12">
					<form method="POST" action="{{url('profil_pembina/store')}}">
						@if(\Session::has('alert'))
						<div class="alert">
							{{Session::get('alert')}}
						</div>
						@endif
						{{ @csrf_field() }}

						<div class="form-group">
							<input type="text" name="id_profilPembina"  readonly="" hidden="true">
						</div>
						<div class="form-group">
							<div class="col-25">
								<label for="logo">Logo Profil</label>
							</div>
							<input id="uploadFile" type="file" name="gambar">
						</div>
						<div class="form-group">
							<div class="col-25">
								<label for="profil">Isi Profil</label>
							</div>
							<textarea class="ckeditor" id="ckedtor" name="profil_pembina" ></textarea>
						</div>
						<button type="submit" class="btn btn-primary">TAMBAH </button>			
					</form>

				</div>
			</div>
		</div>
	</div>
	@include('tampilan.foot')


