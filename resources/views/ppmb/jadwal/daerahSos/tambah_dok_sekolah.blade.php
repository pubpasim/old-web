		@include('tampilan.head')
		<style>
		    #box label{
		display: block;
		padding: 10px 0;
    	}
    	#box label:hover{
    		background-color: #03d3ff;
    	}
		</style>
		

		
		<div class="row" style="padding: 20px;">
			<div class="co  l-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="panel-heading">FORM TAMBAH DOKUMENTASI</div>
						<form role="form" action="{{url('dok_sekolah/store/'.$id)}}" method="POST" enctype="multipart/form-data">
							@if(\Session::has('alert'))
								<div class="alert">
									{{Session::get('alert')}}
								</div>
							@endif
							{{ @csrf_field() }}
							<div class="form-group">
            					<label for="tahun">Foto</label>
            					<input type="file" id="foto" class="form-control" name="foto">
            				</div>
            				
            				<div class="form-group">
            					<label for="tahun">Keterangan</label>
            					<input type="text" id="foto" class="form-control" name="keterangan">
            				</div>
            				
							<button type="submit" class="btn btn-primary">TAMBAH DATA </button>			
						</form>
					</div>
				</div>
			</div>
		</div>

		@include('tampilan.foot')
