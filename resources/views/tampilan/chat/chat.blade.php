@include('tampilan.head')

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Tabel Chat</div>
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
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Sekolah</th>
								<th>Daerah</th>
								<th>Pertanyaan</th>
								<th>Jawaban</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 1; @endphp
							@foreach($chat as $data)
							<tr>
								<td>{{ $no++}}</td>
								<td>{{ $data->nama}}</td>
								<td>{{ $data->sekolah}}</td>
								<td>{{ $data->daerah}}</td>
								<td>{{ $data->pertanyaan}}</td>
								<td>{{ $data->jawaban}}</td>
								<td>
									<a href="{{url('jawabPertanyaan/'.$data->id)}}" class="btn btn-info">Jawab</a>
									<a href="{{url('hapusPertanyaan/'.$data->id)}}" class="btn btn-info" onclick="return confirm('Hapus data ?');">Hapus</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	
	@include('tampilan.foot')