@include('tampilan.head')

<div class="row" style="padding: 20px;">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">KATEGORI JADWAL TES PPMB</div>
			<div class="panel-body">
				<a href="{{URL('kategori_jadwal_ppmb/create')}}"><button type="submit" class="btn btn-primary">Tambah Data </button></a>
				<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
					<thead>
						<tr align="center">  
							<th data-field="No" data-sortable="true" name="No">No</th>
							<th data-field="id" data-sortable="true" name="id_kategori_tes">ID Kategori Jadwal</th>
							<th data-field="name"  data-
							sortable="true" name="kategori_tes">Kategori Jadwal Tes</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php $no=1; ?>

					<tbody>
						@foreach($kategjadwalppmb as $data)
						<tr>
							<td><?php echo $no++; ?></td>
							<td >{{$data->id_kategori_tes}}</td>
							<td>{{$data->kategori_tes}}</td>

							<td align="center" class="col-sm-3">
								<a href="{{url('kategori_jadwal_ppmb/edit/'.$data->id_kategori_tes)}}">
									<button type="button" class="btn btn-success btn-square waves-effect waves-square waves-effect" >
										<i class="material-icons">Edit</i><span class="icon-name"></span>
									</button>
								</a>
								<a href="{{url('kategori_jadwal_ppmb/delete/'.$data->id_kategori_tes)}}" onclick="return confirm('Hapus data ?');">
									<button type="button" class="btn btn-danger btn-square 
									waves-effect waves-square waves-effect">
									<i class="material-icons">Hapus</i><span class="icon-name"></span>
								</button>
							</a>
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
