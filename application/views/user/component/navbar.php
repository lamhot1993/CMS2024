<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-danger">
<div class="container-fluid">
	<a class="navbar-brand" href="<?= base_url() ?>"></a>
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse1" aria-controls="navbarCollapse1" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarCollapse1">
		<ul class="navbar-nav me-auto mb-2 mb-md-0">
			<li class="nav-item">
				<?php $server = base_url() . 'public/img/headers/'; ?>
				
				<a href="<?= base_url() ?>">
					<img src="<?= $server . $data_header['foto'] ?>" height="60" width="90" class="img-thumbnail" alt="">
				</a>
				
			</li>
			<li>
				&nbsp
				&nbsp
				&nbsp
			</li>
			<li>
				<p>
				<h5 style="color:white"> Call : <?= ($data_school->hp); ?></h5>
				</p>
			</li>

		</ul>


		<a href="<?= $data_social_media['facebook'] ?>" target="_blank">
			<i class="gg-facebook"></i>
		</a>

		&nbsp
		&nbsp
		&nbsp

		<a href="<?= $data_social_media['instagram'] ?>" target="_blank">
			<i class="gg-instagram"></i>
		</a>

		&nbsp
		&nbsp
		&nbsp

		<a href="<?= $data_social_media['twitter'] ?>" target="_blank">
			<i class="gg-twitter"></i>
		</a>

		&nbsp
		&nbsp
		&nbsp

		<a href="<?= $data_social_media['youtube'] ?>" target="_blank">
			<i class="gg-youtube"></i>
		</a>
	</div>
</div>
</nav>
<br><br>
<br><br>

<div class="container">
<nav class="navbar navbar-expand-lg navbar-dark bg-light mb-auto">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?= base_url() ?>" style="color:black">Home</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse2" aria-controls="navbarCollapse2" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse2">
			<ul class="navbar-nav me-auto mb-2 mb-md-0">

				<?php

					$server = base_url() . 'page/p/';

					for ($i = 0; $i < count($data_navbar); $i++) {
						$checking_dropdown = false;
						$template_dropdown = '';

						$id_navbar = $data_navbar[$i]['id_navbar'];

						foreach ($data_navbar_child as $key => $value) {
							$id_navbar_child = $value['id_navbar'];
							$title_child = $value['title_child'];
							$link_child = $value['link_child'];

							if ($id_navbar == $id_navbar_child) {
								$checking_dropdown = true;
								$template_dropdown .= '<li><a style="color:black" class="dropdown-item" href="' . $server . $link_child . '">' . $title_child . '</a></li>';
							} else {
								$checking_dropdown = false;
							}
						}

						$title =  $data_navbar[$i]['title'];
						$link =  $data_navbar[$i]['link'];


						if ($checking_dropdown == false) {
							echo '<li class="nav-item">
							<a style="color:black" class="nav-link active" aria-current="page" href="' . $server . $link . '">' . $title . '</a>
						</li>';
						} else {
							echo '<li class="nav-item dropdown">
							<a style="color:black" class="nav-link dropdown-toggle" href="' . $server . $link . '" 
							data-bs-toggle="dropdown" aria-expanded="false">' . $title . '</a>
							<ul class="dropdown-menu">
								' . $template_dropdown . '
							</ul>
						</li>';
						}
					}


					?>

			</ul>


		</div>
	</div>
</nav>

</div>
