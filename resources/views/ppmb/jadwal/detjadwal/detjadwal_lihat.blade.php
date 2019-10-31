@include('tampilan.head')
<div class="row" >
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading"><h2 align="center">Jadwal Kegiatan PPBM</h2></div>
			<div class="panel-body"><center>
				<a href="{{url('detjadwal_ppmb/create')}}"><button type="submit" class="btn btn-primary">Tambah Data </button></a>

				<a href="{{url('/daerah_sos_ppmb')}}"><button type="submit" class="btn btn-primary">Daerah Sosialisasi </button></a>

				<a href="{{url('/jad_tpa')}}"><button type="submit" class="btn btn-primary">TPA & Wawancara Awal  </button></a>

				<a href="{{url('/jad_survey')}}"><button type="submit" class="btn btn-primary">Survey </button></a>

				<a href="{{url('/jad_wawancara_akhir')}}"><button type="submit" class="btn btn-primary">Wawancara Akhir </button></a>
				</center>
				<div class="panel-body">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
						<thead>
							<tr align="center">  
								<th>No</th>
								<th>Kegiatan</th>
								<th>Daerah</th>
								<th>Tanggal Mulai</th>
								<th>Tanggal Selesai</th>
								<th>Waktu</th>
								<th>Tempat</th>
								<th>Alamat</th>
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
									<a href="/detjadwal_ppmb/delete/{{$data->id_detjadwal}}" onclick="return confirm('Hapus data ?');">
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
</div>


	@include('tampilan.foot')