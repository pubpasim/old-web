@include('User.header')
<div id="design" style="width: 90%;">
	<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
		<thead>
			<tr>
				<th>NO</th>
				<th>ANGKATAN</th>
				<th>PERIODE</th>
				<th>JUMLAH INFAQ</th>
			</tr>
		</thead>
		<tbody>
			@php $no=1; @endphp
			@foreach($infaq as $inf)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$inf->angkatan}}</td>
				<td>{{$inf->periode}}</td>
				<td>{{$inf->total_infaq}}</td>
			</tr>
			@endforeach
		</tbody>						    
	</table>
</div>
@include('User.footer')