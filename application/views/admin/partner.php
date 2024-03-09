<!DOCTYPE html>
<html lang="en">

<head>

	<title>Partners</title>
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
						<h1 class="h3 mb-0 text-gray-800">Partners</h1>
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
									<a href="">Data Partners</a>
								</h6>
							</div>
							<div class="card-body" id="table_partner" v-cloak>

								<div class="table-responsive">
									<button data-toggle="modal" data-target="#addPartnerModal" class="btn btn-primary">+
										Add Partner</button>

									<hr>
									<table class="table table-bordered" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>Title</th>
												<th>Link</th>
												<th>Image</th>
												<th>@</th>
											</tr>
										</thead>

										<tbody>
											<tr v-for="data in data_partner">
												<td>{{ data . title }}</td>
												<td v-html="viewImage(data.image)"></td>
												<td>{{ data . link }}</td>
												<td>
													<button data-toggle="modal" data-target="#editPartnerModal" @click="showEditModal(data)" class="btn btn-warning btn-sm">Edit</button>
													<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#uploadFotoModal" @click="getIdPartner(data.id_partner)">Foto</button>
													
													<button @click="deleteData(data.id_partner)" class="btn btn-danger btn-sm">x</button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
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


	
	<div class="modal fade" id="uploadFotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Upload Partner</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<center v-if="loading">
						<div class="spinner-border text-primary" role="status">
							<span class="visually-hidden"></span>
						</div>
					</center>
					<hr>
					<center>
						<input type="file" @change="selectFoto" accept="image/*" id="file_img" name="file_img"> <br><br>
						<img :src="img_partner" alt="" width="100px" height="100px" id="img_partner" name="img_partner">
					</center> <br>


				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="#" @click="uploadFoto">Upload</a>
				</div>
			</div>
		</div>
	</div>
	


	<!-- Edit Spesialis Modal-->
	<div class="modal fade" id="editPartnerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Partner</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div v-if="alert" class="alert alert-danger" role="alert">
						{{ error_message }}
					</div>

					<div class="input-group">
						<input type="text" @keypress="enterUpdate" v-model="title" ref="title" 
						class="form-control bg-light border-0 small" placeholder="Title" aria-label="Search" aria-describedby="basic-addon2">
					</div>
					<br>
					<div class="input-group">
						<input type="text" @keypress="enterUpdate" v-model="link" ref="link" 
						class="form-control bg-light border-0 small" placeholder="Link" 
						aria-label="Search" aria-describedby="basic-addon2">
					</div>


				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="#" @click="updateData">Update</a>
				</div>
			</div>
		</div>
	</div>
	<!-- End Edit Spesialis Modal-->




	<!-- Add Spesialis Modal-->
	<div class="modal fade" id="addPartnerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Partner</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">

					<div v-if="alert" class="alert alert-danger" role="alert">
						{{ error_message }}
					</div>

					<div class="input-group">
						<input type="text" @keypress="enterSave" v-model="title" ref="title" 
						class="form-control bg-light border-0 small" placeholder="Title" aria-label="Search" aria-describedby="basic-addon2">
					</div>
					<br>
					<div class="input-group">
						<input type="text" @keypress="enterSave" v-model="link" ref="link" 
						class="form-control bg-light border-0 small" placeholder="Link" 
						aria-label="Search" aria-describedby="basic-addon2">
					</div>


				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="#" @click="save">Save</a>
				</div>
			</div>
		</div>
	</div>
	<!-- End Add Spesialis Modal-->

	<?php include('component/logout.php') ?>
	<script>
		// get token from 
		const _TOKEN_ = '';
		const _URL_SERVER_ = '<?= base_url() ?>';
		const _PARTNER_LOAD_DATA_ = _URL_SERVER_ + 'admin/api_load_data_partner';
		const _PARTNER_ADD_DATA_ = _URL_SERVER_ + 'admin/api_add_partner';
		const _PARTNER_UPDATE_DATA_ = _URL_SERVER_ + 'admin/api_update_partner';
		const _PARTNER_DELETE_DATA_ = _URL_SERVER_ + 'admin/api_delete_partner';
		const NO_IMAGE = _URL_SERVER_ + 'public/assets/img/no-img.png';

		var _READY_UPLOAD_FOTO_ = false;
		const $typefile_allowed = ['image/png', 'image/jpeg'];

	
	</script>


	<script src="<?= base_url('') ?>public/assets/js/jquery/jquery.js"></script>
	<script src="<?= base_url('') ?>public/assets/bootstrap/js/bootstrap.bundle.js"></script>


	<script src="<?= base_url('') ?>public/assets/js/sb-admin-2.min.js"></script>

	<script>

var $uploadFoto = new Vue({
			el: '#uploadFotoModal',
			data: {
				img_partner : NO_IMAGE,
				alert: null,
				loading: false,
				id_partner: null
			},
			methods: {

				selectFoto: function(event) {
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
							this.img_partner = NO_IMAGE;
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
							this.img_partner = image;
						} else {
							_READY_UPLOAD_FOTO_ = false;
							Swal.fire({
								title: 'Uppz!',
								text: 'File extension is not allowed',
								icon: 'error',
								confirmButtonText: 'Ok'
							});
							this.img_partner = NO_IMAGE;
						}
					} else {
						_READY_UPLOAD_FOTO_ = false;
						Swal.fire({
							title: 'Uppz!',
							text: 'Foto belum dipilih :)',
							icon: 'error',
							confirmButtonText: 'Ok'
						});

						this.img_partner = NO_IMAGE;
					}

				},
				uploadFoto: function() {
					if (_READY_UPLOAD_FOTO_ == false) {
						console.log("Not ready")
						return;
					}

					console.log(this.id_partner)
					if (this.id_partner == null) {
						console.log("Not ready")
						return;
					}
					this.loading = true;
					new Upload({
						// Array
						el: ['file_img'],
						// String
						url: _URL_SERVER_ + '/admin/api_upload_foto_partner',
						// String
						data: this.id_partner,
						// String
						token: _TOKEN_
					}).start(($response) => {
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
								$partner.loadData();
								_READY_UPLOAD_FOTO_ = false;
								this.img_partner = NO_IMAGE;
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
				}
			},
		})


		var $partner = new Vue({
			el: '#table_partner',
			data: {
				data_partner: null,
				search: null,
				id_partner: null,
				alert: null
			},
			methods: {
				viewImage:function(value){
					var final = '';
					if (value==='' || value==null){
						final =NO_IMAGE;
					}else{
						final= _URL_SERVER_ +'public/img/partners/'+value;
					}
					return `<img src="${final}" width="80" height="80" class="img-thumbnail"></img>`;
				
				},	
				showEditModal: function(data) {
					$editPartner.title = data.title;
					$editPartner.link = data.link;
					$editPartner.id_partner = data.id_partner;
				},
				getIdPartner: function(id_partner) {
					$uploadFoto.id_partner = id_partner;
				},
				deleteData: function(id_partner) {
					if (id_partner) {
						Swal.fire({
							title: 'Yakin mau hapus data ini ?',
							text: "",
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Yes'
						}).then((result) => {
							if (result.isConfirmed) {
								Vony({
									url: _PARTNER_DELETE_DATA_,
									method: 'POST',
									data: {
										_token: _TOKEN_,
										id_partner: id_partner
									}
								}).ajax($response => {
									const $obj = JSON.parse($response);
									if ($obj.result == true) {
										showToast('Data has been deleted !', 'success')
										this.loadData();
									} else {
										this.data_partner = null;
										showToast('Data gagal dihapus !')
									}
								});
							}
						})
					}
				},
				loadData: function() {
					Vony({
						url: _PARTNER_LOAD_DATA_,
						method: 'post'
					}).ajax((response) => {
						var obj = JSON.parse(response);

						if (obj) {
							this.data_partner = obj.data;
						}
					})
				}
			},
			mounted() {
				this.loadData();
			},
		})

		new Vue({
			el: "#addPartnerModal",
			data: {
				title: null,
				link: null,
				alert: null
			},
			mounted() {

			},
			methods: {

				enterSave: function(e) {
					if (e.keyCode == 13) {
						this.save();
					}
				},
				save: function() {
					if (this.title == null || this.title === '') {
						this.$refs.title.focus();
						return;
					}

					if (this.link == null || this.link === '') {
						this.$refs.link.focus();
						return;
					}


					this.alert = false;
					Vony({
						url: _PARTNER_ADD_DATA_,
						method: 'POST',
						data: {
							_token: _TOKEN_,
							title: this.title,
							link: this.link,
						}
					}).ajax($response => {
						const $obj = JSON.parse($response);

						if ($obj) {
							const $result = $obj.result;

							if ($result) {
								this.title = null;
								this.link = null;
								$partner.loadData();
								showToast('Data has been added !', 'success')
							} else {
								var message = $obj.message;
								showToast(message, 'danger')
							}
						}
					});
				}
			},
		})


		var $editPartner = new Vue({
			el: "#editPartnerModal",
			data: {
				title: null,
				link: null,
				alert: null
			},
			mounted() {

			},
			methods: {
				enterUpdate: function(e) {
					if (e.keyCode == 13) {
						this.updateData()
					}
				},
				showEditModal: function(data) {
					console.log(data)
				},
				updateData: function() {
					if (this.title == null || this.title === '') {
						this.$refs.title.focus();
						return;
					}

					if (this.link == null || this.link === '') {
						this.$refs.link.focus();
						return;
					}

					Vony({
						url: _PARTNER_UPDATE_DATA_,
						method: 'POST',
						data: {
							_token: _TOKEN_,
							id_partner: this.id_partner,
							title: this.title,
							link: this.link
						}
					}).ajax($response => {
						const $obj = JSON.parse($response);

						if ($obj) {
							const $result = $obj.result;

							if ($result) {
								$partner.loadData();
								showToast('Data has been updated !', 'success')
							} else {
								var message = $obj.message;
								showToast(message, 'danger')
							}
						}
					});
				}
			},
		})
	</script>

</body>

</html>
