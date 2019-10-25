@include('User.header')
<div id="design" style="width: 90%;">
	<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>TTL</th>
				<th>Asal Daerah</th>
				<th>Asal Sekolah</th>
				<th>Alamat</th>
				<th>No Hp</th>				
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach($tpa as $data)
			<tr>
				<td>{{ $no++}}</td>
				<td>{{ $data->nama}}</td>
				<td>{{ $data->jk}}</td>
				<td>{{ $data->tempat}}, {{ $data->tanggal}}</td>
				<td>{{ $data->daerah}}</td>
				<td>{{ $data->sekolah}}</td>
				<td>{{ $data->alamat}}</td>
				<td>{{ $data->no_hp}}</td>				
			</tr>
			@endforeach
		</tbody>						    
	</table>
</div>
@include('User.footer')
