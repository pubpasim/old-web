		@include('tampilan.head')
		<style type="text/css">
			#form1{
				width: 750px;
				height: 500px;
				margin-left: 300px;
			}
		</style>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		

		<div id="form1">
		<div class="row">
			<div class="panel-heading">FROM EDIT PERSYARATAN DAN KETENTUAN</div>
					<div class="panel-body" align="center">
						<div class="col-md-12">

							<form role="form" action="/syarat_ketentuan" method="POST">
								 {{ @csrf_field() }}
								</div>
								<div class="form-group">
									<textarea class="ckeditor" id="ckedtor" name="syarat"></textarea>
								</div>
								<button type="submit" class="btn btn-primary">POSTING </button>			
							</form>
						</div>
					</div>
				</div>
			</div>	
	@include('tampilan.foot')
