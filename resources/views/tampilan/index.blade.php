@include('tampilan.head')
<div class="row">
	<div class="col-xs-12 col-md-6 col-lg-3">
		<div class="panel panel-blue panel-widget ">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large">{{$jum_mh}}</div>
					<div class="text-muted">Jumlah Mahasiswa PUB</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-3">
		<div class="panel panel-orange panel-widget">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large">{{$jum_alm}}</div>
					<div class="text-muted">Jumlah Alumni</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-3">
		<div class="panel panel-teal panel-widget">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large">{{$jum}}</div>
					<div class="text-muted">Jumlah Keseluruhan</div>
				</div>
			</div>
		</div>
	</div>
<div class="col-md-4">

	<div class="panel panel-red">
		<div class="panel-heading dark-overlay"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Calendar</div>
		<div class="panel-body">
			<div id="calendar"></div>
		</div>
	</div>


</div><!--/.row-->



@include('tampilan.foot')