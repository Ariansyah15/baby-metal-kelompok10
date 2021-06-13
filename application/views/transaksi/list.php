<!-- Begin Page Content -->
<div class="container-fluid">
<?php if ($this->session->flashdata('success')) : ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
		</div>
	<?php endif; ?>
	<!-- DataTables -->
	<div class="card mb-3">
		<div class="card-header" style="display: flex; justify-content: space-between;">
			<a href="<?php echo site_url('transaksi/add') ?>"><i class="fas fa-plus"></i> Buat Transaksi</a>
			<div style="display: flex;"><div style="text-align: right; margin-right: 10px;"><a class="btn btn-success btn-sm" href="<?php echo site_url('transaksi/printer') ?>"><i class="fas fa-print"></i> Print</a></div>
			<div style="text-align: right;"><a class="btn btn-info btn-sm" href="<?php echo site_url('transaksi/export_excel') ?>"><i class="fas fa-file-excel"></i> Export ke Excel</a></div></div>
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Pemesan</th>
							<th>Tanggal Transaksi</th>
							<th>Product</th>
							<th>Harga</th>
							<th>Qty</th>
							<th>Total Pembayaran</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($transaksi as $list_transaksi) : ?>
							<tr>
								<td>
								<?php echo $list_transaksi->nama ?>
								</td>
								<td>
								<?php echo $list_transaksi->tgl_transaksi ?>
								</td>
								<td>
									<?php echo $list_transaksi->name ?>
								</td>
								<td>
								Rp. <?php echo number_format($list_transaksi->price) ?>
								</td>
								<td>
									<?php echo $list_transaksi->qty ?>
								</td>
								<td>
								Rp. <?php echo number_format($list_transaksi->total_price) ?>
								</td>
								<td>
									<a href="<?php echo site_url('transaksi/edit/' . $list_transaksi->transaksi_id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
									<a onclick="deleteConfirm('<?php echo site_url('transaksi/delete/' . $list_transaksi->transaksi_id) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
								</td>
							</tr>
						<?php endforeach; ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>
<script>
	function deleteConfirm(url) {
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
</script>