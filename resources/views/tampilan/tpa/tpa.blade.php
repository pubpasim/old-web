@include('tampilan.head')
				
		<div class="col-sm-5 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Tabel TPA</div>

					<div class="panel-body">
						<a href="{{url('tambahTPA/'.$id)}}" class="btn btn-info">Add</a>
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th>No</th>
						        <th>Nama Sekolah</th>
						        <th>Jumlah Peserta</th>
						        <th>Peserta Lulus</th>
						        <th>Peserta Gagal</th>
						        <th>Aksi</th>
						    </tr>
						    </thead>
						    <tbody>
						    	@php $no = 1; @endphp
						    	@foreach($tpa as $data)
						    	<tr>
						    		<td>{{ $no++}}</td>
						    		<td>{{ $data->sekolah}}</td>
						    		<td>{{ $data->jml_peserta}}</td>
						    		<td>{{ $data->jml_lulus}}</td>
						    		<td>{{ $data->jml_gagal}}</td>
						    		<td>
						    			<a href="{{url('editTPA/'.$data->id_tpa)}}" class="btn btn-info">Edit</a>
						    			<a href="{{url('hapusTPA/'.$data->id_tpa)}}" class="btn btn-info">Hapus</a>
						    		</td>
						    	</tr>
						    	@endforeach
						    </tbody>						    
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
