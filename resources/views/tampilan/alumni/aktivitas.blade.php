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


