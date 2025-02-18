@include('user.header')
<style type="text/css">

	#header {
		border-radius: 7px;
		border: 1px solid black;
		text-align:center;
		color: black;

	}
	#body{
		background-color: #808080;
		color:black;
		text-align:center;
		text-decoration-color:black;
	}
	#judul{
		background-color: #808080;
		border: 1px solid black;
		color:black ;
	}
	#kecil{
		width:70%;
		height: 100%;
		margin-left: 15%;
   }
	
	#text-position{
		color: black;
		font-weight: bold;
		text-align: center;
	}
</style>
<div id="kecil" >
	<div>
		<h2 align="center"><b>DAERAH SOSIALISASI</b></h2>
			<h4 align="center"><b>PEMBERDAYAAN UMAT BERKELANJUTAN (PUB)</b></h4>
			<h4 align="center"><b>PERIODE {{$tahun->periode}} </b></h4>

		</div>
		<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc"  >
			@php $no=1; @endphp
			<thead>
				<tr id="header" bgcolor="#FFFF0">
					<th><p  id="text-position">NO</p></th>
					<th><p  id="text-position">DAERAH</p></th>
				</tr>
			</thead>

			<tbody>
				@foreach($daerah_sos as $data)
				<tr>
					<td><p id="text-position">{{$no++}}</p></td>
					<td><a href="{{url('sosialisasi_kesekolah/'.$data->id_daerah,$periode)}}"><b>{{$data->kab_kot}}</b></a></td>
				</tr>
				@endforeach

			</tbody>

		</table>
	</div>	

	@include('user.footer')