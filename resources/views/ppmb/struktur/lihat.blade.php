@include('tampilan.head')

	<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
		    <div class="row" style="padding: 20px;">
					<div class="panel-body">
					<div class="page-header"><center><h2>Data Jabatan Kepengurusan PPMB</h2></center></div>
						<a href="{{url('struktur_ppmb/create')}}"><button type="submit" class="btn btn-primary">Tambah Data </button></a>
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
							<thead>
								<tr align="center">  
									<th data-field="No" data-sortable="true" name="No">No</th>
									<th data-field="name"  data-
									sortable="true" name="jabatan">Jabatan</th>
									<th>Action</th>
								</tr>
							</thead>
							

							<tbody>
							    @php $no=1; @endphp
								@foreach($orgppmb as $struktur)
								<tr>
									<td>{{ $no++ }}</td>
									<td>{{$struktur->jabatan}}</td>

									<td><center>
										<a href="{{url('struktur_ppmb/edit/'.$struktur->id_orgppmb)}}">
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
									</center>
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
