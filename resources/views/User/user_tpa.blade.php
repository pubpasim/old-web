@include('user.header')



<div id="design" style="width: 90%;">
	<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
		<h3 style="color: darkcyan;"align="center"><b>HASIL TPA & WAWANCARA AWAL</b></h3>
		<h4 align="center"><b>PEMBERDAYAAN UMAT BERKELANJUTAN (PUB)</b></h4>
		<h4 align="center"><b>PERIODE {{$periode->tahun}}</b></h4>
		<thead>
			<tr>
				<th>No</th>
				<th>Daerah</th>
				<th>Sekolah Tempat Test</th>
				<th>Lulus</th>
				<th>Tidak Lulus</th>				
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach($tpa as $data)
			<tr>
				<td>{{ $no++}}</td>
				<td>{{ $data->kab_kot}}</td>
				<td>{{ $data->sekolah}}</td>								
				<td><a href="{{url('user_lulus_tpa/'.$data->id_tpa)}}">{{ $data->jml_lulus}}</a></td>
				<td>{{ $data->jml_gagal}}</td>				
			</tr>
			@endforeach
		</tbody>						    
	</table>
</div>
@include('user.footer')
