@include('tampilan.head')	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">PELATIHAN PUB</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Tabel Angkatan</div>
					 <br><p class="icon-plus-sign"></i> <a href="{{url('Alumni_admin/det_pelatihan/tambah')}}">Tambah Data</a></p>
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover" id="s">
							<thead>
						      	<tr>
						      		<td>No</td>
									<td>Angkatan</td>
									<td>Pelatihan</td>
									<td>File</td>

								</tr> 

								@foreach($detpelatihan as $data)
								<!-- <tr align="center">	 -->
								<td>{{$data->id_detpelatihan}}</td>
								<td>{{$data->id_angkatan}}</td>
								<td>{{$data->id_pelatihan}}</td>
								<td>{{$data->file}}</td>
								<td>
								<a href="{{url('Alumni_admin/det_pelatihan/edit'.$data->id_detpelatihan)}}">Edit</a>
								<a href="{{url('Alumni_admin/det_pelatihan/hapus'.$data->id_detpelatihan)}}">Hapus</a>
							  </td>
							  @endforeach
							</tr>
							 
						
					
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