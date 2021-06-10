<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
		.table-data
		{
			width: 100%;
			border-collapse: collapse;
		}
		.table-data tr th,
		.table-data tr td
		{
			border:1px solid black;
			font-size: 11pt;
			font-family:Verdana;
			padding: 10px 10px 10px 10px;
		}
		h3
		{
			font-family:Verdana;
		}
	</style>
	<h3><center>Laporan Data Product Toko BabyMetal</center></h3>
	<br/>
	<table class="table-data">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Harga</th>
				<th>Satuan</th>
				<th>Photo</th>
				<th>Deskripsi</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach($product as $product){
			?>
			<tr>
				<th scope="row"><?= $no++; ?></th>
				<td><?= $product['name']; ?></td>
				<td><?= $product['price']; ?></td>
				<td><?= $product['nama_satuan']; ?></td>
				<td><?= $product['image']; ?></td>
				<td><?= $product['description']; ?></td>
				<td><?= $product['']; ?></td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
<script type="text/javascript">
window.print();
</script>
</body>
</html>