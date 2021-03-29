<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Card  -->
	<div class="card shadow mb-3">
		<div class="card-header">

			<a href="<?php echo site_url('product') ?>"><i class="fas fa-arrow-left"></i>
				Back</a>
		</div>
		<div class="card-body">

			<form action="<?php base_url("product/edit") ?>" method="post" enctype="multipart/form-data">

				<input type="hidden" name="id" value="<?php echo $product->product_id ?>" />

				<div class="form-group">
					<label for="name">Name*</label>
					<input class="form-control <?php echo form_error('name') ? 'is-invalid' : '' ?>" type="text" name="name" placeholder="Product name" value="<?php echo $product->name ?>" />
					<div class="invalid-feedback">
						<?php echo form_error('name') ?>
					</div>
				</div>

				<div class="form-group">
					<label for="price">Harga</label>
					<input class="form-control <?php echo form_error('price') ? 'is-invalid' : '' ?>" type="number" name="price" min="0" placeholder="Product price" value="<?php echo $product->price ?>" />
					<div class="invalid-feedback">
						<?php echo form_error('price') ?>
					</div>
				</div>

				<div class="form-group">
					<label for="satuan">Satuan</label>
					<select class="form-control <?php echo form_error('satuan') ? 'is-invalid' : '' ?>" name="satuan" id="satuan">
					<?php foreach ($satuan as $_satuan) { ?>
						<option <?php if($_satuan->satuan_id == $product->satuan_id){ echo 'selected="selected"'; } ?> value="<?php echo $_satuan->satuan_id ?>"><?php echo $_satuan->nama_satuan ?></option>
					<?php } ?>
					</select>
					<div class="invalid-feedback">
						<?php echo form_error('satuan') ?>
					</div>
				</div>

				<div class="form-group">
					<label for="name">Photo</label>
					<input class="form-control-file <?php echo form_error('image') ? 'is-invalid' : '' ?>" type="file" name="image" />
					<input type="hidden" name="old_image" value="<?php echo $product->image ?>" />
					<div class="invalid-feedback">
						<?php echo form_error('image') ?>
					</div>
				</div>

				<div class="form-group">
					<label for="name">Deskripsi*</label>
					<textarea class="form-control <?php echo form_error('description') ? 'is-invalid' : '' ?>" name="description" placeholder="Product description..."><?php echo $product->description ?></textarea>
					<div class="invalid-feedback">
						<?php echo form_error('description') ?>
					</div>
				</div>

				<input class="btn btn-success" type="submit" name="btn" value="Save" />
			</form>

		</div>

		<div class="card-footer small text-muted">
			* required fields
		</div>
	</div>