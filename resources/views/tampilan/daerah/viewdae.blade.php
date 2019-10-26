
@include('tampilan.head')
<<style>
	#dataTable {
		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		border-collapse: collapse;
		width: 75%;
		margin-right: 50px;
	}

	#dataTable td, #dataTable th {
		border: 1px solid #ddd;
		padding: 8px;
	}

	#dataTable tr:nth-child(even){background-color: #f2f2f2;}

	#dataTable tr:hover {background-color: #ddd;}

	#dataTable th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #4CAF50;
		color: white;
	}
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
		padding: 30px;
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
			width: 70%;
			height: 100%;
			margin-left: 17%;
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
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">DAERAH ASAL</h1>
			</div>
		</div>

		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Tabel Daerah</div>
					<br><p class="icon-plus-sign"></i> <a href="{{url('tampilan/daerah/createdae')}}">Tambah Data</a></p>
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover" id="tabel_angkatan">
							<thead>
								<tr>
									<th data-field="state" data-checkbox="true" name ""><center>No</center></th>
									<th data-field="id" data-sortable="true"><center>Nama Daerah </center></th>
									<th colspan="2" align="text-center"><center>Aksi</center></th>
								</tr>

								@foreach($dae as $data)
								<tr> 

									<td ><center>{{$data->id_daerah}}</center></td>
									<td ><center>{{$data->kab_kot}}</center></td>
									<th><a href="{{URL('tampilan/daerah/'.$data->id_daerah)}}" class=" icon-edit-sign"><center>EDIT</center></a></th>
									<th><a href="{{URL('tampilan/daerah/delet/'.$data->id_daerah)}}" class="icon-trash"><center>Hapus</center></a></th>

								</tr>

								@endforeach


							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


@include('tampilan.foot')