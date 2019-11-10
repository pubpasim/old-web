@include('tampilan.head')
@include('lib_tgl')
<div class="row" style="padding: 20px;">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="panel-heading"><h2 align="center">JADWAL SURVEY PPMB</h2></div>
				<a href="{{url('jad_survey/create')}}"><button type="submit" class="btn btn-primary">Tambah Data </button></a>
				<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
					<thead>
						<tr align="center">  
							<th data-field="No" data-sortable="true" name="No">No</th>
							<th data-field="daerah" data-sortable="true" name="daerah">Nama Daerah</th>
							<th data-field="hari" data-sortable="true" name="tanggal">Hari/Tanggal</th>
							<th data-field="lama" data-sortable="true" name="tanggal">Lama Survey</th>
							<th data-field="jumlah peserta" data-sortable="true" name="jumlah_peserta">Jumlah Peserta</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						<?php $no=0; $total=0; ?>
						@foreach($jad_survey as $data)
						<?php $no++; $total+=$data->jumlah_peserta;?>
						<tr>
							<td>{{$no}}</td>
							<td >{{$data->kab_kot}}</td>
							<td><p><?php echo  tglIndo($data->tanggal_awal,true).'&nbsp'.'s/d'.'&nbsp'.tglIndo($data->tanggal_akhir,true); ?></p> </td>

							<?php 
							$awal  = date_create($data->tanggal_awal);
							$akhir = date_create($data->tanggal_akhir);
							$diff  = date_diff( $awal, $akhir );
							?>
							<td><?php echo $diff->days+1; ?> Hari</td>
							<td>{{$data->jumlah_peserta}} Orang</td>
							<td>
								<a href="{{url('jad_survey/edit/'.$data->id_jad_survey)}}">
									<button type="button" class="btn btn-success btn-square waves-effect waves-square waves-effect" >
										<i class="material-icons">Edit</i><span class="icon-name"></span>
									</button>
								</a>
								<a href="{{url('jad_survey/delete/'.$data->id_jad_survey)}}" onclick="return confirm('Hapus data ?');">
									<button type="button" class="btn btn-danger btn-square waves-effect waves-square waves-effect">
										<i class="material-icons">Hapus</i><span class="icon-name"></span>
									</button>
								</a>
							</td>
						</tr>
						@endforeach
						<tr >
							<td><b>Total Peserta</b></td>
							<td></td>
							<td></td>
							<td><b><?php echo $total ?> Orang</b></td>
							<td></td>

						</tr>
						@include('tampilan.foot')