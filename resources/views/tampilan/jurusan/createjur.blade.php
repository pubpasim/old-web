
@include('tampilan.head')	
			
<div class="row">
	<div class="panel-heading">FROM TAMBAH DATA JURUSAN</div>
	   <div class="panel-body">
				<div class="col-md-6">
            	<form method="POST" action="{{URL('jurusanModel')}}" Class="form-horizontal" id="block-validate">
            		{{csrf_field()}}
            		
            					<form role="form">
            
            						<div class="form-group">
            							<label>NAMA JURUSAN</label>
            							<input class="form-control" placeholder="Nama Jurusan" name="nama_jur">
            						</div>
            						<button type="submit" class="btn btn-primary">TAMBAH DATA </button>
            					</form>
            		      </div>
                </form>
	</div>
</div>
	
@include('tampilan.foot')
