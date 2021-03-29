<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="card shadow mb-3">
		<div class="card-header">
			<a href="<?php echo site_url('product') ?>"><i class="fas fa-arrow-left"></i> Back</a>
		</div>
		<div class="card-body">

			<form action="<?php base_url('product/add') ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Name*</label>
					<input class="form-control" type="text" name="name" placeholder="Product name" />
					<div class="invalid-feedback">
					<?php form_error('name', '<small class="text-danger pl-3">', '</small>'); ?> 
					</div>
				</div>

				<div class="form-group">
					<label for="price">Harga*</label>
					<input class="form-control" type="number" name="price" min="0" placeholder="Product price" />
					<div class="invalid-feedback">
					<?php form_error('price', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="satuan">Satuan*</label>
					<select class="form-control" name="satuan" id="satuan">
						<option></option>
						<?php foreach ($satuan as $list_satuan) : ?>
							<option value="<?php echo $list_satuan->satuan_id ?>"><?php echo $list_satuan->nama_satuan ?></option>
						<?php endforeach; ?>
					</select>
					<div class="invalid-feedback">
					<?php form_error('satuan', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="name">Photo</label>
					<input class="form-control-file" type="file" name="image" />
					<div class="invalid-feedback">
					<?php form_error('image', '<small class="text-danger pl-3">', '</small>'); ?> 
					</div>
				</div>

				<div class="form-group">
					<label for="name">Deskripsi*</label>
					<textarea class="form-control" name="description" placeholder="Product description..."></textarea>
					<div class="invalid-feedback">
					<?php form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>

				<input class="btn btn-success" type="submit" name="btn" value="Save" />
			</form>

		</div>

		<div class="card-footer small text-muted">
			* required fields
		</div>
	</div>