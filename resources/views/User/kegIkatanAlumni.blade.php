@include('User.header')
<div id="design" style="width: 90%;">
	<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
		<thead>
			<tr>
				<th>No</th>
				<th>Foto</th>						        
				<th>Keterangan</th>
				<th>Angkatan</th>
				<th>Alumni</th>

			</tr>
		</thead>
		<tbody>
			@php $no = 1; @endphp
			@foreach($dok as $data)
			<tr>
				<td>{{ $no++}}</td>
				<td> <img src="{{url('imgs')}}/{{($data->foto) }}" width="100" height="100"></td>	
				<td>{{$data->keterangan}}</td>
				<td>{{$data->angkatan}} - {{$data->nama_angkatan}}</td>
				<td>{{$data->nama}}</td>
				
			</tr>
			@endforeach
		</tbody>							    
	</table>
</div>
@include('User.footer')
