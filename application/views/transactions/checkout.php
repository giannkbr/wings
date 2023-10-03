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

<div class="row justify-content-start">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <span class="dot"></span>
                        <span class="dot theme"></span>
                        <span class="dot"></span>
                    </div>
                    <div class="table-responsive">
                        <table id="table_list" class="table">
                            <!-- Add your table content here -->
                        </table>
                    </div>
                    <div class="text-center ">
                        <table class="table table-bordered">
                            <tr>
                                <td>TOTAL : <span id="total"></span></td>
                            </tr>
                        </table>
                        <button type="button" onclick="confirm()" id="checkout" class="btn btn-primary btn-block mb-3">
                            CONFIRM
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- <div class="row justify-content-start">
	<div class="col-lg-12" style="float:none;margin:auto;">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="text-center mb-4">
							<span class="dot"></span>
							<span class="dot theme"></span>
							<span class="dot"></span>
						</div>
						<section>
							<div>
								<section class="w-100 p-4 d-flex justify-content-center pb-4">
									<div class="row">
										<div class="col-md-12">
											<table id="table_list"></table>
											<br>
											<br>
											<div class="text-center">
												<table class="table table-bordered">
													<tr>
														<td>TOTAL : <span id="total"></span></td>
													</tr>
												</table>
												<button type="button" onclick="confirm()" id="checkout"
													class="btn btn-block mb-6 rounded-pill"
													style="width: 200px; color:white; background-color: #3bc9f5;">CONFIRM</button>
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
</div> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
<script>
	var products = <?php echo json_encode($products); ?>;
	// console.log(products);
	var document_code = <?php echo json_encode($document_code); ?>;
	var buys = [];
	loadList();

	function loadList() {
		html = '';
		for (let index = 0; index < products.length; index++) {
			html += '<tr>';
			html +=
				'<td style="padding-left: 2px;"><button type="button" class="btn btn-block block theme"></button></div></td>';
			html += '<td style="padding-left: 30px; padding-top: 20px;"><h4>' + products[index]['product_name'] + '</h4>';
			html += '<input id="count_' + products[index]['product_code'] + '" onchange="change_count(\'' + products[index]
				['product_code'] + '\')" type="number" style="width: 50px;" value="' + products[index]['quantity'] +
				'">&nbsp;&nbsp;&nbsp;' + products[index]['unit'] + '<br><br>';
			html += 'Subtotal : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="subtotal" id="subtotal_' + products[index][
				'product_code'
			] + '">' + rupiah(parseInt(products[index]['price']) * parseInt(products[index]['quantity'])) + '</span>';
			html += '<br><br></tr>';
		}
		total();
		document.getElementById("table_list").innerHTML = html;
	}

	function rupiah(number) {
		return Intl.NumberFormat("id-ID", {
			style: "currency",
			currency: "IDR"
		}).format(number);
	}

	function total() {
		var sum = 0;
		for (let i = 0; i < products.length; i++) {
			sum += parseInt(products[i]['sub_total']);
		}

		document.getElementById('total').innerHTML = rupiah(sum);
		return sum;
	}

	function change_count(code) {
		var count_ = document.getElementById('count_' + code).value;
		var i = 0;
		for (; i < products.length; i++) {
			if (code == products[i]['product_code']) {
				products[i]['quantity'] = count_;
				products[i]['sub_total'] = parseInt(getProduct(code)['price']) * count_;
				break;
			}
		}
		document.getElementById('subtotal_' + code).innerHTML = rupiah(parseInt(products[i]['price']) * count_);
		total();

	}

	function getProduct(code) {
		for (let index = 0; index < products.length; index++) {
			if (products[index]['product_code'] == code) {
				return products[index];
			}
		}
	}

	function confirm() {
		update_header(total());
		for (let i = 0; i < products.length; i++) {
			var p = products[i];
			update_tran(p['product_code'], p['quantity'], p['sub_total']);
		}

		window.location.href = "<?php echo site_url('transaction/done/'); ?>" + document_code;
	}

	function update_tran(code, qty, sub_total) {
		$.ajax({
			async: false,
			type: "POST",
			url: "<?= site_url('transaction/update_tran_detail/'); ?>" + code + "/" + document_code + "/" + qty +
				"/" + sub_total,
			success: function (data) {}
		});
	}

	function update_header(total) {
		$.ajax({
			async: false,
			type: "POST",
			url: "<?= site_url('transaction/update_tran_header/'); ?>" + document_code + "/" + total,
			success: function (data) {}
		});
	}

</script>
