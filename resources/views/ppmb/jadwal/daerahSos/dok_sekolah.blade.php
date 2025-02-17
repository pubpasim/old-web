@include('tampilan.head')

<div class="row" style="padding: 20px;">
	<div class="co  l-lg-12">
		<div class="panel panel-default">

			<div class="panel-body">
				<div class="panel-heading"><h2 align="center">Data Dokumentasi</h2></div><br>
				<a href="{{url('dok_sekolah/create/'.$id)}}"><button type="submit" class="btn btn-primary">Tambah Data </button></a>
				<a href="{{url('daerah_sos_ppmb')}}"><button type="submit" class="btn btn-primary">Kembali </button></a>

				<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
					<thead>
						<tr align="center">  
							<th >No</th>
							<th>Foto</th>
							<th>Keterangan</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php $no=1; ?>
					<tbody>
						@foreach($dok_sekolah as $data)
						<tr>
							<td><?php echo $no++; ?></td>
							<td><img src="{{url('imgs/kegiatan')}}/{{$data->foto}}" width="100px"></td>
							<td>{{$data->keterangan}}</td>
							<td>
								<a href="{{url('dok_sekolah/edit/'.$data->id_doks)}}">
									<button type="button" class="btn btn-success btn-square waves-effect waves-square waves-effect" >
										<i class="material-icons">Edit</i><span class="icon-name"></span>
									</button>
								</a>
								<a href="{{url('dok_sekolah/delete/'.$data->id_doks)}}" onclick="return confirm('Apakah anda yakin ?')">
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