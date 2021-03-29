<!-- Begin Page Content -->
<div class="container-fluid">
<?php if ($this->session->flashdata('success')) : ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
		</div>
	<?php endif; ?>
	<!-- DataTables -->
	<div class="card mb-3">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Photo</th>
                            <th>Role</th>
                            <th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($user_list as $data_user) : ?>
							<tr>
								<td width="150">
									<?php echo $data_user->nama ?>
								</td>
								<td>
                                    <?php echo $data_user->email ?>
								</td>
								<td>
									<img src="<?php echo base_url('assets/img/profile/' . $data_user->image) ?>" width="64" />
								</td>
								<td>
                                    <?php echo $data_user->role ?>
                                </td>
                                <td>
                                    <?php if ($data_user->is_active == 1) {
                                        echo 'Active'; 
                                    } else { echo 'Not Active'; }?>
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