@include('tampilan.head')

<div class="row" style="padding: 20px;">
	<div class="co  l-lg-12">
		<div class="panel panel-default">

			<div class="panel-body">
				<div class="panel-heading"><h2 align="center">Data Dokumentasi</h2></div><br>
				<a href="{{url('dok_jad_wawancara_akhir/create')}}"><button type="submit" class="btn btn-primary">Tambah Data </button></a>
				<a href="{{url('jad_wawancara_akhir')}}"><button type="submit" class="btn btn-primary">Kembali </button></a>

				<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
					<thead>
						<tr align="center">  
							<th>No</th>
							<th>Foto</th>
							<th>Keterangan</th>
							<th>Hari Ke</th>
							<th>Periode</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php $no=1; ?>
					<tbody>
						@foreach($dok_wawancara as $data)
						<tr>
							<td><?php echo $no++; ?></td>
							<td><img src="{{url('imgs/kegiatan_wawancara')}}/{{$data->foto}}" width="60px"></td>
							<td>{{$data->keterangan}}</td>
							<td>Ke-{{$data->hari}}</td>
							<td>{{$data->periode}}</td>
							<td>
								<a href="{{url('dok_jad_wawancara_akhir/edit/'.$data->id)}}">
									<button type="button" class="btn btn-success btn-square waves-effect waves-square waves-effect" >
										<i class="material-icons">Edit</i><span class="icon-name"></span>
									</button>
								</a>
								<a href="{{url('dok_jad_wawancara_akhir/delete/'.$data->id)}}" onclick="return confirm('Apakah anda yakin ?')">
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