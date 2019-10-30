@include('User.header')
<div id="design" style="width: 90%;">
	<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
		<h2 align="center"><b>HASIL TPA & WAWANCARA AWAL</b></h4>
		<h4 align="center"><b>PEMBERDAYAAN UMAT BERKELANJUTAN (PUB)</b></h4>
		<h4 align="center"><b>PERIODE {{$periode->tahun}}</b></h4>
		<h4 align="center"><b>Daerah {{$daerah}}</b></h4>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
<<<<<<< HEAD
				<th>Jenis Kelamin</th>
				<th>Asal Daerah</th>
				<th>Asal Sekolah</th>
=======
				<th>Asal Daerah</th>
				<th>Asal Sekolah</th>		
>>>>>>> 8751b9a5ff2a2e38156fbea2c3f7778741c7547c
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach($tpa as $data)
			<tr>
				<td>{{ $no++}}</td>
<<<<<<< HEAD
				<td>{{ $data->nama}}</td>
				<td>{{ $data->jk}}</td>
				<td>{{ $data->daerah}}</td>
				<td>{{ $data->sekolah}}</td>
=======
				<td>{{ $data->nama}}</td>				
				<td>{{ $data->daerah}}</td>
				<td>{{ $data->sekolah}}</td>		
>>>>>>> 8751b9a5ff2a2e38156fbea2c3f7778741c7547c
			</tr>
			@endforeach
		</tbody>						    
	</table>
</div>
@include('User.footer')
