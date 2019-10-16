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
		<form method="POST" action="{{url('storeDokAlumni')}}" enctype="multipart/form-data">
		{{csrf_field()}}
				
		<div class="row">
			<div class="col-25">
				<label for="jbPUB">Dokumentasi</label>
			</div>
			<div class="col-75">
				<label for="tahun">Foto</label>
				<input type="file" class="form-control" name="foto">
			</div>

			<div class="col-75">
				<label for="jbPUB">Kegiatan</label>
				<input type="text" class="form-control" name="keterangan">
			</div>
			<div class="col-75">
				<label for="jbPUB">Nama Alumni</label>
				<select id="id _alumni" name="id_alumni">
					<option value> --Nama Alumni--</option>
					@foreach($ang as $data)
						<option value="{{$data->id_mahasiswa}}">{{$data->angkatan}} - {{$data->nama_angkatan}} - {{$data->nama}}</option>
					@endforeach
				</select>
			</div>

			<!-- <div class="form-group">
                            <label class="control-label col-md-3">Product Code</label>
                                <div class="col-md-6">
                                    <select id="product_code_detail" class="form-control" name="product_id">
                                        <option disabled selected value> -- Select Production Code -- </option>
                                    </select>
                                </div>
                            </div> -->

			
		</div>
		<br>
		<div class="row" align="center">
			<input type="submit" value="Simpan">
		</div>\
	</form>
</div>
</div>
<body >
	<script src="/lumino/js/jquery-1.11.1.min.js"></script>
	<script src="/lumino/js/bootstrap.min.js"></script>
	<script src="/lumino/js/chart.min.js"></script>
	<script src="/lumino/js/chart-data.js"></script>
	<script src="/lumino/js/easypiechart.js"></script>
	<script src="/lumino/js/easypiechart-data.js"></script>
	<script src="/lumino/js/bootstrap-datepicker.js"></script>
	<script src="/lumino/js/bootstrap-table.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>
	