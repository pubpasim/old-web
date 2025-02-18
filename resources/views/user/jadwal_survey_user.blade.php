
@include('user.header')
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
	   #text-position{
    		color: black;
    		font-weight: bold;
    		text-align: center;
    		font-size:15px;
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
				<tr id="header" >  
					<th><p id="text-position">No</p></th>
					<th><p id="text-position">Nama Daerah</p></th>
					<th><p id="text-position">Hari/Tanggal</p></th>
					<th><p id="text-position">Lama Survey</p></th>
					<th><p id="text-position">Jumlah Peserta</p></th>
					<th><p id="text-position">Foto Dokumentasi</p></th>
					
				</tr>
			</thead>
			<tbody>
				<?php $no=0; $total=0; ?>
				@foreach($jad_survey as $data)
				<?php $no++; $total+=$data->jumlah_peserta;?>
				<tr>
					<td><p align="center">{{$no}}</p></td>
					<td><p>{{$data->kab_kot}}</p></td>
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
				<td><p align="center"><?php echo $diff->days+1; ?> Hari</p></td>
				<td><p align="center">{{$data->jumlah_peserta}} Orang</p></td>
				<td>
				    <center>
				    <a href="{{url('dok_jad_survey/lihat/'.$data->id)}}">
						<button type="button" class="btn btn-success btn-square waves-effect waves-square waves-effect" >
							<i class="material-icons">Lihat</i><span class="icon-name"></span>
						</button>
					</a>
					</center>
				</td>
			</tr>
			@endforeach
			<tr >
				<td><p id="text-position">Total Peserta</p></td>
				<td></td>
				<td></td>
				<td></td>
				<td><p id="text-position"><?php echo $total ?> Orang</p></td>

			</tr>
		</tbody>
	</table>
</div>
</div>	

@include('user.footer')


