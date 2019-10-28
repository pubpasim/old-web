@include('User.header')
<div id="design">
	
	<form method="POST" action="{{url('user/mahasiswa')}}">
		{{csrf_field()}}
		<h2>Pilih Angkatan</h2>
		
		<div>
			<select name="select"  >
				<option value="" disabled>--Pilih Angkatan--</option>
				@foreach($angkatan as $data)
				<option value="{{$data->angkatan}}">
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
				<th>NIM</th>
				<th>NAMA</th>
				<th>ANGKATAN</th>
				<th>AKSI</th>
			</tr>
		</thead>
		<tbody>
			@php
			$no = 1; 
			@endphp
			@foreach($mahasiswa as $mhs)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$mhs->nim}}</td>
				<td>{{$mhs->nama}}</td>
				<td>{{$mhs->angkatan}}</td>
				<td><a href="{{url('detail/org/'.$mhs->id_mahasiswa)}}"><button id="btn">detail</button></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@php
for($x=0;$x<10;$x++){
echo "<br>";
}
@endphp

@include('user.footer')
<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );

</script>