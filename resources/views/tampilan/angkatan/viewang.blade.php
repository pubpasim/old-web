@include('tampilan.head')

<div class="row">
	<div class="col-lg-12">
		<h1 align="center" class="page-header">Daftar Angkatan PUB</h1>
	</div>
</div><!--/.row-->
@if(\Session::has('alert'))
<div class="alert">
	{{Session::get('alert')}}!!
</div>
@endif
<div class="row" style="padding: 20px;">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Tabel Angkatan</div>
			<div class="panel-body">
				<br><p class="icon-plus-sign"></i> <a href="{{url('tampilan/angkatan/createang')}}"><button class="btn btn-primary">Tambah Data</button></a></p>
				<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc" id="tabel_angkatan">
					<thead>
						<tr>
							<th  ><center>No</center></th>
							<th ><center>Angkatan</center></th>
							<th ><center>Nama Angkatan</center></th>
							<th align="text-center"><center>Aksi</center></th>
						</tr>
						<thead>
							@php
							$no=1;
							@endphp
							<tbody>
								@foreach($ang as $data)
								<tr> 

									<td ><center>{{$no++}}</center></td>
									<td><center>{{$data->angkatan}}</center></td>  
									<td ><center>{{$data->nama_angkatan}}</center></td>
									<td><center>
										<a href="{{URL('tampilan/angkatan/'.$data->id_angkatan)}}" class=" icon-edit-sign">
											<button class="btn btn-primary">Edit</button>
										</a>
										<a href="{{URL('tampilan/angkatan/hapus/'.$data->id_angkatan)}}" class="icon-trash" onclick="return confirm('Hapus data ?');">
											<button class="btn btn-danger">Hapus</button>
										</a></center>
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