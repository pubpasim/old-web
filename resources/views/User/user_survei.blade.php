@include('User.header')
<div id="design" style="width: 90%;">
	<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
		<h2 align="center"><b>HASIL WAWANCARA AKHIR</b></h4>
		<h4 align="center"><b>PEMBERDAYAAN UMAT BERKELANJUTAN (PUB)</b></h4>
		<h4 align="center"><b>PERIODE {{$periode->tahun}}</b></h4>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Peserta</th>								
				<th>Jurusan Pilihan</th>
				<th>Asal Daerah</th>
				<th>Asal Sekolah</th>								
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach($survei as $data)
			<tr>
				<td>{{ $no++}}</td>
				<td>{{ $data->nama}}</td>								
				<td>{{ $data->jurusan}}</td>
				<td>{{ $data->daerah}}</td>
				<td>{{ $data->sekolah}}</td>												
			</tr>
			@endforeach
		</tbody>						    				    
	</table>
</div>
@include('User.footer')