
@include('tampilan.head')
		
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">DaftraAngkatan PUB</h1>
		</div>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Tabel Angkatan</div>
				<br><p class="icon-plus-sign"></i> <a href="{{url('tampilan/angkatan/createang')}}">Tambah Data</a></p>
				<div class="panel-body">
					<table class="table table-striped table-bordered table-hover" id="tabel_angkatan">
						<thead>
							<tr>
								<th data-field="state" data-checkbox="true" name=""><center>No</center></th>
								<th data-field="id" data-sortable="true"><center>Nama Angkatan</center></th>
								<th data-field="name"  data-sortable="true"><center>Angkatan</center></th>
								<th colspan="2" align="text-center"><center>Aksi</center></th>
							</tr>

							@foreach($ang as $data)
							<tr> 

								<td ><center>{{$data->id_angkatan}}</center></td>
								<td ><center>{{$data->nama_angkatan}}</center></td>
								<td><center>{{$data->angkatan}}</center></td>  
								<th><a href="{{URL('tampilan/angkatan/'.$data->id_angkatan)}}" class=" icon-edit-sign"><center>EDIT</center></a></th>
								<th><a href="{{URL('tampilan/angkatan/hapu/'.$data->id_angkatan)}}" class="icon-trash"><center>Hapus</center></a></th>

							</tr>

							@endforeach


						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@include('tampilan.foot')