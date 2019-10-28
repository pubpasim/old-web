
@include('tampilan.head')		
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Icons</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Tabel Jurusan</div>
				<br><p class="icon-plus-sign"></i> <a href="{{url('tampilan/jurusan/createjur')}}">Tambah Data</a></p>
				<div class="panel-body">
					<table class="table table-striped table-bordered table-hover" id="tabel_angkatan">
						<thead>
							<tr>
								<th data-field="state" data-checkbox="true" name ""><center>No</center></th>
								<th data-field="id" data-sortable="true"><center>Nama Jurusan </center></th>
								<th colspan="2" align="text-center"><center>Aksi</center></th>
							</tr>

							@foreach($jur as $data)
							<tr> 

								<td ><center>{{$data->id_jur}}</center></td>
								<td ><center>{{$data->nama_jur}}</center></td>
								<th><a href="{{URL('tampilan/jurusan/'.$data->id_jur)}}" class=" icon-edit-sign"><center>EDIT</center></a></th>
								<th><a href="{{URL('tampilan/jurusan/del/'.$data->id_jur)}}" class="icon-trash"><center>Hapus</center></a></th>

							</tr>

							@endforeach


						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
@include('tampilan.foot')
