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
			padding-left: 17%;
			
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
		<h1>Daftar User</h1>
		<div class="container">
			<a href="{{url('tambahUser')}}"><button class="btn btn-primary" style=" background-color: #339966; width: 100%;"><svg class="glyph stroked plus sign" style="height: 30px;"><use xlink:href="#stroked-plus-sign"/></svg></button></a>
			<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
				
				<thead>
					<tr>
						<th>NO</th>
						<th>NAMA LENGKAP</th>
						<th>USERNAME</th>
						<th>PASSWORD</th>
						<th>LEVEL</th>
						<th colspan="2">AKSI</th>
					</tr>
				</thead>
				<tbody>
					@php $no=1; @endphp
					@foreach($user as $data)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$data->nama}}</td>
						<td>{{$data->username}}</td>
						<td>{{$data->password}}</td>
						<td>{{$data->level}}</td>
						<td><a href="{{url('editUser/'.$data->id_user)}}"><button type="reset" class="btn btn-default">Edit</button></a></td>
						<td><a href="{{url('hapusUser/'.$data->id_user)}}" onclick="return confirm('Hapus data ?');"><button class="btn btn-primary" style="background-color: red;">Hapus</button></a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
	</div>

@include('tampilan.foot')