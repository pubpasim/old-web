@include('User.header')
<div id="design" style="width: 90%;">
	<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Alumni</th>						        
				<th>Angkatan</th>
				<th>Jabatan</th>
				<th>Masa Bakti</th>
				
			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach($struk as $data)
			<tr>
				<td>{{ $no++}}</td>						    		
				<td>{{$data->nama}}</td>
				<td>{{$data->angkatan}} - {{$data->nama_angkatan}}</td>
				<td>{{$data->jabatan_pub}}</td>
				<td>{{$data->masa_bakti}}</td>

			</tr>
			@endforeach
		</tbody>						    
	</table>
</div>
@include('User.footer')
