<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit Product
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('barang') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Back
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open('product/edit/' . $product['product_code'], ['class' => 'edit-product-form']); ?>
                <div class="form-group">
                    <label for="product_code">Product Code</label>
                    <input value="<?= $product['product_code']; ?>" name="product_code" id="product_code" type="text" class="form-control" placeholder="Product Code">
                </div>
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input value="<?= ucwords(strtolower($product['product_name'])); ?>" name="product_name" id="product_name" type="text" class="form-control" placeholder="Product Name">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input value="<?= $product['price']; ?>" name="price" id="price" type="text" class="form-control" placeholder="Price">
                </div>
                <div class="form-group">
                    <label for="currency">Currency</label>
                    <input value="<?= $product['currency']; ?>" name="currency" id="currency" type="text" class="form-control" placeholder="Currency">
                </div>
                <div class="form-group">
                    <label for="disc">Discount</label>
                    <input value="<?= $product['disc']; ?>" name="disc" id="disc" type="text" class="form-control" placeholder="Discount">
                </div>
                <div class="form-group">
                    <label for="dimension">Dimension</label>
                    <input value="<?= $product['dimension']; ?>" name="dimension" id="dimension" type="text" class="form-control" placeholder="Dimension">
                </div>
                <div class="form-group">
                    <label for="unit">Unit</label>
                    <input value="<?= $product['unit']; ?>" name="unit" id="unit" type="text" class="form-control" placeholder="Unit">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Edit</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
