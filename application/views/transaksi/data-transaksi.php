<div class="container">
    <center>
        <table>
            <tr>
                <td>
                    <div class="table-responsive full-width">
                        <table class="table table-bordered table-striped tablehover" id="table-datatable">
                            <tr>
                                <th>No.</th>
                                <th>Image</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total Harga Barang</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($tempList as $t) {
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td>
                                        <img src="<?= base_url('assets/img/product/' . $t['image']); ?>" class="rounded" alt="No Picture" width="50%">
                                    </td>
                                    <td nowrap><?= $t['name']; ?></td>
                                    <td nowrap><?= $t['price']; ?></td>
                                    <td nowrap><?= $t['qty']; ?></td>
                                    <td nowrap><?= $t['price']*$t['qty']; ?></td>
                                    <td nowrap><?= $t['description']; ?></td>
                                    <td nowrap>
                                        <a href="<?= base_url('order/hapusOrder/'.$t['product_id']); ?>"><i class="btn btn-sm btn-outline-danger fas fw fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php $no++;
                            }
                            ?>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <a class="btn btn-sm btn-outline-primary" href="<?php echo base_url(); ?>"><span class="fas fw fa-play"></span> Lanjutkan Order Merchandise</a>
                    <a class="btn btn-sm btn-outline-success" href="<?php echo base_url().'order/orderSelesai/'.$this->session->userdata('id'); ?>"><span class="fas fw fa-stop"></span> Selesaikan Order</a>
                </td>
                </hr>
            </tr>
        </table>
    </center>
</div>