
@include('tampilan.head')
@if(\Session::has('alert'))
<div class="alert">
	{{Session::get('alert')}}!!
</div>
@endif
<div class="row" style="padding: 20px;">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Pelatihan Fundamental</div>
			<div class="panel-body">
				
				<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc" id="tabel_angkatan">
					<thead>
					<tr>
						<th ><center>No</center></th>												
						<th ><center>Poto</center></th>
						<th ><center>Keterangan</center></th>
						<th align="text-center"><center>Aksi</center></th>
					</tr>
					<thead>
						@php $no=1; @endphp
						<tbody>
							@foreach($fundamental as $data)
							<tr> 

								<td><center>{{$no++}}</center></td>
								<td> <img src="{{url('imgs')}}/{{($data->poto) }}" width="100" height="100">
								<td><center>{{$data->keterangan}}</center></td>
								</td>									
								<td><center>
									<a href="{{URL('pel_fundamental/edit/'.$data->id)}}" class=" icon-edit-sign">
										<button class="btn btn-primary">Edit</button>
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