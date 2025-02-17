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
	<div class="container">
		<form method="POST" action="{{url('tampilan_header/store')}}" enctype="multipart/form-data">
			{{csrf_field()}}
				<div class="col-75">
					<label for="jbPUB">Caption 1</label>
					<textarea class="form-control" name="caption1"></textarea>					
				</div>
				<div class="col-75">
					<label for="jbPUB">Caption 1</label>
					<textarea class="form-control" name="caption2"></textarea>					
				</div>
				<div class="col-75">
					<label for="tahun">Poto </label>
					<input type="file" class="form-control" name="poto">
				</div>

				
				<div class="row" style="padding-left: 110px;padding-top: 10px;">
					<button type="submit" class="btn btn-info">Submit</button>
				</div>
			</div>
		</form>

</div>
@include('tampilan.foot')
