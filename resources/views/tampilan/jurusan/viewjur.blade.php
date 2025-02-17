
@include('tampilan.head')		
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Tabel Jurusan</div>
				<br><p class="icon-plus-sign"></i> <a href="{{url('tampilan/jurusan/createjur')}}"><button type="submit" class="btn btn-primary">Tambah Data </button></a></p>
				<div class="panel-body">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc" >
						<thead>
							<tr>
								<th><center>No</center></th>
								<th><center>Nama Jurusan </center></th>
								<th><center>Aksi</center></th>
							</tr>
						</thead>	
                        <tbody>
							@foreach($jur as $data)
							<tr> 

								<td ><center>{{$data->id_jur}}</center></td>
								<td ><center>{{$data->nama_jur}}</center></td>
								<td>
								    <center>
								    <a href="{{URL('tampilan/jurusan/'.$data->id_jur)}}"   class=" icon-edit-sign">
										<button type="button" class="btn btn-success btn-square waves-effect waves-square waves-effect" 
											<i class="material-icons">Edit</i><span class="icon-name"></span>
										</button>
									</a>
								   <a href="{{URL('tampilan/jurusan/del/'.$data->id_jur)}}"  class="icon-trash" onclick="return confirm('Hapus data ?');">
										<button type="button" class="btn btn-danger btn-square waves-effect waves-square waves-effect">
											<i class="material-icons">Hapus</i><span class="icon-name"></span>
										</button>
									</a>
									</center>
								</td>

							</tr>

							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@include('tampilan.foot')
