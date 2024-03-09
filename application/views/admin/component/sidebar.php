<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href=".">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-hospital-symbol"></i>
		</div>
		<div class="sidebar-brand-text mx-3">
			<?= $nama ?? null ?>
		</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item active">
		<a class="nav-link" href=".">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Menu
	</div>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseXX" aria-expanded="true" aria-controls="collapseXX">
			<i class="fas fa-heartbeat"></i>
			<span>
				<?= ($nama ?? null) ?>
			</span>
		</a>
		<div id="collapseXX" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">@</h6>
				<a class="collapse-item" href="<?= base_url() ?>admin/school">Profile</a>
			</div>
		</div>
	</li>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			<i class="fas fa-user-md"></i>
			<span>Teachers</span>
		</a>
		<div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">@</h6>
				<a class="collapse-item" href="<?= base_url() ?>admin/teachers">Teachers</a>
			</div>
		</div>
	</li>

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
			<i class="fas fa-info"></i>
			<span> News</span>
		</a>
		<div id="collapseFive" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">@</h6>

				<a class="collapse-item" href="<?= base_url() ?>admin/post">Post</a>
				<a class="collapse-item" href="<?= base_url() ?>admin/page">Page</a>

			</div>
		</div>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<?php include('left-menu.php'); ?>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

	<!-- Sidebar Message -->
	<div class="sidebar-card d-none d-lg-flex">
		<img class="sidebar-card-illustration mb-2" src="<?= base_url() ?>public/assets/img/undraw_rocket.svg" alt="">
		
	</div>

</ul>
