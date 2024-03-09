<main class="container">
<div class="bg-light p-5 rounded">

<?php 
$server = base_url();
$no_image = $server.'public/assets/img/no-img.png';

foreach ($data_post as $key => $value) {
	$title = $value['title'];
	$description = $value['description'];
	$cover = $value['cover'];
	$date = $value['date_created'];
	$link = $value['id_post'];

	$description= substr($description,0,100).'...';

	if ($cover===''||$cover==null){
		$cover = $no_image;
	}else{
		$cover = $server.'public/img/posts/'.$cover;
	}

	echo '<h1 style="color:#34495e">
		<a href="'.$server.'post/detail/'.$link.'">'.$title.'</a>
	</h1>
	<hr>
	<p class="lead">
	<small><i>'.$date.'</i></small>
		<center>
			<img class="thumbnail" width="350" height="350" src="'.$cover.'"></img>
		</center>
		'.$description.'
	</p>
	<br>
	<a class="btn btn-lg btn-primary btn-sm" href="'.$server.'post/detail/'.$link.'">
		Read More
	</a>';
}

?>


</div>
</main>
