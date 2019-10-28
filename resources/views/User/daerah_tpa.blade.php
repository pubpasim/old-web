
@include('User.header')
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
</style>
	<div >
		<h2 align="center"><b>JADWAL TPA & WAWANCARA AWAL</b></h4>
			<h4 align="center"><b>PEMBERDAYAAN UMAT BERKELANJUTAN (PUB)</b></h4>
			<h4 align="center"><b>PERIODE </b></h4>

		</div>
		<div>
			
			<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc"  >
				@php $no=1; @endphp
				<thead>
					<tr id="header" bgcolor="#FFFF0">
						<th>NO</th>
						<th>DAERAH</th>
						<th>HARI/ TANGGAL</th>
						<th>WAKTU</th>
						<th>TEMPAT</th>
					</tr>
				</thead>
				@foreach($daerah_tpa as $data)
				<tbody>
					<tr>
						<td>{{$no++}}</td>
					</tr>
					<tr>{{$data->kab_kot}}</tr>
					<tr>{{$data->tanggal_awal}} s/d {{$data->tanggal_awal}}</tr>
					<tr>{{$data->waktu}}</tr> 
					<tr>{{$data->kab_kot}}</tr>
					<tr></tr>
			   </tbody>
			   @endforeach
		</table>
	</div>
</div>
</div>	

@include('User.footer')


