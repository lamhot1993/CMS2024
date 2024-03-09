<!DOCTYPE html>
<html lang="en">

<head>

	<title>Navbar</title>
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
						<h1 class="h3 mb-0 text-gray-800">Navbar</h1>
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
									<a href="">Navbar</a>
								</h6>
							</div>
							<div class="card-body" id="navbar" v-cloak>
								<button class="btn btn-primary btn-md" data-toggle="modal" data-target="#addNavbarModal">New</button>
								<br> <br>
								<div class="table-responsive">

									<div class="input-group">
										<input type="text" v-model="search" @keypress="enterSearch" ref="search" class="form-control bg-light border-0 small" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
									</div>
									<hr>
									<table class="table table-bordered" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>Title</th>
												<th>Link</th>
												<th>@</th>
											</tr>
										</thead>

										<tbody>
											<tr v-for="data in data_navbar">
												<td>{{ data . title }}</td>
												<td v-html="viewLink(data.link)"></td>
												<td>

													<button @click="showModal(data)" data-toggle="modal" data-target="#editNavbarModal" class="btn btn-warning btn-sm">Edit</button>
													<button @click="addIdNavbar(data.id_navbar)" data-toggle="modal" data-target="#addChildModal" class="btn btn-success btn-sm">Add Child</button>
													<button @click="deleteData(data.id_navbar)" class="btn btn-danger btn-sm">x</button>
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


	<div class="modal fade" id="addNavbarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Navbar</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">

					<div v-if="alert" class="alert alert-danger" role="alert">
						{{ error_message }}
					</div>

					<div class="input-group">
						<input type="text" @keypress="enterSave" v-model="title" ref="title" class="form-control bg-light border-0 small" placeholder="Title" aria-label="Search" aria-describedby="basic-addon2">
					</div>
					<br>

					<div class="form-group">
						<label for="exampleFormControlSelect1">Select Page</label>
						<select v-model="pages" class="form-control form-control-sm" id="exampleFormControlSelect1">
							<option :value="page.slug" v-for="page in data_pages">
								{{ page.name }}
							</option>
						</select>
					</div>
					<a href="<?= base_url() ?>admin/page">+ New Page</a>
					<!-- <div class="input-group">
						<input type="text" @keypress="enterSave" v-model="link" ref="link" 
						class="form-control bg-light border-0 small" placeholder="Link" 
						aria-label="Search" aria-describedby="basic-addon2">
					</div> -->
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="#" @click="save">Save</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="addChildModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Child</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">

					<div v-if="alert" class="alert alert-danger" role="alert">
						{{ error_message }}
					</div>

					<div class="input-group">
						<input type="text" @keypress="enterSave" v-model="title" ref="title" class="form-control bg-light border-0 small" placeholder="Title" aria-label="Search" aria-describedby="basic-addon2">
					</div>
					<br>

					<div class="form-group">
						<label for="exampleFormControlSelect1">Select Page</label>
						<select v-model="pages" class="form-control form-control-sm" id="exampleFormControlSelect1">
							<option :value="page.slug" v-for="page in data_pages">
								{{ page.name }}
							</option>
						</select>
					</div>

					<hr>

					<ul class="list-group">
						<li v-for="data in data_navbar_child" class="list-group-item list-group-item-primary">
						<button @click="deleteData(data.id_navbar_child)" class="btn btn-danger btn-sm">x</button>
							<a :href="viewLink(data.link_child)">{{ data.title_child }}</a>
						</li>
					</ul>

				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="#" @click="save">Save</a>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="editNavbarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Navbar</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">

					<div v-if="alert" class="alert alert-danger" role="alert">
						{{ error_message }}
					</div>

					<div class="input-group">
						<input type="text" @keypress="enterSave" v-model="title" ref="title" class="form-control bg-light border-0 small" placeholder="Title" aria-label="Search" aria-describedby="basic-addon2">
					</div>
					<br>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Select Page</label>
						<select v-model="pages" class="form-control form-control-sm" id="exampleFormControlSelect1">
							<option :value="page.slug" v-for="page in data_pages">
								{{ page.name }}
							</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="#" @click="updateData">Save</a>
				</div>
			</div>
		</div>
	</div>


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

		const _NAVBAR_CHILD_ADD_DATA_ = _URL_SERVER_ + 'admin/api_add_navbar_child';
		const _NAVBAR_CHILD_LOAD_DATA_BYID_ = _URL_SERVER_ + 'admin/api_load_navbar_child_byId';
		const _NAVBAR_CHILD_DELETE_DATA_ = _URL_SERVER_ + 'admin/api_delete_navbar_child';

		const _NAVBAR_LOAD_ALL_DATA_ = _URL_SERVER_ + 'admin/api_load_all_navbar';
		const _NAVBAR_ADD_DATA_ = _URL_SERVER_ + 'admin/api_add_navbar';
		const _NAVBAR_EDIT_DATA_ = _URL_SERVER_ + 'admin/api_update_navbar';
		const _NAVBAR_DELETE_DATA_ = _URL_SERVER_ + 'admin/api_delete_navbar';
		const _NAVBAR_SEARCH_DATA_ = _URL_SERVER_ + 'admin/api_search_navbar';

		const _PAGES_LOAD_DATA_ = _URL_SERVER_ + 'admin/api_load_all_page';


		var _READY_UPLOAD_FOTO_ = false;
		const $typefile_allowed = ['image/png', 'image/jpeg'];

		var $addChildModal = new Vue({
			el: '#addChildModal',
			data: {
				title: null,
				link: null,
				data_pages: null,
				pages: null,
				id_navbar: null,
				alert: null,
				data_navbar_child: null
			},
			mounted() {
				this.loadPages()
			},
			methods: {
				deleteData: function(id_navbar_child){
					if (id_navbar_child) {
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
									url: _NAVBAR_CHILD_DELETE_DATA_,
									method: 'POST',
									data: {
										_token: _TOKEN_,
										id_navbar_child : id_navbar_child
									}
								}).ajax($response => {
									const $obj = JSON.parse($response);
									if ($obj.result == true) {
										showToast('Data has been deleted !', 'success')
										$navbar.loadNavbarChild(this.id_navbar);
									} else {
										this.data_navbar_child = null;
										showToast('Data gagal dihapus !')
									}
								});
							}
						})
					}
				},
				viewLink: function(link){

					return _URL_SERVER_+`page/p/`+link;
				},
				save: function() {
					if (this.title == null || this.title === '') {
						this.$refs.title.focus();
						return;
					}
					if (this.pages === 'NULL' || this.pages == null) {

						return;
					}
					// if (this.link == null || this.link === '') {
					// 	this.$refs.link.focus();
					// 	return;
					// }

					if (this.id_navbar == null) {
						return;
					}

					Vony({
						url: _NAVBAR_CHILD_ADD_DATA_,
						method: 'POST',
						data: {
							_token: _TOKEN_,
							title: this.title,
							link: this.pages,
							id_navbar: this.id_navbar
						}
					}).ajax($response => {
						const $obj = JSON.parse($response);

						if ($obj) {
							const $result = $obj.result;

							if ($result) {
								this.title = null;
								this.link = null
								$navbar.loadData();
								showToast('Data has been added !', 'success');
								$navbar.loadNavbarChild(this.id_navbar)
							} else {
								var message = $obj.message;
								showToast(message, 'danger')
							}
						}
					});

				},
				enterSave: function(e) {
					if (e.keyCode == 13) {
						this.save()
					}
				},
				loadPages: function() {
					Vony({
						url: _PAGES_LOAD_DATA_,
						method: 'post'
					}).ajax((response) => {
						var obj = JSON.parse(response);

						if (obj) {
							console.log(obj.data);
							this.data_pages = obj.data;
						}
					})
				}
			},
		})

		var $navbar = new Vue({
			el: '#navbar',
			data: {
				title: null,
				link: null,
				data_navbar: null,
				search: null,
				pages: null
			},
			methods: {
				loadNavbarChild: function(id_navbar){
					Vony({
						url: _NAVBAR_CHILD_LOAD_DATA_BYID_,
						method: 'post',
						data: {
							id_navbar: id_navbar
						}
					}).ajax((response) => {
						var obj = JSON.parse(response);

						if (obj) {
							console.log(obj.data);
							$addChildModal.data_navbar_child = obj.data;
						}
					})
				},
				
				addIdNavbar: function(id_navbar) {
					$addChildModal.id_navbar = id_navbar;
					this.loadNavbarChild(id_navbar);					
				},
				viewLink: function(value) {
					var final = _URL_SERVER_ + 'page/p/' + value;
					return `<a href="${final}" target="_blank">${value}</a>`;
				},
				showModal: function(data) {
					$editNavbarModal.id_navbar = data.id_navbar;
					$editNavbarModal.title = data.title;
					$editNavbarModal.link = data.link;
				},
				deleteData: function(id_navbar) {
					if (id_navbar) {
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
									url: _NAVBAR_DELETE_DATA_,
									method: 'POST',
									data: {
										_token: _TOKEN_,
										id_navbar: id_navbar
									}
								}).ajax($response => {
									const $obj = JSON.parse($response);
									if ($obj.result == true) {
										showToast('Data has been deleted !', 'success')
										this.loadData();
									} else {
										this.data_navbar = null;
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
						url: _NAVBAR_SEARCH_DATA_,
						method: 'POST',
						data: {
							_token: _TOKEN_,
							search: this.search
						}
					}).ajax($response => {
						const $obj = JSON.parse($response);
						if ($obj.result == true) {
							this.data_navbar = $obj.data;
						} else {
							this.data_navbar = null;
							showToast('Failed load data !', 'danger')
						}
					});

				},
				newPost: function() {
					reload(_URL_SERVER_ + 'admin/addNavbar');
				},
				loadData: function() {
					Vony({
						url: _NAVBAR_LOAD_ALL_DATA_,
						method: 'post'
					}).ajax((response) => {
						var obj = JSON.parse(response);

						if (obj) {
							this.data_navbar = obj.data;
						}
					})
				}
			},
			mounted() {
				this.loadData()
			},
		})


		new Vue({
			el: "#addNavbarModal",
			data: {
				title: null,
				link: null,
				alert: null,
				pages: null,
				data_pages: null
			},
			mounted() {
				this.loadPages()
			},
			methods: {
				loadPages: function() {
					Vony({
						url: _PAGES_LOAD_DATA_,
						method: 'post'
					}).ajax((response) => {
						var obj = JSON.parse(response);

						if (obj) {
							this.data_pages = obj.data;
						}
					})
				},
				save: function() {
					if (this.title == null || this.title === '') {
						this.$refs.title.focus();
						return;
					}

					if (this.pages === 'NULL' || this.pages == null) {

						return;
					}
					// if (this.link == null || this.link === '') {
					// 	this.$refs.link.focus();
					// 	return;
					// }

					Vony({
						url: _NAVBAR_ADD_DATA_,
						method: 'POST',
						data: {
							_token: _TOKEN_,
							title: this.title,
							link: this.pages
						}
					}).ajax($response => {
						const $obj = JSON.parse($response);

						if ($obj) {
							const $result = $obj.result;

							if ($result) {
								this.title = null;
								this.link = null
								$navbar.loadData();
								showToast('Data has been added !', 'success');
							} else {
								var message = $obj.message;
								showToast(message, 'danger')
							}
						}
					});
				},
				enterSave: function(e) {
					if (e.keyCode == 13) {
						this.save()
					}
				}
			},
		})

		var $editNavbarModal = new Vue({
			el: "#editNavbarModal",
			data: {
				title: null,
				link: null,
				alert: null,
				id_navbar: null,
				pages: null,
				data_pages: null
			},
			mounted() {
				this.loadPage()
			},
			methods: {
				loadPage: function() {
					Vony({
						url: _URL_SERVER_ + 'admin/api_load_all_page',
						method: 'post'
					}).ajax((response) => {
						var obj = JSON.parse(response);

						if (obj) {
							this.data_pages = obj.data;
						}
					})
				},
				updateData: function() {
					if (this.title == null || this.title === '') {
						this.$refs.title.focus();
						return;
					}
					if (this.link == null || this.link === '') {

						return;
					}
					if (this.pages == null || this.pages === '') {

						return;
					}

					Vony({
						url: _NAVBAR_EDIT_DATA_,
						method: 'POST',
						data: {
							_token: _TOKEN_,
							title: this.title,
							link: this.pages,
							id_navbar: this.id_navbar
						}
					}).ajax($response => {
						const $obj = JSON.parse($response);

						if ($obj) {
							const $result = $obj.result;

							if ($result) {
								this.title = null;
								this.link = null;
								this.pages = null;
								$navbar.loadData();
								showToast('Data has been updated !', 'success')
							} else {
								var message = $obj.message;
								showToast(message, 'danger')
							}
						}
					});
				},
				enterSave: function(e) {
					if (e.keyCode == 13) {
						this.updateData()
					}
				}
			},
		})
	</script>

</body>

</html>
