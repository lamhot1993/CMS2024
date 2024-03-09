<!DOCTYPE html>
<html lang="en">

<head>

	<title>Spesialis</title>
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
						<h1 class="h3 mb-0 text-gray-800">Spesialis</h1>
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
									<a href="">Data Spesialis</a>
								</h6>
							</div>
							<div class="card-body" id="table_spesialis" v-cloak>

								<div class="table-responsive">
									<button data-toggle="modal" data-target="#addSpesialisModal" class="btn btn-primary">+
										Add Spesialis</button>

									<hr>
									<table class="table table-bordered" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>Spesialis</th>
												<th>@</th>
											</tr>
										</thead>

										<tbody>
											<tr v-for="data in data_spesialis">
												<td>{{ data . spesialis }}</td>
												<td>
													<button data-toggle="modal" data-target="#editSpesialisModal" @click="showEditModal(data)" class="btn btn-warning btn-sm">Edit</button>
													<button @click="deleteData(data.id_spesialis)" class="btn btn-danger btn-sm">x</button>
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



	<!-- Edit Spesialis Modal-->
	<div class="modal fade" id="editSpesialisModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Spesialis</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div v-if="alert" class="alert alert-danger" role="alert">
						{{ error_message }}
					</div>

					<div class="input-group">
						<input type="text" @keypress="enterUpdate" v-model="spesialis" ref="spesialis" class="form-control bg-light border-0 small" placeholder="Spesialis" aria-label="Search" aria-describedby="basic-addon2">
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
	<div class="modal fade" id="addSpesialisModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Spesialis</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">

					<div v-if="alert" class="alert alert-danger" role="alert">
						{{ error_message }}
					</div>

					<div class="input-group">
						<input type="text" @keypress="enterSave" v-model="spesialis" ref="spesialis" class="form-control bg-light border-0 small" placeholder="Spesialis" aria-label="Search" aria-describedby="basic-addon2">
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
		const _SPESIALIS_LOAD_DATA_ = _URL_SERVER_ + 'admin/api_load_spesialis';
		const _SPESIALIS_ADD_DATA_ = _URL_SERVER_ + 'admin/api_add_spesialis';
		const _SPESIALIS_UPDATE_DATA_ = _URL_SERVER_ + 'admin/api_update_spesialis';
		const _SPESIALIS_DELETE_DATA_ = _URL_SERVER_ + 'admin/api_delete_spesialis';
	</script>


	<script src="<?= base_url('') ?>public/assets/js/jquery/jquery.js"></script>
	<script src="<?= base_url('') ?>public/assets/bootstrap/js/bootstrap.bundle.js"></script>


	<script src="<?= base_url('') ?>public/assets/js/sb-admin-2.min.js"></script>

	<script>
		var $spesialis = new Vue({
			el: '#table_spesialis',
			data: {
				data_spesialis: null,
				search: null,
				id_spesialis: null,
				alert: null
			},
			methods: {
				showEditModal: function(data) {
					$editSpesialis.spesialis = data.spesialis;
					$editSpesialis.id_spesialis = data.id_spesialis;
				},
				getIdSpesialis: function(id_spesialis) {
					console.log(id_spesialis)
					$uploadFoto.id_spesialis = id_spesialis;
				},
				deleteData: function(id_spesialis) {
					if (id_spesialis) {
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
									url: _SPESIALIS_DELETE_DATA_,
									method: 'POST',
									data: {
										_token: _TOKEN_,
										id_spesialis: id_spesialis
									}
								}).ajax($response => {
									const $obj = JSON.parse($response);
									if ($obj.result == true) {
										showToast('Data has been deleted !', 'success')
										this.loadData();
									} else {
										this.data_spesialis = null;
										showToast('Data gagal dihapus !')
									}
								});
							}
						})
					}
				},
				loadData: function() {
					Vony({
						url: _SPESIALIS_LOAD_DATA_,
						method: 'post'
					}).ajax((response) => {
						var obj = JSON.parse(response);

						if (obj) {
							this.data_spesialis = obj.data;
						}
					})
				}
			},
			mounted() {
				this.loadData();
			},
		})

		new Vue({
			el: "#addSpesialisModal",
			data: {
				spesialis: null,
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
					if (this.spesialis == null || this.spesialis === '') {
						this.$refs.spesialis.focus();
						return;
					}


					this.alert = false;
					Vony({
						url: _SPESIALIS_ADD_DATA_,
						method: 'POST',
						data: {
							_token: _TOKEN_,
							spesialis: this.spesialis
						}
					}).ajax($response => {
						const $obj = JSON.parse($response);

						if ($obj) {
							const $result = $obj.result;

							if ($result) {
								this.spesialis = null;
								$spesialis.loadData();
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


		var $editSpesialis = new Vue({
			el: "#editSpesialisModal",
			data: {
				spesialis: null,
				alert: null,
				id_spesialis: null
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
					if (this.id_spesialis == null) {
						console.log("Not ready")
						return;
					}
					if (this.spesialis == null || this.spesialis === '') {
						this.$refs.spesialis.focus();
						return;
					}

					Vony({
						url: _SPESIALIS_UPDATE_DATA_,
						method: 'POST',
						data: {
							_token: _TOKEN_,
							id_spesialis: this.id_spesialis,
							spesialis: this.spesialis
						}
					}).ajax($response => {
						const $obj = JSON.parse($response);

						if ($obj) {
							const $result = $obj.result;

							if ($result) {
								this.spesialis = null;
								$spesialis.loadData();
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
