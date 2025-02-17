@include('tampilan.head')
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Panitia PPMB PUB</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">KATEGORI JADWAL TES PPMB</div>
                        <a href="{{URL('kategori_jadwal_ppmb/create')}}"><button type="submit" class="btn btn-primary">Tambah Data </button></a>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" >
						    <thead>
						    <tr align="center">  
						    	<th>No</th>
						        <th>Kategori Jadwal Tes</th>
						        <th>Action</th>
						      </tr>
						    </thead>
						    <?php $no=1; ?>
						    
						    <tbody>
						    	@foreach($kategjadwalppmb as $data)
						    	 <tr>
										<td><?php echo $no++; ?></td>
		                                <td>{{$data->kategori_tes}}</td>
		              
		                                <td align="center" class="col-sm-3">
                                            <a href="{{url('kategori_jadwal_ppmb/edit/'.$data->id_kategori_tes)}}">
                                                <button type="button" class="btn btn-success btn-square waves-effect waves-square waves-effect" >
                                                     <i class="material-icons">Edit</i><span class="icon-name"></span>
                                                </button>
                                            </a>
                                            <a href="{{url('kategori_jadwal_ppmb/delete/'.$data->id_kategori_tes)}}" onclick="return confirm('Hapus data ?');">
                                                 <button type="button" class="btn btn-danger btn-square 
                                                       waves-effect waves-square waves-effect">
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
		<!--/.row-->	
		
	</div><!--/.main-->
@include('tampilan.foot')