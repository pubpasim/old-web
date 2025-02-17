@include('user.header')
<div id="design" style="width: 90%;">
	<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
		<h3 style="color: darkcyan;" align="center"><b>HASIL TPA & WAWANCARA AWAL</b></h3>
		<h4 align="center"><b>PEMBERDAYAAN UMAT BERKELANJUTAN (PUB)</b></h4>
		<h4 align="center"><b>PERIODE {{$periode->tahun}}</b></h4>
		<h4 align="center"><b>Daerah {{$daerah}}</b></h4>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Asal Daerah</th>
				<th>Asal Sekolah</th>		
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach($tpa as $data)
			<tr>
				<td>{{ $no++}}</td>
				<td>{{ $data->nama}}</td>				
				<td>{{ $data->kab_kot}}</td>
				<td>{{ $data->sekolah}}</td>		
			</tr>
			@endforeach
		</tbody>						    
	</table>
</div>
@include('user.footer')
