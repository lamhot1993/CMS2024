<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="icon" type="image/x-icon" href="<?= base_url('') ?>/public/favicon.ico">
	<link rel="stylesheet" href="<?= base_url('') ?>/public/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url('') ?>/public/assets/css/splide.css">
	<link rel="stylesheet" href="<?= base_url('') ?>/public/assets/css/carousel.css">
	<!-- <link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/slick.css"> -->

	<script src="<?= base_url('') ?>public/assets/js/bootstrap.bundle.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/splide.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/vony.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/vue.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/sweet-alert.js"></script>


	<!-- <script src="public/assets/js/font-awesome.js"></script> -->


	<script src="https://use.fontawesome.com/f119b6944b.js"></script>


	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/main.css">


</head>

<body style="background:white">

	<?php include('component/navbar.php') ?>

	<?php include('component/slideshow.php') ?>

	<?php include('component/search.php') ?>
	<br>
	<?php include('component/post.php') ?>
	<br>

	<div class="b-example-divider"></div>
	<br>


	<?php include('component/teachers.php') ?>
	<br>
	<div class="b-example-divider"></div>

	<br>
	<?php include('component/school.php') ?>
	<div class="b-example-divider"></div><br>

	<?php include('component/partners.php') ?>
	<br>

	<?php include('component/footer.php') ?>
	
	
	<div class="b-example-divider"></div>

	<script src="<?= base_url('') ?>public/assets/js/jquery/jquery.min.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/slick.min.js"></script>

	<script>
		var splide = new Splide("#main-slider", {
			width: 950,
			height: 350,
			pagination: true,
			cover: true,
			perPage:3,
			breakpoints: {
			640: {
				perPage: 1,
			},
		},
		});

		var thumbnails = document.getElementsByClassName("thumbnail");
		var current;

		for (var i = 0; i < thumbnails.length; i++) {
			initThumbnail(thumbnails[i], i);
		}

		function initThumbnail(thumbnail, index) {
			thumbnail.addEventListener("click", function() {
				splide.go(index);
			});
		}

		splide.on("mounted move", function() {
			var thumbnail = thumbnails[splide.index];

			if (thumbnail) {
				if (current) {
					current.classList.remove("is-active");
				}

				thumbnail.classList.add("is-active");
				current = thumbnail;
			}
		});
		splide.mount();
	</script>
</body>

</html>
