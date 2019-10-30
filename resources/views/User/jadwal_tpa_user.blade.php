
@include('User.header')
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
        th {
            background-color: #FFFF0;
            color: black;
            font-weight: bold;
             text-align: center;
            padding: 10px
        }
        td{
        	color: black;
         /*   font-weight: bold;*/
           /* text-align: center;*/
        }
        tr.zebra1 {
            background-color:#FFFFFF;
        }
        tr.zebra2 {
            background-color:#eeedee;
        }
        tr.zebra1:hover, tr.zebra2:hover{
            background-color:lightseagreen;
        }
</style>
	<div >
		<h2 align="center"><b>JADWAL TPA & WAWANCARA AWAL</b></h4>
			<h4 align="center"><b>PEMBERDAYAAN UMAT BERKELANJUTAN (PUB)</b></h4>
			<h4 align="center"><b>PERIODE {{$tahun->periode}}</b></h4>

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
				
				<tbody>
					@foreach($jad_tpa as $data)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$data->kab_kot}}</td>
						<td><p  id="text-position"><?php echo  tglIndo($data->tanggal,true);?></p> </td>
						<td>{{$data->waktu}} s/d Selesai</td> 
						<td>{{$data->sekolah}}</td>
					</tr>
					@endforeach
			   </tbody>
			   
		</table>
	</div>
</div>
</div>	

@include('User.footer')


