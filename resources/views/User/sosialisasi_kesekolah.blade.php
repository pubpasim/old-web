
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
	#kecil{
		width:70%;
		height: 100%;
		margin-left: 15%;
	}
</style>

<div id="kecil" >
	<div >
		<h2 align="center"><b>DAFTAR SEKOLAH YANG DI SOSIALISASI</b></h2>
			<h4 align="center"><b>PEMBERDAYAAN UMAT BERKELANJUTAN (PUB)</b></h4>
			<h4 align="center"><b>PERIODE {{$tahun->periode}} </b></h4>

		</div>
		<div>
			
			<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc"  >
				@php $no=1; @endphp
				<thead>
					<tr id="header" bgcolor="#FFFF0">
						<th>NO</th>
						<th>SEKOLAH</th>
					</tr>
				</thead>
			
				<tbody>
					@foreach($sekolah_sos as $data)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$data->sekolah}}</a></td>
					</tr>
					@endforeach
			   </tbody>
			  
		</table>
	</div>
</div>

</div>	

@include('User.footer')


