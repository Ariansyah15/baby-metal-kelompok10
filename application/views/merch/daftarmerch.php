<?= $this->session->flashdata('pesan'); ?>
<div style="padding: 25px;">
    <div class="x_panel">
        <div class="x_content">
            <!-- Tampilkan semua produk -->
            <div class="row">
                <!-- looping products -->
                <?php foreach ($merch as $bh) { ?>
                    <div class="col-md-2 col-md-3">
                    <form method="post" action="<?= base_url('order/tambahOrder'); ?>">
                        <div class="thumbnail" style="height: 370px;">
                            <img src="<?php echo base_url(); ?>assets/img/product/<?= $bh->image; ?>" style="max-width:100%; max-height: 100%; height: 200px; width: 180px">
                            <div class="caption">
                                <h5 style="min-height:30px;"><?= $bh->name ?></h5>
                                <h5>Harga : <?= $bh->price ?></h5>
                                <h5>Deskripsi : <?= $bh->description ?></h5>
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="qty" id="qty" placeholder="Qty" value="1" />
                                    </div>
                                    <p>
                                        <input class="form-control" type="hidden" name="product_id" id="product_id" value="<?= $bh->product_id; ?>" />
                                        <button type="submit" class="btn btn-success btn-user btn-block"> Tambah Keranjang </button>
                                    </p>
                            </div>
                        </div>
                    </form>
                    </div> <?php } ?>
                <!-- end looping -->
            </div>
        </div>
    </div>
</div>