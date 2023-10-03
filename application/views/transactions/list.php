<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

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
	<?= $this->session->flashdata('pesan'); ?>
		<div class="card">
			<div class="card-body">
				<div class="text-center mb-4">
					<span class="dot theme"></span>
					<span class="dot"></span>
					<span class="dot"></span>
				</div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Product</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="table_list">
						<!-- Your product listing rows will be dynamically added here -->
					</tbody>
				</table>
				<div class="text-center">
					<button type="button" onclick="checkout()" id="checkout" class="btn btn-primary btn-block" disabled>Checkout</button>
					<!-- <button type="button" onclick="report()" id="report-btn" class="btn btn-secondary ml-2">Report -->
						</button>
				</div>
			</div>
		</div>
	</div>

	<div class="row mt-4" hidden id="detail">
		<div class="col-md-6 mx-auto">
			<div class="card">
				<div class="card-body">
					<h4 class="text-center">PRODUCT DETAIL</h4>
					<div class="row">
						<div class="col-md-6 text-center">
							<div class="rounded-circle theme p-4" style="width: 150px; height: 150px;"></div>
						</div>
						<div class="col-md-12">
							<h4 id="detail-nama">Product Name</h4>
							<span id="detail-discount">Discounted Price</span><br>
							<span id="detail-price">Original Price</span><br>
							<span id="detail-dimension">Dimension</span><br>
							<span id="detail-unit">Unit</span>
						</div>
						<div class="col-md-6 text-right mt-3">
							<button id="buy_detail" class="btn btn-primary " onclick="buyDetail()">Buy</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script>
    var products = <?php echo json_encode($products); ?>;
    var buys = [];
    // console.log(products);
    loadList();

    function report() {
        window.location.href = "<?php echo site_url('transaction/report/'); ?>";
    }

    function loadList() {
        html = '';
        for (let index = 0; index < products.length; index++) {
            html += '<tr>';
            html += '<td style="padding-right: 10px;"><button type="button" class="btn btn-block block theme" onclick="detail(\'' + products[index]['product_code'] + '\')"></button></div></td>';
            html += '<td style="padding-right: 50px;">' + products[index]['product_name'] + '<br>';

            strike = "";
            strike2 = "";
            if (products[index]['disc'] != 0) {
                strike = "<s>";
                strike2 = "</s>";
            }
            html += strike + rupiah(parseInt(products[index]['price'])) + strike2 + '<br>';
            html += (products[index]['disc'] != 0) ? rupiah(products[index]['price'] - (products[index]['price'] * products[index]['disc'] / 100)) : '&nbsp';
            html += '<td><button type="button" onclick="buy(\'' + products[index]['product_code'] + '\')" id="buy_' + products[index]['product_code'] + '" class="buy-btn btn btn-block mb-6 rounded-pill" style="width: 60px; color:white; background-color: #3bc9f5;">BUY</button></td>';
        }
        document.getElementById("table_list").innerHTML = html;
    }

    function buy(code) {
        document.getElementById('buy_' + code).innerHTML = "X";
        document.getElementById('buy_' + code).setAttribute("onClick", "javascript: cancel('" + code + "');");
        // document.getElementById('checkout').disabled = false;
        buys.push(code);
        setCheckout();
        closeDetail()
        console.log('buy', code);
    }

    function cancel(code) {
        document.getElementById('buy_' + code).innerHTML = "BUY";
        document.getElementById('buy_' + code).setAttribute("onClick", "javascript: buy('" + code + "');");
        console.log('sell', code);
        const index = buys.indexOf(code);
        if (index > -1) {
            buys.splice(index, 1);
        }
        setCheckout();
        closeDetail()
        console.log('buy', code);
    }

    function setCheckout() {
        document.getElementById('checkout').disabled = buys.length == 0;
        console.log(buys.length, buys.length > 1);
    }

    function detail(code) {
        document.getElementById("detail").hidden = false;
        $.ajax({
            type: "GET",
            url: "<?= site_url('transaction/get_detail/'); ?>" + code,
            success: function(data) {
                data = JSON.parse(data);
                console.log(data);
                document.getElementById('detail-nama').innerHTML = data.product_name;
                
                strike = "";
                strike2 = "";
                if (data.discount != '0') {
                    strike = "<s>";
                    strike2 = "</s>";
                }

                strike + rupiah(parseInt(data.price)) + strike2 + '<br>';

                document.getElementById('detail-discount').innerHTML = strike + rupiah(parseInt(data.price))  + strike2 + '<br>';
                document.getElementById('detail-price').innerHTML = (data.discount != 0) ? rupiah((parseInt(data.price) - (parseInt(data.price) * parseInt(data.discount) / 100))) : '&nbsp';
                document.getElementById('detail-dimension').innerHTML = "Dimension : "+data.dimension;
                document.getElementById('detail-unit').innerHTML = "Price Unit : ",data.unit;
                var buy_button = document.getElementById('buy_'+ data.product_code);
                if (buy_button.innerHTML == "BUY"){
                    document.getElementById('buy_detail').setAttribute("onClick", "javascript: buy('" + data.product_code + "');");
                }else{
                    document.getElementById('buy_detail').setAttribute("onClick", "javascript: cancel('" + data.product_code + "');");
                }
                document.getElementById('buy_detail').innerHTML = buy_button.innerHTML;
            }
        });
    }

    function closeDetail(){
        document.getElementById("detail").hidden = true;
    }

    function rupiah(number){
        return Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(number) ;
    }

		function checkout() {
        var doc_code = ''+(new Date()).getTime();
        doc_code = doc_code.substr(-12);
        save_header(doc_code);
        for (let i = 0; i < buys.length; i++) {
            save_tran(buys[i], doc_code);
        }
        closeDetail();
        window.location.href = "<?php echo site_url('transaction/checkout/'); ?>"+doc_code;
    }

    function save_header(doc_code) {
        $.ajax({
            async:false,
            type: "POST",
            url: "<?= site_url('transaction/save_tran_header/'); ?>" + doc_code,
            success: function(data) {}
        });
    }

    function save_tran(code, doc_code) {
        $.ajax({
            async:false,
            type: "POST",
            url: "<?= site_url('transaction/save_tran_detail/'); ?>" + code + "/" + doc_code,
            success: function(data) {}
        });
    }

</script>
