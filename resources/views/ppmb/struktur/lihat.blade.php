@include('tampilan.head')
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Panitia PPMB PUB</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">DATA PANITIA PPMB</div>
					
					<div class="panel-body">
						<a href="{{url('struktur_ppmb/create')}}"><button type="submit" class="btn btn-primary">Tambah Data </button></a>
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
							<thead>
								<tr align="center">  
									<th >No</th>
									<th >Jabatan</th>
									<th>Action</th>
								</tr>
							</thead>
							
							@php $no=1; @endphp
							<tbody>
								@foreach($orgppmb as $struktur)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$struktur->jabatan}}</td>

									<td align="center" class="col-sm-3">
										<a href="{{url('struktur_ppmb/edit/'.$struktur->id_orgppmb)}}" >
											<button type="button" class="btn btn-success btn-square waves-effect waves-square waves-effect" >
												<i class="material-icons">Edit</i><span class="icon-name"></span>
											</button>
										</a>
										<a href="{{url('struktur_ppmb/delete/'.$struktur->id_orgppmb)}}" onclick="return confirm('Hapus data ?');">
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
@include('tampilan.foot')
