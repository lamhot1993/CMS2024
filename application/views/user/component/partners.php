
<main class="container">


	<div class="card">
		<div class="card-body">
			<p>
				Partners
			</p>
			<hr>
			<center>
			<?php
			$server = base_url() . 'public/img/partners/';
			$i = 1;
			$total = count($data_partner);


			foreach ($data_partner as $key => $value) {
				$image = $value['image'];
				$title = $value['title'];
				$link = $value['link'];

				$float_start = 'rounded float-start';
				$float_end = 'rounded float-end';
				$float  = 'rounded';

				$final_float = $float;
				if ($i == 1) {
					$final_float = $float_start;
				}

			
				echo '<a href="'.$link.'" target="_blank">
				<img class="rounded" src="' . $server . $image . '" width="120" height="80"></img></a>';
			}


			?>
			</center>
		</div>
	</div>




	<br>

	<div class="card">
		<div class="card-body">
			<strong>
				Feedback
			</strong>
			<hr>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="exampleRadios" id="pilih1" value="1">
				<label class="form-check-label" for="exampleRadios1">
					Sangat Baik
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="exampleRadios" id="pilih2" value="2">
				<label class="form-check-label" for="exampleRadios2">
					Baik
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="exampleRadios" id="pilih3" value="3">
				<label class="form-check-label" for="exampleRadios2">
					Kurang Baik
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="exampleRadios" id="pilih4" value="4">
				<label class="form-check-label" for="exampleRadios2">
					Sangat Buruk
				</label>
			</div>
			<hr>
			<button class="btn btn-primary btn-md" onclick="sendFeedback()">Send Feedback</button>

		</div>
	</div>

</main>


<script>
	const _SEND_FEEDBACK_ = '<?= base_url() ?>admin/api_send_feedback';
	const _TOKEN_ = '';

	function sendFeedback() {
		var pilih1 = document.getElementById('pilih1');
		var pilih2 = document.getElementById('pilih2');
		var pilih3 = document.getElementById('pilih3');
		var pilih4 = document.getElementById('pilih4');

		var pilih = null;

		if (pilih1.checked == true) {
			pilih = 1;
		} else if (pilih2.checked == true) {
			pilih = 2;
		} else if (pilih3.checked == true) {
			pilih = 3;
		} else if (pilih4.checked == true) {
			pilih = 4;
		}
		if (pilih == null) {

			Swal.fire({
				title: 'Upppz !',
				text: 'Maaf !! Pilih Penilaian Dulu !',
				icon: 'error',
				confirmButtonText: 'OK'
			})
			return;
		}
		Vony({
			url: _SEND_FEEDBACK_,
			method: 'POST',
			data: {
				_token: _TOKEN_,
				rating: pilih
			}
		}).ajax($response => {
			var obj = JSON.parse($response);
			if (obj) {
				var result = obj.result;

				if (result) {
					Swal.fire({
						title: 'Success',
						text: 'Terimakasih ! Feedback Berhasil Dikirim !',
						icon: 'success',
						confirmButtonText: 'OK'
					});
				} else {
					Swal.fire({
						title: 'Upppz !',
						text: 'Maaf !!',
						icon: 'error',
						confirmButtonText: 'OK'
					})
				}
			}
		})
	}
</script>

