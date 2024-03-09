<!DOCTYPE html>
<html lang="en">

<head>
	<title>Add Page</title>
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
						<h1 class="h3 mb-0 text-gray-800">New Page</h1>
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
									<a href="">New Page</a>
								</h6>
							</div>
							<div class="card-body" id="page" v-cloak>
								<a href="<?= base_url() ?>admin/page">Back To Page</a>
							<hr>
								<div class="input-group">
									<input type="text" v-model="name" @keypress="enterSave" ref="name" 
									class="form-control bg-light border-0 small" placeholder="Name" 
									aria-label="Search" aria-describedby="basic-addon2">
								</div> <br>

								<div id="txt_description">
									
								</div>

								<br>
								<div v-if="loading" class="spinner-border text-success" role="status">
									<span class="visually-hidden"></span>
								</div>

								<hr>
								<button class="btn btn-primary btn-md" @click="savePost">Save</button>
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

		const _PAGE_ADD_DATA_ = _URL_SERVER_ +'admin/api_add_page';
	</script>


	<script src="<?= base_url('') ?>public/assets/js/jquery/jquery.js"></script>
	<script src="<?= base_url('') ?>public/assets/bootstrap/js/bootstrap.bundle.js"></script>


	<script src="<?= base_url('') ?>public/assets/js/sb-admin-2.min.js"></script>

	<script>
		const NO_IMAGE = _URL_SERVER_ + 'public/assets/img/no-img.png';



		if (CKEDITOR.env.ie && CKEDITOR.env.version < 9)
			CKEDITOR.tools.enableHtml5Elements(document);

		// The trick to keep the editor in the sample quite small
		// unless user specified own height.
		CKEDITOR.config.height = 150;
		CKEDITOR.config.width = 'auto';

		var initSample = (function() {
			var wysiwygareaAvailable = isWysiwygareaAvailable(),
				isBBCodeBuiltIn = !!CKEDITOR.plugins.get('bbcode');

			return function() {
				var editorElement = CKEDITOR.document.getById('txt_description');

				// :(((
				if (isBBCodeBuiltIn) {
					editorElement.setHtml(
						'Hello world!\n\n' +
						'I\'m an instance of [url=https://ckeditor.com]CKEditor[/url].'
					);
				}

				// Depending on the wysiwygarea plugin availability initialize classic or inline editor.
				if (wysiwygareaAvailable) {
					CKEDITOR.replace('txt_description');
				} else {
					editorElement.setAttribute('contenteditable', 'true');
					CKEDITOR.inline('txt_description');

					// TODO we can consider displaying some info box that
					// without wysiwygarea the classic editor may not work.
				}
			};

			function isWysiwygareaAvailable() {
				// If in development mode, then the wysiwygarea must be available.
				// Split REV into two strings so builder does not replace it :D.
				if (CKEDITOR.revision == ('%RE' + 'V%')) {
					return true;
				}

				return !!CKEDITOR.plugins.get('wysiwygarea');
			}
		})();
		new Vue({
			el: '#page',
			data: {
				name : null,
				loading : false
			},
			methods: {
				enterSave : function(e) {
					if (e.keyCode==13){
						this.savePost();
					}
				},
				savePost: function() {
					if (this.name == null || this.name === '') {
						this.$refs.name.focus();
						return;
					}
					var txt_description = CKEDITOR.instances.txt_description.getData()


					if (txt_description == null || txt_description === '') {
						txt_description = '-';
						
					}
					this.loading = true;
					Vony({
						url: _PAGE_ADD_DATA_,
						method: 'POST',
						data: {
							_token: _TOKEN_,
							name: this.name,
							description : encodeURI(txt_description)
						}
					}).ajax($response => {
						const $obj = JSON.parse($response);
						this.loading = false
						if ($obj) {
							const $result = $obj.result;

							if ($result) {
								this.name = null;
								showToast('Data has been added !', 'success')
								Swal.fire({
									title: 'Success',
									text: 'Page has been added !',
									icon: 'success',
									confirmButtonText: 'Ok'
								})
							} else {
								var message = $obj.message;
								showToast(message, 'danger')
							}
						}
					});
				}

				
			},
			mounted() {
				
				initSample()
			},
		})

		

	</script>

</body>

</html>
