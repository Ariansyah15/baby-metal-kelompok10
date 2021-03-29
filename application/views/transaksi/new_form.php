<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<a href="<?php echo site_url('transaksi') ?>"><i class="fas fa-arrow-left"></i> Back</a>
	</div>
	<form action="<?php base_url('transaksi/add') ?>" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-lg-6">
				<div class="card shadow mb-4">
					<div class="card-header">
						INFORMASI PEMESAN
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="name">Pemesan</label>
							<select class="form-control" name="user_id" id="user_id" readonly>
								<option value="<?php echo $user['id']; ?>"><?php echo $user['nama']; ?></option>
							</select>

						</div>
						<div class="form-group">
							<label for="name">Tanggal Transaksi</label>
							<input class="form-control" type="text" name="tgl_transaksi" value="<?php echo date(" Y/m/d "); ?>" readonly />
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card shadow mb-4">
					<div class="card-header">
						INPUT PESANAN
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="product">Product*</label>
							<select class="form-control" name="product_id" id="product_id">
								<option></option>
								<?php foreach ($product as $list_product) : ?>
									<option value="<?php echo $list_product->product_id ?>">
										<?php echo $list_product->name ?>
									</option>
								<?php endforeach; ?>
							</select>
							<div class="invalid-feedback">
								<?php form_error('product_id', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="price">Harga</label>
							<select class="form-control" name="price" id="price" readonly>
							</select>

						</div>

						<div class="form-group">
							<label for="satuan">Satuan</label>
							<select class="form-control" name="satuan_id" id="satuan_id" readonly>
							</select>
						</div>

						<div class="form-group">
							<label for="qty">Qty*</label>
							<input class="form-control" type="text" name="qty" placeholder="Input jumlah pesanan" id="qty" />
							<div class="invalid-feedback">
								<?php form_error('qty', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="address">Alamat*</label>
							<textarea class="form-control" name="address" placeholder="Alamat"></textarea>
							<div class="invalid-feedback">
								<?php form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="description">Deskripsi</label>
							<textarea class="form-control" name="description" placeholder="(Optional)"></textarea>
						</div>

						<div class="form-group">
							<label for="total_price">Total Pembayaran</label>
							<input class="form-control" type="text" name="total_price" id="total_price" readonly />
						</div>

						<input class="btn btn-success" type="submit" name="btn" value="Save" />
					</div>
					<div class="card-footer small text-muted">
						* required fields
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#product_id').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo site_url('transaksi/get_product'); ?>",
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					var html = '';
					var html1 = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option value=' + data[i].price + '>' + data[i].price + '</option>';
					}
					for (i = 0; i < data.length; i++) {
						html1 += '<option value=' + data[i].satuan_id + '>' + data[i].nama_satuan + '</option>';
					}
					$('#price').html(html);
					$('#satuan_id').html(html1);
				}
			});
			return false;
		});

		var $fields = $("#qty");
		$fields.on('keyup change', function() {
			var qty = document.getElementById("qty").value;
			var price = document.getElementById("price").value;
			var total_price = price * qty;
			if (allFilled($fields)) {
				document.getElementById("total_price").value = total_price;
			} else {
				document.getElementById("total_price").value = '';
			}
		});

		function allFilled($fields) {
			return $fields.filter(function() {
				return this.value === '';
			}).length == 0;
		}
	});
</script>