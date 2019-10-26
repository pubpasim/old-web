<<<<<<< HEAD

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
	  <form action="">
	  <div class="row">
	    <div class="col-75">
	      <h2 align="center">Dokumentasi Alumni PUB</h2>
	    </div>
	  </div>
	  <div class="row">
	  	<div class="col-25">
	  <table class="table table-bordered">
	<h2 align="center">Dokumentasi Alumni</h2>
	<tr>
		<th>Foto</th>
		<th>Keterangan</th>
		<th ><a href="{{('tambahdok_alumni')}}" class="btn btn-primary">Tambah Dokumensi</a></th> 
	</tr>
	<tbody>
		@foreach($dokalumni as $data)
		<td><img src="alumni/images/gambar/{{($data->foto_alumni)}}"width='100'></td>
		<td>{{($data->keterangan)}}</td>		
			<a href="{{url('')}}" class="btn btn-warning">Ubah</a>
			<br/><br/>
			<a href="{{url()}}" class="btn-danger btn" onclick="return confirm('apakah anda yakin?')">Hapus</a>
		</td>
	</tr>
	<?php $nomor++; ?>
	@endforeach
</tbody>
</table>
	   </div>
	  </div>
	  </form>
	</div>
</div>
	
@include('tampilan.foot')
=======
@include('tampilan.head')
	
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
<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );

	$('.sel').each(function() {
		$(this).children('select').css('display', 'none');

		var $current = $(this);

		$(this).find('option').each(function(i) {
			if (i == 0) {
				$current.prepend($('<div>', {
					class: $current.attr('class').replace(/sel/g, 'sel__box')
				}));

				var placeholder = $(this).text();
				$current.prepend($('<span>', {
					class: $current.attr('class').replace(/sel/g, 'sel__placeholder'),
					text: placeholder,
					'data-placeholder': placeholder
				}));

				return;
			}

			$current.children('div').append($('<span>', {
				class: $current.attr('class').replace(/sel/g, 'sel__box__options'),
				text: $(this).text()
			}));
		});
	});

// Toggling the `.active` state on the `.sel`.
$('.sel').click(function() {
	$(this).toggleClass('active');
});

// Toggling the `.selected` state on the options.
$('.sel__box__options').click(function() {
	var txt = $(this).text();
	var index = $(this).index();

	$(this).siblings('.sel__box__options').removeClass('selected');
	$(this).addClass('selected');

	var $currentSel = $(this).closest('.sel');
	$currentSel.children('.sel__placeholder').text(txt);
	$currentSel.children('select').prop('selectedIndex', index + 1);
});

</script>


>>>>>>> 716e1ab00453b6d54683f46219eb35ef48f23d9e
