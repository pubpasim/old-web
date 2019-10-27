@include('tampilan.head')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Daftar Pelatihan PUB</h1>
		</div>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default" >
				<div class="panel-heading">Tabel Pelatihan</div>
				<br><p class="icon-plus-sign"></i> <a href="{{url('pelatihan/tambah/')}}"><button type="reset" class="btn btn-default" style="margin-left: 30px;background-color:#339966;">Tambah Data</button></a></p>
				<div class="panel-body">
					<table class="table table-striped table-bordered table-hover" id="tabel_pel">
						<thead>
							<tr>
								<th>No</th>
								<th>Pelatihan</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						<tbody> 
							@foreach($pelatihan as $data)
							<tr align="center">
								<td>{{$data->id_pelatihan}}</td>
								<td>{{$data->pelatihan}}</td>
								<td>
									<a href="{{url('pelatihan/edit'.$data->id_pelatihan)}}">Edit</a>
								</td>
								<td>
									<a href="{{url('pelatihan/hapus'.$data->id_pelatihan)}}">Hapus</a>
								</td>
							</tr>	
							@endforeach
						</tbody>

					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@include('tampilan.foot')		
