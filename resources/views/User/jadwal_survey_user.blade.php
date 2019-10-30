
@include('User.header')
@include('lib_tgl')
<style type="text/css">

	#header {
		border-radius: 7px;
		border: 1px solid black;
		color: black;
		text-align: center;
		font-weight: bold;
		background-color:#FFFF00;




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
	<h2 align="center"><b>JADWAL HOME VISIT / SURVEY</b></h4>
		<h4 align="center"><b>PEMBERDAYAAN UMAT BERKELANJUTAN (PUB)</b></h4>
		<h4 align="center"><b>PERIODE {{$tahun->periode}}</b></h4>

	</div>
	<div class="panel-body">
		<table  data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" >
			<thead>
				<tr id="header">  
					<th >No</th>
					<th >Nama Daerah</th>
					<th >Hari/Tanggal</th>
					<th >Lama Survey</th>
					<th >Jumlah Peserta</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=0; $total=0; ?>
				@foreach($jad_survey as $data)
				<?php $no++; $total+=$data->jumlah_peserta;?>
				<tr>
					<td>{{$no}}</td>
					<td >{{$data->kab_kot}}</td>
					<td><p><?php 

					if($data->tanggal_awal==$data->tanggal_akhir){
						echo  tglIndo($data->tanggal_awal,true);						
					}else{
						echo  tglIndo($data->tanggal_awal,true).'&nbsp'.'s/d'.'&nbsp'.tglIndo($data->tanggal_akhir,true); 	
					}
					?>
				</p> </td>

				<?php 
				$awal  = date_create($data->tanggal_awal);
				$akhir = date_create($data->tanggal_akhir);
				$diff  = date_diff( $awal, $akhir );
				?>
				<td><?php echo $diff->days+1; ?> Hari</td>
				<td>{{$data->jumlah_peserta}} Orang</td>
			</tr>
			@endforeach
			<tr >
				<td><b>Total Peserta</b></td>
				<td></td>
				<td></td>
				<td></td>
				<td><b><?php echo $total ?> Orang</b></td>

			</tr>
		</tbody>
	</table>
</div>
</div>	

@include('User.footer')


