@include('tampilan.head')

<div class="row" style="padding: 20px;">
	<div class="co  l-lg-12">
		<div class="panel panel-default">

			<div class="panel-body">
				<div class="panel-heading"><h2 align="center">DAERAH YANG DILAKUKAN SOSIALISASI</h2></div><br>
				<a href="{{url('daerah_sos_ppmb/create')}}"><button type="submit" class="btn btn-primary">Tambah Data </button></a>

				<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
					<thead>
						<tr align="center">  
							<th >No</th>
							<th>Periode</th>
							<th >Daerah</th>
							<th >Sekolah</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php $no=1; ?>
					<tbody>
						@foreach($daerah_sos as $data)
						<tr>
							<td><?php echo $no++; ?></td>
							<td >{{$data->periode}}</td>
							<td>{{$data->kab_kot}}</td>
							<td>{{$data->sekolah}}</td>

							<td>
								<a href="{{url('daerah_sos_ppmb/edit/'.$data->id_daerah_sos)}}">
									<button type="button" class="btn btn-success btn-square waves-effect waves-square waves-effect" >
										<i class="material-icons">Edit</i><span class="icon-name"></span>
									</button>
								</a>
								<a href="{{url('daerah_sos_ppmb/delete/'.$data->id_daerah_sos)}}" onclick="return confirm('Apakah anda yakin ?')">
									<button type="button" class="btn btn-danger btn-square waves-effect waves-square waves-effect">
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