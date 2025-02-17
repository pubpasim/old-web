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

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
		    <div class="row" style="padding: 20px;">
					<div class="panel-body">
						<div class="page-header"><h3>Form Tambah Jabatan PUB</h3></div>
						<div class="col-md-6">
            			<form method="POST" action="{{URL('struktur_organisasi/store')}}" Class="form-horizontal" id="block-validate">
            				{{csrf_field()}}
            							<form role="form">
            
            								<div class="form-group">
            									<label>JABATAN</label>
            									<input type="text" name="jabatan">
            								</div>
            								<button type="submit" name="submit" class="btn btn-primary">TAMBAH DATA </button>
            
            							</form>
            						</div>
            						<!--/.row-->	
            					</div><!--/.main-->
            				</div>
            			</form>
            		</div>
            	</div>
            </div>	
		</div>
	</div>
</div>

@include('tampilan.foot')