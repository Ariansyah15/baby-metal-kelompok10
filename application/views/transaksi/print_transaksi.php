print<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px 10px 10px 10px;
        }

        h3 {
            font-family: Verdana;
        }
    </style>
    <h3>
        <center>Laporan Transaksi Toko BabyMetal</center>
    </h3>
    <br />
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
    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>