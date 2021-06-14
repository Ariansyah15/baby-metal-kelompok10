<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Transaksi.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
    <h3><center>Laporan Transaksi Toko BabyMetal</center></h3>
    <br/>
    <table class="table-data">
        <thead>
            <tr>
            <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Tanggal Transaksi</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Total Harga Barang</th>
                <th>user</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $no = 1;
            foreach ($transaksi as $b) { ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $b->name; ?></td>
                    <td><?= $b->description; ?></td>
                    <td><?= $b->tgl_transaksi; ?></td>
                    <td><?= $b->price; ?></td>
                    <td><?= $b->qty; ?></td>
                    <td><?= $b->price*$b->qty; ?></td>
                    <td><?= $b->nama; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>