

<script src="/lumino/js/jquery-1.11.1.min.js"></script>
<script src="/lumino/js/bootstrap.min.js"></script>
<script src="/lumino/js/chart.min.js"></script>
<script src="/lumino/js/chart-data.js"></script>
<script src="/lumino/js/easypiechart.js"></script>
<script src="/lumino/js/easypiechart-data.js"></script>
<script src="/lumino/js/bootstrap-datepicker.js"></script>
<script src="/lumino/js/bootstrap-table.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
	} );
</script>
<script>

	$('#calendar').datepicker({
	});

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