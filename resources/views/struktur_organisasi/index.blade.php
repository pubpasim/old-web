@include('tampilan.head')	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Struktur Organisasi PUB</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Tabel Angkatan</div>
					 <br><p class="icon-plus-sign"></i> <a href="{{url('struktur_organisasi/tambah')}}">Tambah Data</a></p>
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover" id="tabel_angkatan">
							<thead>
						      	<tr>
						      		<td>No</td>
									<td>Jabatan</td>

								</tr> 
								@foreach($organisasi as $data)

								<tr align="center">
								<td>{{$data->id_orgpub}}</td>
								<td>{{$data->jabatan_pub}}</td>
								
								<td>
								<a href="{{url('struktur_organisasi/edit'.$data->id_orgpub)}}">Edit</a>
								<a href="{{url('struktur_organisasi/hapus'.$data->id_orgpub)}}">Hapus</a>
							  </td>
							</tr>
							 
						@endforeach
					
                         	</tr>
						    </thead>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->	
		
	</div><!--/.main-->
@include('tampilan.foot')