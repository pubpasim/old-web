@include('tampilan.head')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Tabel Dokumen</div>

				<div class="panel-body">
					<a href="{{url('tambahFormulir/')}}" class="btn btn-info">Add</a>					
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						<thead>
							<tr>
								<th>No</th>
								<th>Dokumen</th>
								<th>Keterangan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 1; @endphp
							@foreach($formulir as $data)
							<tr>
								<td>{{ $no++}}</td>
								<td>{{ $data->dokumen}}</td>
								
								<td>{{ $data->keterangan}}</td>
								<td>									
									<a href="{{url('hapusFormulir/'.$data->id)}}" class="btn btn-info" onclick="return confirm('Hapus data ?');">Hapus</a>
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
