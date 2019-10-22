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
		#frm{
			width: 50%;
			height: 100%;
			padding-bottom: 5%;
		}
		#frm button{
			width: 30%;
			height: 50px;
			background-color: #333333;
			color: white;
			margin-top: 10px;
			border-style: groove;
			border-radius: 5px;
		}

	</style>

	<div id="form1">
		<h1>Daftar Infaq Alumni PUB</h1>
		<div class="container">
			<div id="frm">
				<h3>Periode&nbsp;:</h3>
				
				<input placeholder="Masukkan Bulan" type="month" id="bulan" name="bulan"><br><br>
				<button>Cari</button>
			</div>
			<a href="{{url('tambahInfaq')}}"><button class="btn btn-primary" style=" background-color: #339966; width: 100%;"><svg class="glyph stroked plus sign" style="height: 30px;"><use xlink:href="#stroked-plus-sign"/></svg></button></a>
			<table id="myTable">
				
				<thead>
					<tr>
						<th>NO</th>
						<th>ANGKATAN</th>
						<th>PERIODE</th>
						<th>JUMLAH INFAQ</th>
						<th>AKSi</th>
					</tr>
				</thead>
				<tbody>
					@php $no=1; @endphp
					@foreach($infaq as $inf)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$inf->angkatan}}</td>
						<td>{{$inf->periode}}</td>
						<td>{{$inf->total_infaq}}</td>
						
						<td><a href="{{url('editInfaq/'.$inf->id_infaq)}}"><button class="btn btn-primary">Edit</button></a>&nbsp;<a href="{{url('hapusInfaq/'.$inf->id_infaq)}}"><button class="btn btn-primary" style="background-color: red;">Hapus</button></a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	@include('tampilan.foot')
