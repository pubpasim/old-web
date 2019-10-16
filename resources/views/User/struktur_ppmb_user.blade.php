@include('User.header')
<div id="design" >
	<h1 align="center">JADWAL PENERIMAAN MAHASISWA BARU PROGRAM BEASISWA PUB </h1>
	<h3 align="center">(Panitia Penerimaan Mahasiswa Baru PUB</h3>
	<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
						    <thead>
						    <tr align="center">  
						    	<th data-field="No" data-sortable="true" name="No">No</th>
						         <th data-field="id_mhs"  data-sortable="true" name="id_mahasiswa">Nama</th>
						         <th data-field="id_ang" data-sortable="true" name="id_angkatan">Angkatan</th>
						         <th data-field="ang" data-sortable="true" name="angkatan">Nama Angkatan</th>
						         <th data-field="id_jab" data-sortable="true" name="id_jabatan">Jabatan</th>
						      </tr>
						    </thead>
						    <?php $no=1; ?>  
						    <tbody>
						    	@foreach($detorgppmb as $struktur)
						    	 <tr>
										<td><?php echo $no++; ?></td>
		                                <td>{{$struktur->nama}}</td>
		                                <td>{{$struktur->angkatan}}</td>
		                                <td>{{$struktur->nama_angkatan}}</td>
		                                <td >{{$struktur->jabatan}}</td>
                         		</tr>
                         		  @endforeach
						    </tbody>
						   
						</table>
					</div>
</div>
</div><!--/.main-->

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
z

@include('User.footer')