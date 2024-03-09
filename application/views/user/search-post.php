<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	
<link rel="icon" type="image/x-icon" href="<?= base_url('') ?>public/favicon.ico">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $search ?></title>
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/splide.css">
	<link rel="stylesheet" href="<?= base_url('') ?>public/assets/css/carousel.css">

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
			<h4>
				Keyword : << <small><?= $search ?></small> >>
			</h4>
		</div>

		<?php 

		$tmp  = '';

		foreach ($result_data as $key => $value) {
			  $title = $value['title'];
			  $id_post = $value['id_post'];

			 $tmp .= '<div class="alert alert-secondary" role="alert">
			 			<a href="'.base_url().'post/detail/'.$id_post.'">'.$title.'</a>
		   			  </div>';
		}
		echo $tmp;
		?>
	</main>
	<hr>
	
	<?php include('component/partners.php') ?>

	<hr>
	<?php include('component/footer.php') ?>

</body>

</html>
