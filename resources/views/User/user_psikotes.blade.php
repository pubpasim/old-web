@include('User.header')
<div id="design" style="width: 90%;">
	<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Peserta</th>
				<th>Jenis Kelamin</th>
				<th>Jurusan Pilihan</th>
				<th>Asal Sekolah</th>
				<th>Asal Daerah</th>
				<th>No Hp</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach($psi as $data)
			<tr>
				<td>{{ $no++}}</td>
				<td>{{ $data->nama_peserta}}</td>
				<td>{{ $data->jk}}</td>
				<td>{{ $data->jurusan}}</td>
				<td>{{ $data->asal_sekolah}}</td>
				<td>{{ $data->asal_daerah}}</td>
				<td>{{ $data->no_hp}}</td>
				<td @if($data->jenis == "LULUS") class="btn btn-info" @endif @if($data->jenis == "TIDAK LULUS") class="btn btn-danger" @endif>{{ $data->jenis}}</td>
			</tr>
			@endforeach

		</tbody>						    				    
	</table>
</div>
@include('User.footer')