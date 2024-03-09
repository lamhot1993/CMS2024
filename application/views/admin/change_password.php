<!DOCTYPE html>
<html lang="en">

<head>

	<title>Change Password</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/fontawesome-free/css/all.min.css">

	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/sb-admin-2.css">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/toast.css">

	<script src="<?= base_url('') ?>public/assets/js/vony.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/vue.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/sweet-alert.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/upload.js"></script>

	<script src="<?= base_url('') ?>public/assets/js/toast.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/toast-app.js"></script>

	<script src="<?= base_url('') ?>public/assets/js/popper.min.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/tippy-bundle.umd.js"></script>


	<style>
		.v-cloak {
			display: none;
		}
	</style>

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">
		<?php include('component/sidebar.php') ?>

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>
					<?php include('component/topbar-search.php') ?>
					<?php include('component/topbar-navbar.php') ?>


				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Change Password</h1>
						<a href="<?= base_url() ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
							<i class="fas fa-back fa-sm text-white-50"></i>
						Back To App
						</a>	
					</div>

					<!-- Content Row -->
					<div class="row">

						<?php include('component/top-card.php') ?>
					</div>

					<!-- Content Row -->

					<div class="container-fluid">

						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">
									<a href="">Change Password</a>
								</h6>
							</div>
							<div class="card-body" id="changePassword" v-cloak>

								
								<div class="input-group">
									<input type="password" v-model="password_lama" @keypress="enterUpdate" ref="password_lama" 
									class="form-control bg-light border-0 small" placeholder="Password Lama" aria-label="Search" aria-describedby="basic-addon2">
								</div> <br>

								<div class="input-group">
									<input type="password" v-model="password_baru" @keypress="enterUpdate" ref="password_baru" 
									class="form-control bg-light border-0 small" placeholder="Password Baru" aria-label="Search" aria-describedby="basic-addon2">
								</div> <br>
								
								<hr>
								<button class="btn btn-primary btn-md" @click="updateData">Update</button>
							</div>
						</div>


					</div>


				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->


			<?php include('component/footer.php') ?>

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>



	<?php include('component/logout.php') ?>
	<script>
		// get token from 
		const _TOKEN_ = '';
		const _URL_SERVER_ = '<?= base_url() ?>';

		const _HOSPITAL_LOAD_DATA_ = _URL_SERVER_ + 'admin/api_load_school';
		const _HOSPITAL_UPDATE_DATA_ = _URL_SERVER_ + 'admin/api_update_school';
	</script>


	<script src="<?= base_url('') ?>public/assets/js/jquery/jquery.js"></script>
	<script src="<?= base_url('') ?>public/assets/bootstrap/js/bootstrap.bundle.js"></script>


	<script src="<?= base_url('') ?>public/assets/js/sb-admin-2.min.js"></script>

	<script>
		const NO_IMAGE = _URL_SERVER_ + 'public/assets/img/no-img.png';
		const _SAVE_PASSWORD_ = _URL_SERVER_ +'admin/api_change_password';
		

		var $changePassword = new Vue({
			el: '#changePassword',
			data: {
				password_lama : null,
				password_baru : null
			},
			methods: {
				enterUpdate: function(e) {
					if (e.keyCode == 13) {
						this.updateData()
					}
				},
				updateData: function() {
					if (this.password_lama == null || this.password_lama === '') {
						this.$refs.password_lama.focus();
						return;
					}
					if (this.password_baru == null || this.password_baru === '') {
						this.$refs.password_baru.focus();
						return;
					}

					Vony({
						url: _SAVE_PASSWORD_,
						method: 'POST',
						data: {
							_token: _TOKEN_,
							password_lama : this.password_lama,
							password_baru : this.password_baru
						}
					}).ajax($response => {
						const $obj = JSON.parse($response);

						if ($obj) {
							const $result = $obj.result;

							if ($result) {
								Swal.fire({
									title: 'Success',
									text: 'Password Berhasil Diganti !',
									icon: 'success',
									confirmButtonText: 'OK'
								})
								//this.loadData();
								///showToast('Data has been updated !', 'success')
							} else {
								var message = $obj.message;
								//showToast(message, 'danger')
								Swal.fire({
									title: 'Upppz !',
									text: 'Maaf ! Password Salah !',
									icon: 'error',
									confirmButtonText: 'OK'
								})
							}
						}
					});
				}
			}
		})
	</script>

</body>

</html>
