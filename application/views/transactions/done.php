
<style>
	.dot {
		height: 25px;
		width: 25px;
		background-color: #bbb;
		border-radius: 50%;
		display: inline-block;
	}

	.block {
		height: 80px;
		width: 80px;
		background-color: #bbb;
		border-radius: 10%;
		display: inline-block;
	}

	.theme {
		background-color: #3bc9f5;
	}

</style>

<div class="row">
	<div class="col-md-12" style="float:none;margin:auto;">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="text-center mb-4">
							<span class="dot"></span>
							<span class="dot"></span>
							<span class="dot theme"></span>
						</div>
						<section>
							<div>
								<section class="w-100 p-4 d-flex justify-content-center pb-4">
									<div class="row">
										<div class="col-md-12 text-center">
											<h2>Thank You!</h2>
											Document Code : <span id="doc_code"><?= $header->document_code ?></span><br>
											Total : <span id="total"><?= $header->total ?></span>
											<br>
											<br>
											<div class="text-center">
												<button type="button" onclick="done()" id="checkout" class="btn btn-primary btn-block">Confirm</button>
											</div>
										</div>
									</div>
								</section>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script>
	var total = <?php echo json_encode($header -> total); ?> ;
	document.getElementById('total').innerHTML = rupiah(parseInt(total));

	function done() {
		// Set the success flashdata message
		<?php set_pesan('data saved successfully!'); ?>
		window.location.href = "<?php echo site_url('transaction'); ?>";
	}


	function rupiah(number) {
		return Intl.NumberFormat("id-ID", {
			style: "currency",
			currency: "IDR"
		}).format(number);
	}

</script>
