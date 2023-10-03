<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Add Product
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('product') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('product/add'); ?>

                <div class="row form-group">
                    <label class="col-md-3" for="product_code">Product Code</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('product_code'); ?>" name="product_code" id="product_code" type="text" class="form-control" placeholder="Product Code...">
                        <?= form_error('product_code', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3" for="product_name">Product Name</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('product_name'); ?>" name="product_name" id="product_name" type="text" class="form-control" placeholder="Product Name...">
                        <?= form_error('product_name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3" for="price">Price</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('price'); ?>" name="price" id="price" type="text" class="form-control" placeholder="Price...">
                        <?= form_error('price', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3" for="currency">Currency</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('currency'); ?>" name="currency" id="currency" type="text" class="form-control" placeholder="Currency...">
                        <?= form_error('currency', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3" for="disc">Discount</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('disc'); ?>" name="disc" id="disc" type="text" class="form-control" placeholder="Discount...">
                        <?= form_error('disc', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3" for="dimension">Dimension</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('dimension'); ?>" name="dimension" id="dimension" type="text" class="form-control" placeholder="Dimension...">
                        <?= form_error('dimension', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3" for="unit">Unit</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('unit'); ?>" name="unit" id="unit" type="text" class="form-control" placeholder="Unit...">
                        <?= form_error('unit', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                        <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
