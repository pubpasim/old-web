@include('tampilan.head')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Panitia PPMB PUB</h1>
	</div>
</div><!--/.row-->


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">JADWAL KEGIATAN PPMB</div>
			<a href="{{url('detjadwal_ppmb/create')}}"><button type="submit" class="btn btn-primary">Tambah Data </button></a>

			<a href="{{url('/daerah_sos_ppmb')}}"><button type="submit" class="btn btn-primary">Daerah Sosialisasi </button></a>

			<a href="{{url('/jad_tpa')}}"><button type="submit" class="btn btn-primary">TPA & Wawancara Awal  </button></a>

			<a href="{{url('/jad_survey')}}"><button type="submit" class="btn btn-primary">Survey </button></a>

			<a href="{{url('/jad_wawancara_akhir')}}"><button type="submit" class="btn btn-primary">Wawancara Akhir </button></a>
			
			<a href="/detjadwal_ppmb/create"><button type="submit" class="btn btn-primary">Tambah Data </button></a>
			<div class="panel-body">
				<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
					<thead>
						<tr align="center">  
							<th data-field="No" data-sortable="true" name="No">No</th>
							<th data-field="id_jadwal" data-sortable="true" name="kegiatan">Kegiatan</th>
							<th data-field="id_daerah" data-sortable="true" name="daerah">Daerah</th>
							<th data-field="tanggal" data-sortable="true" name="tanggal">Tanggal Mulai</th>
							<th data-field="tanggal2" data-sortable="true" name="tanggal2">Tanggal Selesai</th>
							<th data-field="waktu" data-sortable="true" name="waktu">Waktu</th>
							<th data-field="tempat" data-sortable="true" name="tempat">Tempat</th>
							<th data-field="alamat"  data-
							sortable="true" name="alamat">Alamat</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php $no=1; ?>
					<tbody>
						@foreach($detjadwalppmb as $data)
						<tr>
							<td><?php echo $no++; ?></td>
							<td >{{$data->kegiatan}}</td>
							<td>{{$data->kab_kot}}</td>
							<td >{{$data->tanggal_awal}}</td>
							<td >{{$data->tanggal_akhir}}</td>
							<td>{{$data->waktu}}</td>
							<td>{{$data->sekolah}}</td>
							<td>{{$data->alamat}}</td>
							<td>
								<a href="{{url('detjadwal_ppmb/edit/'.$data->id_detjadwal)}}">
									<button type="button" class="btn btn-success btn-square waves-effect waves-square waves-effect" >
										<i class="material-icons">Edit</i><span class="icon-name"></span>
									</button>
								</a>
								<a href="{{url('detjadwal_ppmb/delete/'.$data->id_detjadwal)}}">
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