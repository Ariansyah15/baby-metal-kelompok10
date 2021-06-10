<!-- Begin Page Content -->
<div class="container-fluid">
	<?= $this->session->flashdata('pesan'); ?>
	<div class="row">
		<div class="col-lg-12">
			<?php if(validation_errors()){?>
				<div class="alert alert-danger" role="alert">
				<?= validation_errors();?>
				</div>
			<?php }?>
			<?= $this->session->flashdata('pesan'); ?>
			<a href="<?= base_url('laporan/cetak_laporan_product'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
			<a href="<?= base_url('laporan/laporan_product_pdf'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>
			<a href="<?= base_url('laporan/export_excel'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Export ke Excel</a>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama</th>
						<th scope="col">Harga</th>
						<th scope="col">Satuan</th>
						<th scope="col">Photo</th>
						<th scope="col">Deskripsi</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$a = 1;
					foreach ($product as $product) { ?>
						<tr>
							<th scope="row"><?= $a++; ?></th>
							<td><?= $product['name']; ?></td>
							<td><?= $product['price']; ?></td>
							<td><?= $product['nama_satuan']; ?></td>
							<td><?= $product['image']; ?></td>
							<td><?= $product['description']; ?></td>
							<td><?= $product['']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->