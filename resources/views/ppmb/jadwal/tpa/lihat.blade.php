@include('tampilan.head')
@include('lib_tgl')
<div class="row" >
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading"><h2 align="center">JADWAL PELAKSANAAN TES POTENSIAL KADEMIK & LOGIKA PPMB</h2></div>
			<div class="panel-body"><center>
			</center>
		</div>
		<a href="{{url('jad_tpa/create')}}"><button type="submit" class="btn btn-primary">Tambah Data </button></a>
		<div class="panel-body">
			<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
				<thead>
					<tr align="center">  
						<th data-field="No" data-sortable="true" name="No">No</th>
						<th data-field="daerah" data-sortable="true" name="daerah">Nama Daerah</th>
						<th data-field="id_daerah" data-sortable="true" name="tanggal">Hari/Tanggal</th>
						<th data-field="waktu" data-sortable="true" name="waktu">Waktu</th>
						<th data-field="sekolah" data-sortable="true" name="sekolah">Tempat</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php $no=1; ?>
				<tbody>
					@foreach($jad_tpa as $data)
					<tr>
						<td><?php echo $no++; ?></td>
						<td >{{$data->kab_kot}}</td>
						<td><?php echo tglIndo($data->tanggal,true)?></td>
						<td>{{$data->waktu}}</td>
						<td>{{$data->sekolah}}</td>
						<td>
							<a href="{{url('jad_tpa/edit/'.$data->id_jad_tpa)}}">
								<button type="button" class="btn btn-success btn-square waves-effect waves-square waves-effect" >
									<i class="material-icons">Edit</i><span class="icon-name"></span>
								</button>
							</a>
							<a href="{{url('jad_tpa/delete/'.$data->id_jad_tpa)}}" onclick="return confirm('Hapus data ?');">
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
<!--/.row-->	
@include('tampilan.foot')