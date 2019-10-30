@include('Alumni_admin.head')


<div class="row">
	<div class="tab-content pt-3">
		<div class="tab-pane active">
			<form class="form" novalidate="" action="{{url('akunEdit/'.$akun->id_mahasiswa)}}" method="POST">   
				{{ csrf_field() }}
				@if(\Session::has('alert'))
				<div class="alert">
					{{Session::get('alert')}}
				</div>
				@endif                     
				<div class="row">
					<div class="col-12 col-sm-6 mb-3">
						<hr>
						<div class="mb-2"><b>Ubah Username</b></div>
						<hr>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<input type="hidden" name="id_usr" value="{{$akun->id_user}}">
									<label>Username Lama</label>
									<input class="form-control" type="text" name="uss" placeholder="Username lama">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label>Username Baru</label>
									<input class="form-control" type="text" name="usr" placeholder="Username Baru">
								</div>
							</div>
						</div>
						<hr>
						<div class="mb-2"><b>Ubah Password</b></div>
						<hr>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label>Password Lama</label>
									<input class="form-control" type="password" name="pss" placeholder="••••••">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label>Password Baru</label>
									<input class="form-control" type="password" name="psw1" placeholder="••••••">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label>Konfirmasi Password</label>
									<input class="form-control" type="password" name="psw2" placeholder="••••••"></div>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col d-flex justify-content-end">
							<button class="btn btn-primary" type="submit">Save Changes</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>

	@include('Alumni_admin.foot')