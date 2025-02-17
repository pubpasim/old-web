
@include('user.header')
@include('lib_tgl')
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
		<h2 align="center"><b>PESERTA WAWANCARA AKHIR</b></h4>
			<h4 align="center"><b>PEMBERDAYAAN UMAT BERKELANJUTAN (PUB)</b></h4>
			<h4 align="center"><b>PERIODE {{$tahun->periode}} </b></h4>

		</div>
		<div>
			
			<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc"  >
				@php $no=1; @endphp
				<thead>
					<tr id="header" bgcolor="#FFFF0">
						<th>NO</th>
						<th>NAMA PESERTA</th>	
						<th>ASAL DAERAH</th>
						<th>ASAL SEKOLAH</th>
						<th>HARI</th>
						<th>TANGGAL</th>
						<th>FOTO DOKUMENTASI</th>
					</tr>
				</thead>
				
				<tbody>
					@foreach($jad_wawancara_akhir as $data)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$data->peserta}}</td>
						<td>{{$data->kab_kot}}</td>
						<td>{{$data->sekolah}}</td>
						<td>Ke- {{$data->hari}}</td> 
						<td><p><?php echo  tglIndo($data->tanggal,true); ?></p> </td>
						<td>
						    <center>
						    <a href="{{url('dok_jad_wawancara_akhir/lihat/'.$data->id)}}">
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


