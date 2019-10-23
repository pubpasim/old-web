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
<div class="col-sm-5 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Tabel Struktur Organisasi</div>

					<div class="panel-body">
						<a href="{{url('tambahStrukAlumni')}}" class="btn btn-info">Add</a>
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th>No</th>
						        <th>Nama Alumni</th>						        
						        <th>Angkatan</th>
						        <th>Jabatan</th>
						        <th>Masa Bakti</th>
						        <th>Aksi</th>
						    </tr>
						    </thead>
						    <tbody>
						    	@php $no = 1; @endphp
						    	@foreach($struk as $data)
						    	<tr>
						    		<td>{{ $no++}}</td>						    		
						    		<td>{{$data->nama}}</td>
						    		<td>{{$data->angkatan}} - {{$data->nama_angkatan}}</td>
						    		<td>{{$data->jabatan_pub}}</td>
						    		<td>{{$data->masa_bakti}}</td>
						    		<td>
						    			<a href="{{url('editStrukAlumni/'.$data->id_ikatan)}}" class="btn btn-info">Edit</a>
						    			<a href="{{url('hapusStrukAlumni/'.$data->id_ikatan)}}" class="btn btn-info">Hapus</a>
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