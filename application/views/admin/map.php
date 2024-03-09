<!DOCTYPE html>
<html lang="en">

<head>

	<title>Map</title>
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
						<h1 class="h3 mb-0 text-gray-800">Map</h1>
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
									<a href="">Map</a>
								</h6>
							</div>
							<div class="card-body" id="map" v-cloak>

							<a href="https://www.embedgooglemap.net/" target="_blank">Get Map</a>
							<hr>
							<strong>
								Masukkan nama lokasinya saja !, contoh seperti dibawah 
							</strong>

<pre>
https://maps.google.com/maps?q=<strong style="color:red">Siloam%20Hospitals%20Agora</strong>&t=&z=13&ie=UTF8&iwloc=&output=embed
</pre>

							<hr>
								
								<div class="input-group">
									<textarea name="" placeholder="Location" class="form-input"  
									v-model="location" @keypress="enterSave" ref="location"  id="" cols="55" rows="5"></textarea>
								</div>

								<br>
								<button class="btn btn-primary btn-md" @click="save">Save</button>
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

	</script>


	<script src="<?= base_url('') ?>public/assets/js/jquery/jquery.js"></script>
	<script src="<?= base_url('') ?>public/assets/bootstrap/js/bootstrap.bundle.js"></script>


	<script src="<?= base_url('') ?>public/assets/js/sb-admin-2.min.js"></script>

	<script>
		const _MAP_UPDATE_DATA_  = _URL_SERVER_ + 'admin/api_update_map';
		const _MAP_LOAD_DATA_ = _URL_SERVER_ + 'admin/api_load_map';
		

		var $map = new Vue({
			el: '#map',
			data: {
				location : null
			},
			methods: {
				enterSave: function(e) {
					if (e.keyCode == 13) {
						this.save()
					}
				},
				save: function() {
					if (this.location == null || this.location === '') {
						this.$refs.location.focus();
						return;
					}
					
					Vony({
						url: _MAP_UPDATE_DATA_,
						method: 'POST',
						data: {
							_token: _TOKEN_,
							location : encodeURI(this.location)
						}
					}).ajax($response => {
						const $obj = JSON.parse($response);

						if ($obj) {
							const $result = $obj.result;

							if ($result) {

								this.loadData();
								showToast('Data has been updated !', 'success')
							} else {
								var message = $obj.message;
								showToast(message, 'danger')
							}
						}
					});
				},
				loadData: function() {
					Vony({
						url: _MAP_LOAD_DATA_,
						method: 'post'
					}).ajax((response) => {
						var obj = JSON.parse(response);

						if (obj) {
							var result = obj.result;

							if (result) {
								this.location = obj.data.location;
							}
						}
					})
				}
			},
			mounted() {
				this.loadData();
			},
		})
	</script>

</body>

</html>
