@include('tampilan.head')

<div class="col-sm-5 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Tabel Wawancara Akhir</div>
				@if(\Session::has("alert"))
                      <div class="alert alert-danger">
                          <div>{{Session::get("alert")}}</div>
                      </div>
                  @endif
                  
                  @if(\Session::has("alert-success"))
                      <div class="alert alert-success">
                          <div>{{Session::get("alert-success")}}</div>
                      </div>
                  @endif
				<div class="panel-body">
					<a href="{{url('tambahWawancaraAkhir/'.$id)}}" class="btn btn-info">Add</a>
					<a href="{{url('hasilSeleksi')}}" class="btn btn-info">Back</a>
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Peserta</th>
								<th>Jenis Kelamin</th>
								<th>TTL</th>
								<th>Jurusan Pilihan</th>
								<th>Asal Sekolah</th>
								<th>Asal Daerah</th>
								<th>No Hp</th>								
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 1; @endphp
							@foreach($survei as $data)
							<tr>
								<td>{{ $no++}}</td>
								<td>{{ $data->nama}}</td>
								<td>{{ $data->jk}}</td>
								<td>{{ $data->tempat}}, {{ $data->tanggal}}</td>
								<td>{{ $data->jurusan}}</td>
								<td>{{ $data->asal_sekolah}}</td>
								<td>{{ $data->asal_daerah}}</td>
								<td>{{ $data->no_hp}}</td>								
								<td>
									<a href="{{url('editWawancaraAkhir/'.$data->id_survei)}}" class="btn btn-info">Edit</a>
									<a href="{{url('hapusWawancaraAkhir/'.$data->id_survei)}}" class="btn btn-info">Hapus</a>
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
