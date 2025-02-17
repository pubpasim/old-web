@include('tampilan.head')


<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dasbor</h1>
	</div>
</div><!--/.row-->

<div class="row">
	<div class="col-xs-12 col-md-6 col-lg-4">
		<div class="panel panel-blue panel-widget ">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<svg class="glyph stroked bag"><use xlink:href="#stroked-male-user"></use></svg>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large">{{$admin}}</div>
					<div class="text-muted">Admin</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-4">
		<div class="panel panel-orange panel-widget">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<svg class="glyph stroked empty-message"><use xlink:href="#stroked-male-user"></use></svg>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large">{{$mhs}}</div>
					<div class="text-muted">PUB Aktif</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-4">
		<div class="panel panel-teal panel-widget">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large">{{$alumni}}</div>
					<div class="text-muted">Alumni</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
<br><br>
<center><img src="{{url('imgs')}}/{{('pub-logo.png') }}" style="width: 30%;"></center>

@include('tampilan.foot')