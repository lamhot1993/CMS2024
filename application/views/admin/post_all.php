<!DOCTYPE html>
<html lang="en">

<head>

<title>Post</title>
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
					<h1 class="h3 mb-0 text-gray-800">Post</h1>
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
								<a href="">Post</a>
							</h6>
						</div>
						<div class="card-body" id="post" v-cloak>
							<button class="btn btn-primary btn-md" @click="newPost">New</button>
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
											<!-- <th>Description</th> -->
											<th>Cover</th>
											<th>@</th>
										</tr>
									</thead>

									<tbody>
										<tr v-for="data in data_post">
											<td v-html="viewLink(data.id_post,data.title)"></td>
											<!-- <td>{{ data . description }}</td> -->
											<td v-html="viewCover(data.cover)"></td>
											<td>
												<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#uploadFotoModal" @click="getIdPost(data.id_post)">Upload</button>
												<button @click="editPost(data.id_post)" class="btn btn-warning btn-sm">Edit</button>
												<button @click="deleteData(data.id_post)" class="btn btn-danger btn-sm">x</button>
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

	const _POST_LOAD_ALL_DATA_ = _URL_SERVER_ + 'admin/api_load_all_post';
	const _POST_DELETE_DATA_ = _URL_SERVER_ + 'admin/api_delete_post';
	const _POST_SEARCH_DATA_ = _URL_SERVER_ + 'admin/api_search_post';

	var _READY_UPLOAD_FOTO_ = false;
	const $typefile_allowed = ['image/png', 'image/jpeg'];

	var $uploadFoto = new Vue({
		el: '#uploadFotoModal',
		data: {
			loading: null,
			img_foto: NO_IMAGE,
			id_post: null
		},
		methods: {
			selectFoto: function() {
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
			uploadFoto: function() {
				if (_READY_UPLOAD_FOTO_ == false) {
					console.log("Not ready")
					return;
				}

				if (this.id_post == null) {
					console.log("Not ready")
					return;
				}
				this.loading = true;
				new Upload({
					// Array
					el: ['file_img'],
					// String
					url: _URL_SERVER_ + '/admin/api_upload_foto_post',
					// String
					data: this.id_post,
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
							$post.loadData();
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
			}
		}
	})

	var $post = new Vue({
		el: '#post',
		data: {
			title: null,
			data_post: null,
			search: null
		},
		methods: {
			viewLink: function(id,title){
					var final= _URL_SERVER_+'post/detail/'+id;
					return `<a href="${final}">${title}</a>`;
				},
			viewCover: function(data) {
				var path = 'public/img/posts/';
				if (data === '' || data == null) {
					data = NO_IMAGE;
				} else {
					data = _URL_SERVER_ + path + data;
				}
				return `<img src="${data}" width="80" height="80" class="img-thumbnail"></img>`;
			},
			getIdPost: function($id) {

				$uploadFoto.id_post = $id;
			},
			editPost: function(id_post) {
				reload(_URL_SERVER_ + 'admin/editPost/' + id_post);
			},
			deleteData: function(id_post) {
				if (id_post) {
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
								url: _POST_DELETE_DATA_,
								method: 'POST',
								data: {
									_token: _TOKEN_,
									id_post: id_post
								}
							}).ajax($response => {
								const $obj = JSON.parse($response);
								if ($obj.result == true) {
									showToast('Data has been deleted !', 'success')
									this.loadData();
								} else {
									this.data_post = null;
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
						url: _POST_SEARCH_DATA_,
						method: 'POST',
						data: {
							_token: _TOKEN_,
							search:this.search
						}
					}).ajax($response => {
						const $obj = JSON.parse($response);
						if ($obj.result == true) {
							this.data_post = $obj.data;
						} else {
							this.data_post = null;
							showToast('Failed load data !', 'danger')
						}
					});

			},
			newPost: function() {
				reload(_URL_SERVER_ + 'admin/addPost');
			},
			loadData: function() {
				Vony({
					url: _POST_LOAD_ALL_DATA_,
					method: 'post'
				}).ajax((response) => {
					var obj = JSON.parse(response);

					if (obj) {
						this.data_post = obj.data;
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
