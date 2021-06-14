<div class="container">
<center>
<table>
<?php
foreach ($useraktif as $u) {
?>
<tr>
<td nowrap>Terima Kasih <b><?= $u->nama; ?></b>
</td>
</tr>
<tr>
<td>Merch yang anda order adalah sebagai berikut:</td>
</tr>
<?php } ?>
<tr>
<td>
<div class="table-responsive">
<table class="table table-bordered table-striped tablehover" id="table-datatable">
	<tr>
<th>Nama</th>
<th>Product</th>
<th>harga</th>
<th>Qty</th>
<th>deskripsi</th>
</tr>
<?php
$no = 1;
foreach ($item as $i) {
?>
<tr>
<td><?= $no; ?></td>
<td>
<img src="<?= base_url('assets/img/product/'); ?>" width="10%">
</td>
<td><?= $i['product_id']; ?></td>
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
<td>
<a class="btn btn-sm btn-outlinedanger" onclick="information('Waktu pembayaran 1x24 Jam dari Order!!!')"
href="<?php echo base_url() . 'order/exportToPdf/' . $this->session->userdata('id_user'); ?>"><span class="far fa-lg fa-fw fa-filepdf"></span> Pdf</a>
</td>
</tr>
</table>
</center>
</div>