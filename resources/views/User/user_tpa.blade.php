@include('User.header')
<div id="design" style="padding-bottom: 100px;">
	<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Sekolah</th>
				<th>Jumlah Peserta</th>
				<th>Peserta Lulus</th>
				<th>Peserta Gagal</th>
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach($tpa as $data)
			<tr>
				<td>{{ $no++}}</td>
				<td>{{ $data->sekolah}}</td>
				<td>{{ $data->jml_peserta}}</td>
				<td>{{ $data->jml_lulus}}</td>
				<td>{{ $data->jml_gagal}}</td>
			</tr>
			@endforeach
		</tbody>						    
	</table>
</div>
@include('User.footer')
