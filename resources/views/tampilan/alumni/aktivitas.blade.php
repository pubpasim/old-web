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


<
/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

</style>
	
	<div class="kiri">
		<h1>Angkatan</h1>
		<hr>
		<form method="POST" action="{{url('alumni/aktivitas/tampil')}}">
			{{csrf_field()}}
			<div>
			<select name="select">
				<option value="" disabled>--Pilih Angkatan--</option>
				@foreach($angkatan as $data)
				<option value="{{$data->angkatan}}">
					Angkatan {{ $data->angkatan }}
				</option>
				@endforeach
			</select>
			</div>
			<button type="submit" id="btn">OKE</button>
		</form>
	</div>
	<div class="kanan" @if($lempar=="") style="display: none;" @endif id="kanan" style="padding-left: 100px;">
		<table id="myTable">
			<thead>
				<tr>
					<th>NO</th>
					<th>NAMA</th>
					<th>ANGKATAN</th>
					<th>FOTO</th>
					<th>KETERANGAN</th>
				</tr>
			</thead>
			<tbody>
				@php
				$no = 1; 
				@endphp
				@foreach($alumniDok as $dok)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$dok->nama}}</td>
					<td>{{$dok->angkatan}}</td>
					<td><img src="{{url('imgs')}}/{{$dok->file}}" width="50"></td>
					<td>{{$dok->keterangan}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

@include('tampilan.foot')

