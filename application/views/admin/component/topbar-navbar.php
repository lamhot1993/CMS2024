<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

	<!-- Nav Item - Search Dropdown (Visible Only XS) -->
	<li class="nav-item dropdown no-arrow d-sm-none">
		<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-search fa-fw"></i>
		</a>
		<!-- Dropdown - Messages -->
		<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
			<form class="form-inline mr-auto w-100 navbar-search">
				<div class="input-group">
					<input type="text" class="form-control bg-light border-0 small" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
					<div class="input-group-append">
						<button class="btn btn-primary" type="button">
							<i class="fas fa-search fa-sm"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</li>

	<!-- Nav Item - Alerts -->
	<li class="nav-item dropdown no-arrow mx-1">
		<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-bell fa-fw"></i>
			<!-- Counter - Alerts -->
			<span class="badge badge-danger badge-counter">1</span>
		</a>
		<!-- Dropdown - Alerts -->
		<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
			<h6 class="dropdown-header">
				Notification
			</h6>
			<a class="dropdown-item d-flex align-items-center" href="#">
				<div class="mr-3">
					<div class="icon-circle bg-primary">
						<i class="fas fa-file-alt text-white"></i>
					</div>
				</div>
				<div>
					<div class="small text-gray-500">Lorem</div>
					<span class="font-weight-bold">Lorem Ipsum Dot Semir</span>
				</div>
			</a>

			<a class="dropdown-item text-center small text-gray-500" href="#">More</a>
		</div>
	</li>

	<!-- Nav Item - Messages -->
	<li class="nav-item dropdown no-arrow mx-1">
		<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-envelope fa-fw"></i>
			<!-- Counter - Messages -->
			<span class="badge badge-danger badge-counter">1</span>
		</a>
		<!-- Dropdown - Messages -->
		<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
			<h6 class="dropdown-header">
				Notification
			</h6>

			<a class="dropdown-item d-flex align-items-center" href="#">
				<div class="dropdown-list-image mr-3">
					<img class="rounded-circle" src="<?= base_url() ?>public/assets/img/undraw_profile.svg" alt="...">
					<div class="status-indicator bg-success"></div>
				</div>
				<div>
					<div class="text-truncate">Lorem</div>
					<div class="small text-gray-500">Lorem Ipsum Dot Semir</div>
				</div>
			</a>
			<a class="dropdown-item text-center small text-gray-500" href="#">More</a>
		</div>
	</li>

	<div class="topbar-divider d-none d-sm-block"></div>

	<!-- Nav Item - User Information -->
	<li class="nav-item dropdown no-arrow">
		<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="mr-2 d-none d-lg-inline text-gray-600 small">
				<strong id="txt_admin"></strong>
			</span>
			<img class="img-profile rounded-circle" src="<?= base_url() ?>public/assets/img/undraw_profile.svg">
		</a>
		<!-- Dropdown - User Information -->
		<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

			<a class="dropdown-item" href="<?= base_url() ?>admin/change_password">
				<i class="fas fa-heartbeat fa-sm fa-fw mr-2 text-gray-400"></i>
				Change Password
			</a>
			<hr>
			<a class="dropdown-item" href="<?= base_url() ?>admin/post">
				<i class="fas fa-heartbeat fa-sm fa-fw mr-2 text-gray-400"></i>
				Post
			</a>
			<a class="dropdown-item" href="<?= base_url() ?>admin/page">
				<i class="fas fa-user-md fa-sm fa-fw mr-2 text-gray-400"></i>
				Page
			</a>



			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
				<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
				Logout
			</a>
		</div>
	</li>

</ul>



<script>
	function logoutApp() {
		Vony({
			url: '<?= base_url() ?>admin/logout'
		}).ajax(() => {
			reload('.');
		});

	}
</script>
