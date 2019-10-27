@include('User.header')
<div id="design" style="width: 90%;">
	<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
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
				<td>{{ $data->daerah}}</td>
				<td>{{ $data->sekolah}}</td>								
				<td><a href="{{url('user_lulus_tpa/'.$data->id_tpa)}}">{{ $data->jml_lulus}}</a></td>
				<td>{{ $data->jml_gagal}}</td>				
			</tr>
			@endforeach
		</tbody>						    
	</table>
</div>
@include('User.footer')
