<!DOCTYPE html>
<html lang="en">

<head>

	<title>Page</title>
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
	<script src="<?= base_url('') ?>public/assets/js/ckeditor.js"></script>

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
						<h1 class="h3 mb-0 text-gray-800">Page</h1>
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
									<a href="">Page</a>
								</h6>
							</div>
							<div class="card-body" id="page" v-cloak>
								<button class="btn btn-primary btn-md" @click="newPage">New</button>
								<br> <br>
								<div class="table-responsive">

									<div class="input-group">
										<input type="text" v-model="search" @keypress="enterSearch" ref="search" class="form-control bg-light border-0 small" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
									</div>
									<hr>
									<table class="table table-bordered" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>Name</th>
												<th>Slug/Link</th>
												<!-- <th>Cover</th> -->
												<th>@</th>
											</tr>
										</thead>

										<tbody>
											<tr v-for="data in data_page">
												<td>{{ data . name }}</td>
												<td v-html="viewLink(data.slug)"></td>
												<!-- <td v-html="viewCover(data.cover)"></td> -->
												<td>
													<!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#uploadFotoModal" @click="getIdPage(data.id_page)">Upload</button> -->
													<button @click="editPage(data.id_page)" class="btn btn-warning btn-sm">Edit</button>
													<button @click="deleteData(data.id_page)" class="btn btn-danger btn-sm">x</button>
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

	<!-- upload foto Modal-->
	<div class="modal fade" id="uploadFotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Upload Cover</h5>
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
						<img :src="img_foto" alt="" width="100px" height="100px" id="img_foto" name="img_foto">
					</center> <br>


				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="#" @click="uploadFoto">Upload</a>
				</div>
			</div>
		</div>
	</div>
	<!-- End Upload Foto Docter Modal-->


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
		const NO_IMAGE = _URL_SERVER_ + 'public/assets/img/no-img.png';

		const _PAGE_LOAD_ALL_DATA_ = _URL_SERVER_ + 'admin/api_load_all_page';
		const _PAGE_DELETE_DATA_ = _URL_SERVER_ + 'admin/api_delete_page';
		const _PAGE_SEARCH_DATA_ = _URL_SERVER_ + 'admin/api_search_page';

		
		var $page = new Vue({
			el: '#page',
			data: {
				title: null,
				data_page: null,
				search: null
			},
			methods: {
				viewLink: function(v){
					var final= _URL_SERVER_+'page/p/'+v;
					return `<a href="${final}">${v}</a>`;
				},
				viewCover: function(data) {
					var path = 'public/img/page/';
					if (data === '' || data == null) {
						data = NO_IMAGE;
					} else {
						data = _URL_SERVER_ + path + data;
					}
					return `<img src="${data}" width="80" height="80" class="img-thumbnail"></img>`;
				},
				getIdPage: function($id) {

					$uploadFoto.id_post = $id;
				},
				editPage: function(id_page) {
					console.log(id_page)
					reload(_URL_SERVER_ + 'admin/editPage/' + id_page);
				},
				deleteData: function(id_page) {
					if (id_page) {
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
									url: _PAGE_DELETE_DATA_,
									method: 'POST',
									data: {
										_token: _TOKEN_,
										id_page: id_page
									}
								}).ajax($response => {
									const $obj = JSON.parse($response);
									if ($obj.result == true) {
										showToast('Data has been deleted !', 'success')
										this.loadData();
									} else {
										this.data_page = null;
										showToast('Data gagal dihapus !')
									}
								});
							}
						})
					}
				},
				enterSearch: function(e) {
					if (e.keyCode == 13) {
						this.searchData()
					}
				},
				searchData: function() {
					if (this.search == null || this.search === '') {
						this.$refs.search.focus();
						return;
					}
					Vony({
						url: _PAGE_SEARCH_DATA_,
						method: 'POST',
						data: {
							_token: _TOKEN_,
							search: this.search
						}
					}).ajax($response => {
						const $obj = JSON.parse($response);
						if ($obj.result == true) {
							this.data_page = $obj.data;
						} else {
							this.data_page = null;
							showToast('Failed load data !', 'danger')
						}
					});

				},
				newPage: function() {
					reload(_URL_SERVER_ + 'admin/addPage');
				},
				loadData: function() {
					Vony({
						url: _PAGE_LOAD_ALL_DATA_,
						method: 'post'
					}).ajax((response) => {
						var obj = JSON.parse(response);

						if (obj) {
							this.data_page = obj.data;
						}
					})
				}
			},
			mounted() {
				this.loadData()
			},
		})
	</script>

</body>

</html>
