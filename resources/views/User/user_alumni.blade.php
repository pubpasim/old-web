@include('User.header')
<div id="design" style="width: 90%;">
	<form method="POST" action="{{url('user_alumni/')}}">
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
		<button type="submit" id="btn">Cari</button>
	</form>
	<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
		<thead>
			<tr>
				<th>NIM</th>
				<th>NAMA</th>
				<th>ANGKATAN</th>
				<th>AKSI</th>
			</tr>
		</thead>
		<tbody>
			@foreach($mahasiswa as $mhs)
			<tr>
				<td>{{$mhs->nim}}</td>
				<td>{{$mhs->nama}}</td>
				<td>{{$mhs->angkatan}}</td>
				<td><a href="{{url('detail/org/'.$mhs->id_mahasiswa)}}"><button id="btn">detail</button></a></td>
			</tr>
			@endforeach
		</tbody>				    
	</table>
</div>
@include('User.footer')