@include('tampilan.head')
<style>
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
	th{
		text-align: center;
	}

</style>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Struktur Organisasi PUB</h1>
	</div>
</div><!--/.row-->

<div class="row" style="padding: 20px;">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Data Jabatan PUB</div>
			<div class="panel-body">
				<br><p class="icon-plus-sign"></i> <a href="{{url('struktur_organisasi/tambah')}}"><button class="btn btn-primary">Tambah Data</button></a></p>
				<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
					<thead>
						<tr>
							<th>No</th>
							<th>Jabatan</th>
							<th>Aksi</th>
						</tr> 
					</thead>
					<tbody>
						@foreach($organisasi as $data)

						<tr>
							<td>{{$data->id_orgpub}}</td>
							<td>{{$data->jabatan_pub}}</td>
							<td align="center">
								<a href="{{url('struktur_organisasi/'.$data->id_orgpub)}}" onclick="return confirm('Hapus data ?');"><button class="btn btn-primary">Edit</button></a>&nbsp;&nbsp;&nbsp;
								<a href="{{url('struktur_organisasi/hapus/'.$data->id_orgpub)}}"><button class="btn btn-danger">Hapus</button></a>
							</td>
						</tr>

						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	@include('tampilan.foot')