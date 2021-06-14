<table border=1>
<?php
foreach ($useraktif as $u) {
?>
<tr>
<th>Nama Member : <?= $u->nama; ?></th>
</tr>
<tr>
<th>Product Yang di Order:</th>
</tr>
<?php } ?>
<tr>
<td>
<div class="table-responsive">
<table border=1>
	<tr>
<th>Nama</th>
<th>Product</th>
<th>harga</th>
<th>deskripsi</th>
</tr>
<?php
$no = 1;
foreach ($item as $i) {
?>
<tr>
<td><?= $no; ?></td>
<td>
<?= $i['name']; ?>
</td>
<td><?= $i['product_id']; ?></td>
<td><?= $i['penerbit']; ?></td>
<td><?= $i['price']; ?></td>
<td><?= $i['description']; ?></td>
</tr>
<?php $no++;
} ?>
</table>
</div>
</td>
</tr>
<tr>
<td>
<hr>
</td>
</tr>
<tr>
<td align="center">
<?= md5(date('d M Y H:i:s')); ?>
</td>
</tr>
</