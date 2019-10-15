@include('tampilan.head')
<style>
	* {
		box-sizing: border-box;
	}

	input[type=text], select, textarea {
		width: 100%;
		padding: 17px;
		border: 1px solid #ccc;
		border-radius: 4px;
		resize: vertical;
	}

	label {
		padding: 12px 12px 12px 0;
		display: inline-block;
	}

	input[type=submit] {
		background-color: #4CAF50;
		color: white;
		padding: 12px 20px;
		margin-left: 100px;
		border: none;
		border-radius: 4px;
		cursor: pointer;
		float: left;
	}

	input[type=submit]:hover {
		background-color: #45a049;
	}

	.container {
		border-radius: 5px;
		background-color: #ffffff;
		padding: 5px;
	}

	.col-25 {
		padding-left: 100px;
		width: 25%;
		margin-top: 6px;
	}

	.col-75 {
		padding-left: 100px;
		width: 50%;
		margin-top: 6px;
	}
	#form1{
		width: 750px;
		height: 500px;

		margin-left: 300px;
	}
	/* Clear floats after the columns */
	.row:after {
		content: "";
		display: table;
		clear: both;
	}

	/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
	@media screen and (max-width: 600px) {
		.col-25, .col-75, input[type=submit] {
			width: 100%;
			margin-top: 0;
		}
	}
</style>
<div id="form1">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Panitia PPMB PUB</h1>
			</div>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">DATA PANITIA PPMB</div>
					<a href="struktur_ppmb/create"><button type="submit" class="btn btn-primary">Tambah Data </button></a>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
							<thead>
								<tr align="center">  
									<th data-field="No" data-sortable="true" name="No">No</th>
									<th data-field="name"  data-name="jabatan">Jabatan</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php $no=1; ?>

							<tbody>
								@foreach($orgppmb as $struktur)
								<tr>
									<td><?php echo $no++; ?></td>
									<td>{{$struktur->jabatan}}</td>

									<td align="center" class="col-sm-3">
										<a href="/struktur_ppmb/edit/{{$struktur->id_orgppmb}}">
											<button type="button" class="btn btn-success btn-square waves-effect waves-square waves-effect" >
												<i class="material-icons">Edit</i><span class="icon-name"></span>
											</button>
										</a>
										<a href="/struktur_ppmb/delete/{{$struktur->id_orgppmb}}">
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
</div>
@include('tampilan.foot')
