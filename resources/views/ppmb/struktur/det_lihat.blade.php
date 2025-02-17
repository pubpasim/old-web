@include('tampilan.head')
<style type="text/css">
	#form1{
		width: 750px;
		height: 500px;
		margin-left: 300px;
	}
</style>
<div class="row">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Panitia PPMB PUB</h1>
		</div>
	</div><!--/.row-->


	<div class="row" style="padding: 20px;">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">DATA PANITIA PPMB</div>
				
				<div class="panel-body">
					<a href="{{url('det_struktur_ppmb/create')}}" class="btn btn-primary">Tambah Data </a>
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
						<thead>
							<tr align="center">  
								<th data-field="No" data-sortable="true" name="No">No</th>
								<th data-field="id_mhs"  data-sortable="true" name="id_mahasiswa">Nama</th>
								<th data-field="id_ang" data-sortable="true" name="id_angkatan">Angkatan</th>
								<th data-field="id_jab" data-sortable="true" name="id_jabatan">Jabatan</th>
								<th data-field="id_per" data-sortable="true" name="id_periode">Periode</th>
								<th>Action</th>
							</tr>
						</thead>
						 
						<tbody>
						    @php $no=1; @endphp 
							@foreach($detorgppmb as $struktur)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{$struktur->nama}}</td>
								<td>{{$struktur->angkatan}}</td>
								<td >{{$struktur->jabatan}}</td>
                                <td >{{$struktur->periode}}</td>
								<td align="center" class="col-sm-3">
									<a href="{{url('det_struktur_ppmb/edit/'.$struktur->id_detil)}}">
										<button type="button" class="btn btn-success btn-square waves-effect waves-square waves-effect" >
											<i class="material-icons">Edit</i><span class="icon-name"></span>
										</button>
									</a>
									<a href="{{('det_struktur_ppmb/delete/'.$struktur->id_detil)}}" onclick="return confirm('Hapus data ?');">
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