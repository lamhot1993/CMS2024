<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.101.0">
	<title>Admin Login</title>

	<link rel="stylesheet" href="<?= base_url('') ?>/public/assets/css/bootstrap.css">

	<script src="<?= base_url('') ?>public/assets/js/bootstrap.bundle.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/vony.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/vue.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/sweet-alert.js"></script>

	<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}

		.b-example-divider {
			height: 3rem;
			background-color: rgba(0, 0, 0, .1);
			border: solid rgba(0, 0, 0, .15);
			border-width: 1px 0;
			box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
		}

		.b-example-vr {
			flex-shrink: 0;
			width: 1.5rem;
			height: 100vh;
		}

		.bi {
			vertical-align: -.125em;
			fill: currentColor;
		}

		.nav-scroller {
			position: relative;
			z-index: 2;
			height: 2.75rem;
			overflow-y: hidden;
		}

		.nav-scroller .nav {
			display: flex;
			flex-wrap: nowrap;
			padding-bottom: 1rem;
			margin-top: -1px;
			overflow-x: auto;
			text-align: center;
			white-space: nowrap;
			-webkit-overflow-scrolling: touch;
		}

		html,
		body {
			height: 100%;
		}

		body {
			display: flex;
			align-items: center;
			padding-top: 40px;
			padding-bottom: 40px;
			background-color: #f5f5f5;
		}

		.form-signin {
			max-width: 330px;
			padding: 15px;
		}

		.form-signin .form-floating:focus-within {
			z-index: 2;
		}

		.form-signin input[type="email"] {
			margin-bottom: -1px;
			border-bottom-right-radius: 0;
			border-bottom-left-radius: 0;
		}

		.form-signin input[type="password"] {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}
	</style>


</head>

<body class="text-center">

	<main class="form-signin w-100 m-auto" id="app">
		<form>
			<h1 class="h3 mb-3 fw-normal">Login Admin . . .</h1>
			<hr>

			<div v-if="loading" class="spinner-border text-primary" role="status">
			<span class="visually-hidden"></span>
			</div>
			<hr>
			
			<div class="form-floating">
				<input id="txt_username" type="text" class="form-control" v-model="username" @keypress="enterLogin" ref="username" placeholder="Username">
				<label for="floatingInput">Username</label>
			</div>
			<div class="form-floating">
				<input type="password" class="form-control" v-model="password" @keypress="enterLogin" ref="password" placeholder="Password">
				<label for="floatingPassword">Password</label>
			</div>

			<!-- <div class="checkbox mb-3">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div> -->
			<button class="w-100 btn btn-lg btn-primary" type="button" @click="login">Login</button>
			<br>
			<br>
			<a href="<?= base_url() ?>">Back</a>
			<p class="mt-5 mb-3 text-muted">&copy;2022</p>
		</form>
	</main>

	<script>
		const SERVER = '<?= base_url() ?>';
		const _ADMIN_LOGIN_ = SERVER + 'admin/api_login';
		const _TOKEN_ = '';

		ready(function(){
			Vony({id:'txt_username'}).focus()
		});

		new Vue({
			el: "#app",
			data: {
				username: null,
				password: null,
				loading : false
			},
			methods: {
				enterLogin: function(e) {
					if (e.keyCode == 13) {
						this.login()
					}
				},
				login: function() {
					if (this.username == null || this.username === '') {
						this.$refs.username.focus();
						return;
					}
					if (this.password == null || this.password === '') {
						this.$refs.password.focus();
						return;
					}
					this.loading =true;

					Vony({
						url: _ADMIN_LOGIN_,
						method: 'POST',
						data: {
							_token: _TOKEN_,
							username: this.username,
							password: this.password
						}
					}).ajax($response => {
						this.loading = false;
						var obj = JSON.parse($response);
						if (obj) {
							var result = obj.result;

							if (result) {
								Swal.fire({
									title: 'Success',
									text: 'Login Berhasil !',
									icon: 'success',
									confirmButtonText: 'OK'
								});
								reload(SERVER+'admin/home');
							} else {
								Swal.fire({
									title: 'Upppz !',
									text: 'Maaf ! Login Gagal !',
									icon: 'error',
									confirmButtonText: 'OK'
								})
							}
						}
					})

				}
			},
		})
	</script>


</body>

</html>
