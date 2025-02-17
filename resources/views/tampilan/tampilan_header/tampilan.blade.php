
@include('tampilan.head')
@if(\Session::has('alert'))
<div class="alert">
	{{Session::get('alert')}}!!
</div>
@endif
<div class="row" style="padding: 20px;">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Tampilan Header</div>
			<div class="panel-body">
				<br><p class="icon-plus-sign"></i> <a href="{{url('tampilan_header/tambah')}}"><button class="btn btn-primary">Tambah Data</button></a></p>
				<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc" id="tabel_angkatan">
					<thead>
					<tr>
						<th ><center>No</center></th>
						<th ><center>Caption 1</center></th>
						<th ><center>Caption 2</center></th>
						<th ><center>Poto</center></th>
						<th align="text-center"><center>Aksi</center></th>
					</tr>
					<thead>
						@php
						$no=1;
						@endphp
						<tbody>
							@foreach($tampilan as $data)
							<tr> 

								<td><center>{{$no++}}</center></td>
								<td><center>{{$data->caption1}}</center></td>  
								<td ><center>{{$data->caption2}}</center></td>
								<td> <img src="{{url('imgs/gambar')}}/{{($data->poto) }}" width="100" height="100"></td>	
								<td><center>
									<a href="{{URL('tampilan_header/edit/'.$data->id)}}" class=" icon-edit-sign">
										<button class="btn btn-primary">Edit</button>
									</a>
									<a href="{{URL('tampilan_header/hapus/'.$data->id)}}" class="icon-trash" onclick="return confirm('Hapus data ?');">
										<button class="btn btn-danger">Hapus</button>
									</a></center>
								</td>

							</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('tampilan.foot')