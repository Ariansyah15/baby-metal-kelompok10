<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- row ux-->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-uppercase mb-1">Total Anggota</div>
                            <div class="h1 mb-0 font-weight-bold"><?php echo $total_anggota->id ?></div>
                        </div>
                        <div class="col-auto"> <a href="<?= base_url('user/anggota'); ?>"><i class="fas fa-users fa-3x text-success"></i></a> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-uppercase mb-1">Total Product</div>
                            <div class="h1 mb-0 font-weight-bold "><?php echo $total_product->product_id ?></div>
                        </div>
                        <div class="col-auto"> <a href="<?= base_url('user/anggota'); ?>"><i class="fas fa-apple-alt fa-3x text-success"></i></a> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-uppercase mb-1">Total Transaksi</div>
                            <div class="h1 mb-0 font-weight-bold "><?php echo $total_transaksi->transaksi_id ?></div>
                        </div>
                        <div class="col-auto"> <a href="<?= base_url('user/anggota'); ?>"><i class="fas fa-shopping-basket fa-3x text-success"></i></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end row ux-->
</div> <!-- /.container-fluid -->
</div> <!-- End of Main Content -->