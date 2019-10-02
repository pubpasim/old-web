@include('tampilan.head')
				
		<div class="col-sm-5 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Tabel Psikotes</div>

					<div class="panel-body">
						<a href="{{url('tambahPsi/'.$id)}}" class="btn btn-info">Add</a>
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th>No</th>
						        <th>Nama Peserta</th>
						        <th>Jenis Kelamin</th>
						        <th>Jurusan Pilihan</th>
						        <th>Asal Sekolah</th>
						        <th>Asal Daerah</th>
						        <th>No Hp</th>
						        <th>Status</th>
						        <th>Aksi</th>
						    </tr>
						    </thead>
						    <tbody>
						    	@php $no = 1; @endphp
						    	@foreach($psi as $data)
						    	<tr>
						    		<td>{{ $no++}}</td>
						    		<td>{{ $data->nama_peserta}}</td>
						    		<td>{{ $data->jk}}</td>
						    		<td>{{ $data->jurusan}}</td>
						    		<td>{{ $data->asal_sekolah}}</td>
						    		<td>{{ $data->asal_daerah}}</td>
						    		<td>{{ $data->no_hp}}</td>
						    		<td @if($data->jenis == "LULUS") class="btn btn-info" @endif @if($data->jenis == "TIDAK LULUS") class="btn btn-danger" @endif>{{ $data->jenis}}</td>
						    		<td>
						    			<a href="{{url('editPsi/'.$data->id_psi)}}" class="btn btn-info">Edit</a>
						    			<a href="{{url('hapusPsi/'.$data->id_psi)}}" class="btn btn-info">Hapus</a>
						    		</td>
						    	</tr>
						    	@endforeach

						    </tbody>	
						    <tfoot>
						    <tr>
						        <th colspan="5">Peserta Hadir : {{$dir}}</th>
						        <th colspan="4">Peserta Lulus : {{$lus}}</th>						        
						    </tr>
						    </tfoot>					    
						</table>
					</div>
				</div>
			</div>
		</div>
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

</html>
