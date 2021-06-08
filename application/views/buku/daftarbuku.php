<?= $this->session->flashdata('pesan'); ?>
<div style="padding: 25px;">
    <div class="x_panel">
        <div class="x_content">
            <!-- Tampilkan semua produk -->
            <div class="row">
                <!-- looping products -->
                <?php foreach ($buku as $buku) { ?>
                <div class="col-md-2 col-md-3">
                    <div class="thumbnail" style="height: 370px;">
                        <img src="<?php echo base_url(); ?>assets/img/upload/<?= $buku->image; ?>" style="max-width:100%; maxheight: 100%; height: 200px; width: 180px">
                            <div class="caption">
                            <h5 style="min-height:30px;"><?= $buku->pengarang ?></h5>
                            <h5><?= $buku->penerbit ?></h5>
                            <h5><?= substr($buku->tahun_terbit, 0, 4) ?></h5>
                            <br>
                            <p>
                                <?php if ($buku->stok < 1) {
                                     echo "<i class='tombolbooking'> Booking&nbsp;&nbsp 0</i>";
                                     } else {
                                     echo "<a class='tombolbooking' href='" . base_url('booking/tambahBooking/' . $buku->id) . "'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Booking</a>";
                                     }
                                    ?>
                                <a class="tomboldetail" href="<?= base_url('home/detailBuku/' . $buku->id); ?>"><i class='fa fa-search' aria-hidden='true'></i> Detail</a>
                            </p>
                        </div>
                    </div><br>
                </div>
                <?php } ?>
                <!-- end looping -->
            </div>
        </div>
    </div>
</div>