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
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
	     	<div class="panel-heading">Form Ubah Struktur Organisasi IKA PUB</div>
        	<div class="container">
        		@foreach($tamp as $dataxxx)
        		<form method="POST" action="{{url('updateStrukAlumni/'.$dataxxx->id_ikatan)}}">
        		{{csrf_field()}}
        				
        			<div class="col-75">
        				<label for="jbPUB">Nama Alumni</label>
        				<select id="id_mahasiswa" name="id_mahasiswa">
        					<option value> --Nama Alumni--</option>
        					@foreach($mhs as $data)
        						<option @if($data->id_mahasiswa==$dataxxx->id_mahasiswa) selected @endif value="{{$data->id_mahasiswa}}">{{$data->angkatan}} - {{$data->nama_angkatan}} - {{$data->nama}}</option>
        					@endforeach
        				</select>
        			</div>		
        
        			<div class="col-75">
        				<label for="jbPUB">Jabatan</label>
        				<select id="jabatan" name="jabatan">
        					<option value> --Jabatan--</option>
        					@foreach($jab as $dataxx)
        						<option @if($dataxx->id_org==$dataxxx->id_jabatan) selected @endif value="{{$dataxx->id_org}}">{{$dataxx->jabatan}}</option>
        					@endforeach
        				</select>
        			</div>
        
        			<div class="col-75">
        					<label for="jbPUB">Masa Bakti</label>
        					<select id="masa_bakti" name="masa_bakti">
        						<option value> --Masa Bakti--</option>
        						@foreach($periode as $data2)
        						<option @if($data2->id==$dataxxx->masa_bakti) selected @endif value="{{$data2->id}}">{{$data2->periode}}</option>
        						@endforeach
        					</select>
        				</div>
        		<br>
        		<div class="row" align="center">
        			<input type="submit" value="Simpan">
        		</div>
        	</form>
        	@endforeach
        </div>
    </div>
</div>
</div>
 <script>
    $("#id_mahasiswa").select2();
    $("#jabatan").select2();
    $("#masa_bakti").select2();
 </script>
@include('tampilan.foot')

