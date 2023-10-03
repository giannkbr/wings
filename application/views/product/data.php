<?= $this->session->flashdata('pesan'); ?>

<div class="card shadow-sm border-bottom-primary">
	<div class="card-header bg-white py-3">
		<div class="row">

			<div class="col">
				<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
					Data Product
				</h4>
			</div>

			<div class="col-auto">
				<a href="<?= base_url('product/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
					<span class="icon">
						<i class="fa fa-plus"></i>
					</span>
					<span class="text">
						Add Product
					</span>
				</a>
			</div>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-striped w-100 dt-responsive nowrap" id="DataTable">
    <thead>
        <tr>
            <th>No.</th>
            <th>Product Code</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Currency</th>
            <th>Discount</th>
            <th>Dimension</th>
            <th>Unit</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // Initialize a counter for row numbers
        // Assuming $products is an array containing your product data
        foreach ($products as $b) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $b['product_code']; ?></td>
            <td><?= ucwords(strtolower($b['product_name'])); ?></td>
            <td>IDR <?= number_format($b['price'], 0, '.', '.'); ?></td>
            <td><?= $b['currency']; ?></td>
            <td><?= $b['disc']; ?></td>
            <td><?= $b['dimension']; ?></td>
            <td><?= $b['unit']; ?></td>
            <td>
                <a href="<?= base_url('product/edit/') . $b['product_code'] ?>"
                    class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                <a onclick="return confirm('Are you sure you want to delete data?')"
                    href="<?= base_url('product/delete/') . $b['product_code'] ?>"
                    class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

	</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" type="text/javascript"></script>

<script>
	$(document).ready(function () {
		var table = $('#DataTable').DataTable({
			buttons: ['copy', 'csv', 'print', 'excel', 'pdf'],
			dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
				"<'row'<'col-md-12'tr>>" +
				"<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
			lengthMenu: [
				[5, 10, 25, 50, -1],
				[5, 10, 25, 50, "All"]
			],
			columnDefs: [{
				targets: -1,
				orderable: false,
				searchable: false
			}]
		});

		table.buttons().container().appendTo('#DataTable_wrapper .col-md-5:eq(0)');

		$('#jenisFilter').on('change', function () {
			var val = $.fn.dataTable.util.escapeRegex(
				$(this).val()
			);

			table.column(2)
				.search(val ? '^' + val + '$' : '', true, false)
				.draw();
		});
	});

</script>
