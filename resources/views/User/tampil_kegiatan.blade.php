@include('User.header');

	@include('User.header');
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="design">
<form method="POST" action="{{url('kegiatanPub/pilihdiv')}}">
		{{csrf_field()}}
		<h2>Pilih Angkatan</h2>
		
		<div>
			<select name="select"  >
				<option value="" disabled>--Pilih Angkatan--</option>
				@foreach($angkatan as $data)
				<option value="{{$data->id_angkatan}}">
					Angkatan {{ $data->angkatan }}
				</option>
				@endforeach
				
			</select>
		</div>
		<button type="submit" id="btn">OKE</button>
	</form>
	
	
</div>


	<div class="kanan" @if($lempar=="") style="display: none;" @endif id="kanan" style="padding-left: 100px;">
	<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
		<thead>
				<tr>
					<th>NO</th>
					<th>KEGIATAN</th>
					<th>KETERANGAN</th>
					<th>DOKUMENTASI</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				@php $no=1; @endphp
				@foreach($keg as $data)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$data->tema}}</td>
					<td>{{$data->keterangan}}</td>
					<td><img src="{{url('imgs/kegiatan')}}/{{$data->file}}" width="200px"></td>
				</tr>
				@endforeach
			</tbody>
	</table>
</div>
</div>
@php
for($x=0;$x<10;$x++){
echo "<br>";
}
@endphp


@include('User.footer');