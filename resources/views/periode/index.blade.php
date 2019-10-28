@include('tampilan.head')
<style type="text/css">
	#form1{
		width: 750px;
		height: 500px;
		margin-left: 300px;
	}
</style>

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Periode Kepengurusan</h1>
		</div>
	</div><!--/.row-->


	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Data Periode Kepengurusan</div>
				<a href="periode/create"><button type="submit" class="btn btn-primary">Tambah Data </button></a>
				<div class="panel-body">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
						<thead>
							<tr align="center">  
								<th data-field="No" data-sortable="true" name="No">No</th>
								<th data-field="name"  data-
								sortable="true" name="periode">Periode</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php $no=1; ?>

						<tbody>
							@foreach($periode as $data)
							<tr>
								<td><?php echo $no++; ?></td>
								<td>{{$data->periode}}</td>

								<td align="center" class="col-sm-3">
									<a href="/periode/edit/{{$data->id_periode}}">
										<button type="button" class="btn btn-success btn-square waves-effect waves-square waves-effect" >
											<i class="material-icons">Edit</i><span class="icon-name"></span>
										</button>
									</a>
									<a href="/periode/delete/{{$data->id_periode}}">
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
@include('tampilan.foot')