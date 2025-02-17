
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
		#text-position{
		color: black;
		font-weight: bold;
		text-align: center;
		font-size:15px;
	}
</style>

	<div >
		<h2 align="center"><b>SEKOLAH YANG DI SOSIALISASI</b></h4>
			<h4 align="center"><b>PEMBERDAYAAN UMAT BERKELANJUTAN (PUB)</b></h4>
			<h4 align="center"><b></b></h4>

		</div>
		<div>
			
			<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc"  >
				@php $no=1; @endphp
				<thead>
					<tr id="header" bgcolor="#FFFF0">
						<th><p  id="text-position">NO</p></th>
						<th><p  id="text-position">SEKOLAH</p></th>
						<th><p  id="text-position">FOTO DOKUMENTASI</p></th>
					</tr>
				</thead>
				<tbody>
					@foreach($sekolah_sos as $data)
					<tr>
						<td><p align="center">{{$no++}}</p></td>
						<td>{{$data->sekolah}}</td>
						<td>
						    <center>
						    <a href="{{url('dok_sekolah/lihat/'.$data->id)}}">
								<button type="button" class="btn btn-success btn-square waves-effect waves-square waves-effect" >
									<i class="material-icons">Lihat</i><span class="icon-name"></span>
								</button>
							</a>
							</center>
						</td>
					</tr>
					@endforeach
			   </tbody>
			  
		</table>
	</div>
</div>
</div>	

@include('user.footer')


