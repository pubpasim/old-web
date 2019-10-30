@include('tampilan.head')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Tabel TPA</div>

				<div class="panel-body">
					<a href="{{url('tambahLulusTPA/'.$id)}}" class="btn btn-info">Add</a>
					<a href="{{url('dataTPA/'.$back)}}" class="btn btn-info">Back</a>
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Jenis Kelamin</th>															
								<th>Asal Sekolah</th>								
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 1; @endphp
							@foreach($tpa as $data)
							<tr>
								<td>{{ $no++}}</td>
								<td>{{ $data->nama}}</td>
								<td>{{ $data->jk}}</td>								
								<td>{{ $data->sekolah}}</td>
								<td>
									<a href="{{url('editLulusTPA/'.$data->id_lulus)}}" class="btn btn-info">Edit</a>
									<a href="{{url('hapusLulusTPA/'.$data->id_lulus)}}" class="btn btn-info">Hapus</a>
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