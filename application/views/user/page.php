<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $data['name']; ?></title>

	<link rel="icon" type="image/x-icon" href="<?= base_url('') ?>/public/favicon.ico">
	<link rel="stylesheet" href="<?= base_url('') ?>/public/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url('') ?>/public/assets/css/splide.css">
	<link rel="stylesheet" href="<?= base_url('') ?>/public/assets/css/carousel.css">

	<script src="<?= base_url('') ?>public/assets/js/bootstrap.bundle.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/splide.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/vony.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/vue.js"></script>
	<script src="<?= base_url('') ?>public/assets/js/sweet-alert.js"></script>

	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/main.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<script src="https://use.fontawesome.com/f119b6944b.js"></script>

	
</head>

<body>

	<?php include('component/navbar.php') ?>


	<?php include('component/slideshow.php') ?>
	<br>

	<main class="container">
		<div class="bg-light p-5 rounded">
			<h1><?= $data['name']; ?></h1>
			<hr>
			<?php

			if ($data['description'] === '' || $data['description'] == null || $data['description'] === '-') {
			} else {
				echo '<p class="lead">' . $data['description'] . '</p>';
			}

			?>

		</div>
	</main>
	<br>

	<div class="b-example-divider"></div>


	<?php include('component/partners.php') ?>

	<hr>
	<?php include('component/footer.php') ?>

</body>

</html>
