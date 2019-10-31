@include('tampilan.head')
@include('lib_tgl')
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Panitia PPMB PUB</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="co  l-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">JADWAL PESERTA WAWANCARA AKHIR</div>
                        <a href="{{url('jad_wawancara_akhir/create')}}"><button type="submit" class="btn btn-primary">Tambah Data </button></a>
                       
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
						    <thead>
						    <tr align="center">  
						    	<th data-field="No" data-sortable="true" name="No">No</th>
						        <th data-field="daerah" data-sortable="true" name="peserta">Nama Peserta</th>
						         <th data-field="id_daerah" data-sortable="true" name="daerah">Asal Daerah</th>
						         <th data-field="sekolah" data-sortable="true" name="sekolah">Asal Sekolah</th>
						         <th data-field="hari_tes" data-sortable="true" name="pelaksanaan_tes">Hari</th>
						         <th data-field="waktu_tes" data-sortable="true" name="pelaksanaan_tes">Waktu Pelaksanaan Tes</th>
						        <th>Action</th>
						      </tr>
						    </thead>
						    <?php $no=1; ?>
						    <tbody>
						    	@foreach($jad_wawancara_akhir as $data)
						    	 <tr>
										<td><?php echo $no++; ?></td>
										<td>{{$data->peserta}}</td>
		                                <td >{{$data->kab_kot}}</td>
		                                <td>{{$data->sekolah}}</td>
		                                <td>Ke- {{$data->hari}}</td>
		                                <td><p><?php echo  tglIndo($data->tanggal,true); ?></p> </td>
		                                
		                         
		                       
		                                <td>
		                                	 <a href= "{{url('jad_wawancara_akhir/edit/'.$data->id_pesera_wawancara_akhir)}}">
					                             <button type="button" class="btn btn-success btn-square waves-effect waves-square waves-effect" >
					                             <i class="material-icons">Edit</i><span class="icon-name"></span>
					                             </button>
					                         </a>
					                         <a href="{{url('jad_wawancara_akhir/delete/'.$data->id_pesera_wawancara_akhir)}}" onclick="return confirm('Hapus data ?');">
					                             <button type="button" class="btn btn-danger btn-square waves-effect waves-square waves-effect">
					                             <i class="material-icons">Hapus</i><span class="icon-name"></span>
					                             </button>
					                        </a>
		                                </td>
                         		</tr>
                         		  @endforeach
						    </tbody>
						   
						</table>
					</div>
				</div>
			</div>
		</div>
@include('tampilan.foot')