<!DOCTYPE html>
<html lang="en">

<head>

	<title>Slideshows</title>
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
						<h1 class="h3 mb-0 text-gray-800">Slideshows</h1>
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
									<a href="">Slideshows</a>
								</h6>
							</div>
							<div class="card-body" id="slideshow" v-cloak>
								<button class="btn btn-primary btn-md" data-toggle="modal" data-target="#addSlideshowModal">New</button>
								<br> <br>
								<div class="table-responsive">

									
									<hr>
									<table class="table table-bordered" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>Image</th>
												<th>Title</th>
												<th>Description</th>
												<th>@</th>
											</tr>
										</thead>

										<tbody>
											<tr v-for="data in data_slideshow">
												<td v-html="viewImage(data.image)"></td>
												<td>{{data.title}}</td>
												<td>{{data.description}}</td>
												<td>
													<button @click="showModal(data)" data-toggle="modal" data-target="#editSlideshowModal" class="btn btn-warning btn-sm">Edit</button>
													<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#uploadFotoModal" @click="getIdSlideshow(data.id_slideshow)">Foto</button>
													
													<button @click="deleteData(data.id_slideshow)" class="btn btn-danger btn-sm">x</button>
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


	<div class="modal fade" id="addSlideshowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Slideshow</h5>
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
						class="form-control bg-light border-0 small" placeholder="Title" 
						aria-label="Search" aria-describedby="basic-addon2">
					</div>
					<br>
					<div class="input-group">
						<input type="text" @keypress="enterSave" v-model="description" ref="description" 
						class="form-control bg-light border-0 small" placeholder="Description" 
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
	
		
	<div class="modal fade" id="editSlideshowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Slideshow</h5>
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
						class="form-control bg-light border-0 small" placeholder="Title" 
						aria-label="Search" aria-describedby="basic-addon2">
					</div>
					<br>
					<div class="input-group">
						<input type="text" @keypress="enterSave" v-model="description" ref="description" 
						class="form-control bg-light border-0 small" placeholder="Description" 
						aria-label="Search" aria-describedby="basic-addon2">
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="#" @click="updateData">Save</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="uploadFotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Upload Slideshow</h5>
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
						<img :src="img_slideshow" alt="" width="100px" height="100px" id="img_slideshow" name="img_slideshow">
					</center> <br>


				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="#" @click="uploadFoto">Upload</a>
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

		const _SLIDESHOW_LOAD_ALL_DATA_ = _URL_SERVER_ + 'admin/api_load_all_slideshow';
		const _SLIDESHOW_ADD_DATA_ = _URL_SERVER_ + 'admin/api_add_slideshow';
		const _SLIDESHOW_EDIT_DATA_ = _URL_SERVER_ + 'admin/api_update_slideshow';
		const _SLIDESHOW_DELETE_DATA_ = _URL_SERVER_ + 'admin/api_delete_slideshow';
		const _SLIDESHOW_SEARCH_DATA_ = _URL_SERVER_ + 'admin/api_search_slideshow';

		var _READY_UPLOAD_FOTO_ = false;
		const $typefile_allowed = ['image/png', 'image/jpeg'];

	
		var $slideshow = new Vue({
			el: '#slideshow',
			data: {
				image: null,
				title : null,
				description:null,
				data_slideshow:null,
				search: null
			},
			methods: {
				getIdSlideshow: function(id_slideshow) {
					$uploadFoto.id_slideshow = id_slideshow;
				},
				viewImage:function(value){
					var final = '';
					if (value==='' || value==null){
						final =NO_IMAGE;
					}else{
						final= _URL_SERVER_ +'public/img/slideshow/'+value;
					}
					return `<img src="${final}" width="80" height="80" class="img-thumbnail"></img>`;
				
				},	
				showModal: function(data){
					$editSlideshowModal.id_slideshow = data.id_slideshow;
					$editSlideshowModal.title = data.title;
					$editSlideshowModal.description = data.description;
				},
				deleteData: function(id_slideshow) {
					if (id_slideshow) {
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
									url: _SLIDESHOW_DELETE_DATA_,
									method: 'POST',
									data: {
										_token: _TOKEN_,
										id_slideshow: id_slideshow
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
						url: _SLIDESHOW_SEARCH_DATA_,
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
				loadData: function() {
					Vony({
						url: _SLIDESHOW_LOAD_ALL_DATA_,
						method: 'post'
					}).ajax((response) => {
						var obj = JSON.parse(response);

						if (obj) {
							this.data_slideshow = obj.data;
						}
					})
				}
			},
			mounted() {
				this.loadData()
			},
		})


		new Vue({
			el : "#addSlideshowModal",
			data : {
				title : null,
				description : null,
				alert:null
			},
			mounted() {

			},
			methods: {
				
				save: function(){
					if (this.title == null || this.title === '') {
						this.$refs.title.focus();
						return;
					}

					if (this.description == null || this.description === '') {
						this.$refs.description.focus();
						return;
					}

					Vony({
						url: _SLIDESHOW_ADD_DATA_,
						method: 'POST',
						data: {
							_token: _TOKEN_,
							title : this.title,
							description : this.description
						}
					}).ajax($response => {
						const $obj = JSON.parse($response);

						if ($obj) {
							const $result = $obj.result;

							if ($result) {
								this.title = null;
								this.description = null
								$slideshow.loadData();
								showToast('Data has been added !', 'success')
							} else {
								var message = $obj.message;
								showToast(message, 'danger')
							}
						}
					});
				},
				enterSave: function(e){
					if (e.keyCode==13){
						this.save()
					}
				}
			},
		})

		var $editSlideshowModal = new Vue({
			el : "#editSlideshowModal",
			data : {
				title : null,
				description : null,
				alert:null,
				id_slideshow:null
			},
			mounted() {
				this.loadPage()
			},
			methods: {
				loadPage: function(){
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
				selectPage: function(){

				},
				updateData: function(){
					if (this.title == null || this.title === '') {
						this.$refs.title.focus();
						return;
					}
					if (this.description == null || this.description === '') {
						this.$refs.description.focus();
						return;
					}

					Vony({
						url: _SLIDESHOW_EDIT_DATA_,
						method: 'POST',
						data: {
							_token: _TOKEN_,
							title : this.title,
							description : this.description,
							id_slideshow : this.id_slideshow,
						}
					}).ajax($response => {
						const $obj = JSON.parse($response);

						if ($obj) {
							const $result = $obj.result;

							if ($result) {
								this.title = null;
								this.description = null;
								$slideshow.loadData();
								showToast('Data has been updated !', 'success')
							} else {
								var message = $obj.message;
								showToast(message, 'danger')
							}
						}
					});
				},
				enterSave: function(e){
					if (e.keyCode==13){
						this.updateData()
					}
				}
			},
		})

		var $uploadFoto = new Vue({
			el: '#uploadFotoModal',
			data: {
				img_slideshow: NO_IMAGE,
				alert: null,
				loading: false,
				id_slideshow: null
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
							this.img_slideshow = NO_IMAGE;
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
							this.img_slideshow = image;
						} else {
							_READY_UPLOAD_FOTO_ = false;
							Swal.fire({
								title: 'Uppz!',
								text: 'File extension is not allowed',
								icon: 'error',
								confirmButtonText: 'Ok'
							});
							this.img_slideshow = NO_IMAGE;
						}
					} else {
						_READY_UPLOAD_FOTO_ = false;
						Swal.fire({
							title: 'Uppz!',
							text: 'Foto belum dipilih :)',
							icon: 'error',
							confirmButtonText: 'Ok'
						});

						this.img_slideshow = NO_IMAGE;
					}

				},
				uploadFoto: function() {
					if (_READY_UPLOAD_FOTO_ == false) {
						console.log("Not ready")
						return;
					}

					console.log('id slideshow -> '+this.id_slideshow)
					if (this.id_slideshow == null || this.id_slidewho==='0') {
						console.log("Not ready")
						return;
					}
					this.loading = true;
					new Upload({
						// Array
						el: ['file_img'],
						// String
						url: _URL_SERVER_ + 'admin/api_upload_foto_slideshow',
						// String
						data: this.id_slideshow,
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
								$slideshow.loadData();
								_READY_UPLOAD_FOTO_ = false;
								this.img_slideshow = NO_IMAGE;
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

	</script>

</body>

</html>
