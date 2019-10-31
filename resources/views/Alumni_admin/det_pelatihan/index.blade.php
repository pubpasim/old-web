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
								<th>No</th>
								<th>Pelatihan</th>
								<th>Aksi</th>

							</tr> 
						</thead>
						<tbody>
							@foreach($detpelatihan as $data)
							<!-- <tr align="center">	 -->
								<tr>
									<td>{{$data->id_detpelatihan}}</td>
									
									<td>{{$data->pelatihan}}</td>
									
									<td>
										<a href="{{url('Alumni_admin/det_pelatihan/edit'.$data->id_detpelatihan)}}"><button>Edit</button></a>&nbsp;&nbsp;
										<a href="{{url('Alumni_admin/det_pelatihan/hapus'.$data->id_detpelatihan)}}" onclick="return confirm('Hapus data ?');"> <button>Hapus</button></a>
										<a href="{{url('Alumni_admin/det_pelatihan/detail'.$data->id_detpelatihan)}}"> <button>Detail</button></a>
									</td>
								</tr>
								@endforeach


							</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->	

</div><!--/.main-->
@include('tampilan.foot')