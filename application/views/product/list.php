<!-- Begin Page Content -->
<div class="container-fluid">
<?php if ($this->session->flashdata('success')) : ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
		</div>
	<?php endif; ?>
	<!-- DataTables -->
	<div class="card mb-3">
		<div class="card-header">
			<a href="<?php echo site_url('product/add') ?>"><i class="fas fa-plus"></i> Tambah Product</a>
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Name</th>
							<th>Harga</th>
							<th>Satuan</th>
							<th>Photo</th>
							<th>Deskripsi</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($products as $product) : ?>
							<tr>
								<td width="150">
									<?php echo $product->name ?>
								</td>
								<td>
								Rp. <?php echo number_format($product->price) ?>
								</td>
								<td>
									<?php echo $product->nama_satuan ?>
								</td>
								<td>
									<img src="<?php echo base_url('assets/img/product/' . $product->image) ?>" width="64" />
								</td>
								<td class="small">
									<?php echo substr($product->description, 0, 120) ?>...</td>
								<td width="250">
									<a href="<?php echo site_url('product/edit/' . $product->product_id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
									<a onclick="deleteConfirm('<?php echo site_url('product/delete/' . $product->product_id) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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