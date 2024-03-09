<!DOCTYPE html>
<html lang="en">

<head>

	<title>Header</title>
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
						<h1 class="h3 mb-0 text-gray-800">Profile</h1>
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
									<a href="">Header</a>
								</h6>
							</div>
							<div class="card-body" id="header" v-cloak>

							<center v-if="loading">
									<div class="spinner-border text-primary" role="status">
									<span class="visually-hidden"></span>
									</div>
								</center>

								<center>
									<input type="file" @change="selectFoto" accept="image/*" id="file_img" name="file_img"> <br><br>
									<img :src="img_foto" alt="" width="300px" height="100px" id="img_foto" name="img_foto">
								</center>
								<br>
								<center>
									<button class="btn btn-success btn-sm" @click="uploadFoto">Upload</button>
						
								</center>
							
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

		const _HEADER_LOAD_DATA_ = _URL_SERVER_ + 'admin/api_load_header';
	</script>


	<script src="<?= base_url('') ?>public/assets/js/jquery/jquery.js"></script>
	<script src="<?= base_url('') ?>public/assets/bootstrap/js/bootstrap.bundle.js"></script>


	<script src="<?= base_url('') ?>public/assets/js/sb-admin-2.min.js"></script>

	<script>
		const NO_IMAGE = _URL_SERVER_ + 'public/assets/img/no-img.png';
	
		var _READY_UPLOAD_FOTO_ = false;
		const $typefile_allowed = ['image/png', 'image/jpeg'];


		var $header = new Vue({
			el: '#header',
			data: {
				img_foto: NO_IMAGE,
				file_img : null,
				loading : false
			},
			methods: {
				uploadFoto: function(){
					if (_READY_UPLOAD_FOTO_ == false) {
						console.log("Not ready")
						return;
					}

				
					this.loading = true;
					new Upload({
						// Array
						el: ['file_img'],
						// String
						url: _URL_SERVER_ + '/admin/api_upload_foto_header',
						// String
						data: '',
						// String
						token: _TOKEN_
					}).start(($response) => {
						this.loading = false
						var obj = JSON.parse($response);

						if (obj) {
							var result = obj.result;

							if (result == true) {
								Swal.fire({
									icon: 'success',
									title: 'Success',
									text: 'File Berhasil Diupload !',
									footer: '<a href=""></a>'
								});
								_READY_UPLOAD_FOTO_ = false;
								this.img_foto = NO_IMAGE;
							} else {
								Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: 'File Gagal Diupload !',
									footer: '<a href="">Silahkan coba lagi</a>'
								})
							}
							this.loading = false;
						}
					});
				
				},
				selectFoto : function(){
					if (event.target.files && event.target.files[0]) {
						const obj_file = event.target.files[0];

						var image = URL.createObjectURL(obj_file);

						const fileName = obj_file.name;

						var sizeFile = obj_file.size / 1000;
						sizeFile = Math.floor(sizeFile);
						const typefile = obj_file.type;

						var $typefile_not_allowed = false;

						// check ukuran file jika lebih dari 2.5 mb maka akan ditolak
						if (sizeFile > 1500) {
							Swal.fire({
								title: 'Uppz!',
								text: 'Maximum size file is 1.5 Mb',
								icon: 'error',
								confirmButtonText: 'Ok'
							})
							_READY_UPLOAD_FOTO_ = false;
							this.img_foto = NO_IMAGE;
							return;
						}

						if (typefile === $typefile_allowed[0] ||
							typefile === $typefile_allowed[1]) {
							$typefile_not_allowed = true;
						}

						// check jenis file apakah file gambar atau bukan
						if ($typefile_not_allowed) {
							_READY_UPLOAD_FOTO_ = true;
							console.log("Ready To Upload");
							this.img_foto = image;
						} else {
							_READY_UPLOAD_FOTO_ = false;
							Swal.fire({
								title: 'Uppz!',
								text: 'File extension is not allowed',
								icon: 'error',
								confirmButtonText: 'Ok'
							});
							this.img_foto = NO_IMAGE;
						}
					} else {
						_READY_UPLOAD_FOTO_ = false;
						Swal.fire({
							title: 'Uppz!',
							text: 'Foto belum dipilih :)',
							icon: 'error',
							confirmButtonText: 'Ok'
						});

						this.img_foto = NO_IMAGE;
					}
				},
				enterUpdate: function(e) {
					if (e.keyCode == 13) {
						this.updateData()
					}
				},
				
				loadData: function() {
					Vony({
						url: _HEADER_LOAD_DATA_,
						method: 'post'
					}).ajax((response) => {
						var obj = JSON.parse(response);

						if (obj) {
							var result = obj.result;

							if (result) {
								this.nama = obj.data.nama;
								this.alamat = obj.data.alamat;
								this.hp = obj.data.hp;

								var foto = obj.data.foto;

								foto = _URL_SERVER_+'public/img/headers/'+foto;
								this.img_foto = foto
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
b
