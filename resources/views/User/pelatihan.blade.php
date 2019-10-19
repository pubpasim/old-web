@include('user.header')
<style type="text/css">
	.table1 {
		font-family: sans-serif;
		color: #444;
		border-collapse: collapse;
		width: 50%;
		border: 1px solid #f2f5f7;
	}

	.table1 tr th{
		background: #35A9DB;
		color: #fff;
		font-weight: normal;
	}

	.table1, th, td {
		padding: 8px 20px;
		text-align: center;
	}

	.table1 tr:hover {
		background-color: #f5f5f5;
	}

	.table1 tr:nth-child(even) {
		background-color: #f2f2f2;
	}
</style>
<div id="design">
	<div class="kiri">

		<form method="POST" action="{{url('pelatihan_data')}}">
			{{csrf_field()}}
			<h2>Pilih Angkatan</h2>
			<hr>
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
	<div @if($lempar=="") style="display: none;" @endif>
		<table class="table1">
			<tr>
				<th>NO</th>
				<th>PELATIHAN</th>
				<th colspan="2">KETERANGAN</th>
			</tr>
			@php $no=1; @endphp
			@foreach($pelatihan1 as $pel)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$pel->pelatihan}}</td>
				<td><a href=""><button>UTS</button></a></td>
				<td><a href=""><button>UAS</button></a></td>
			</tr>
			@endforeach
		</table>
	</div>
	
</div>
@php
for($x=0;$x<3;$x++){
echo "<br>";
}
@endphp
@include('user.footer')