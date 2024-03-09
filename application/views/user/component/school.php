<main class="container">
	<div class="bg-light p-5 rounded">
		<h1><?= ($data_school->nama) ?></h1>
		
		<p class="lead">
		<?= ($data_school->alamat).'-'.($data_school->hp) ?>
		</p>
		
		<hr>
		<img src="<?= base_url().'public/img/school/'.$data_school->foto ?>" 
		class="rounded" width="150" height="150"  alt="">
	</div>
</main>
<br>
