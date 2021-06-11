<div class="container">
	<center>
		<table>
			<tr>
				<td>
					<div class="table-responsive full-width">
						<table class="table table-bordered table-striped tablehover" id="table-datatable">
							<tr>
								<th>No Order</th>
								<th>Tanggal Order</th>
								<th>ID User</th>
								<th>ID Product</th>
								
							</tr>
							<?php
							foreach ($order as $order) {
								?>
								<tr>
									<td><?= $p['no_order']; ?></td>
									<td><?= $p['tgl_order']; ?></td>
									<td><?= $p['id_user']; ?></td>
									<td><?= $p['id_product']; ?></td>
									
										<?php } ?>
									</td>
								</tr>
							<?php } ?>
						</table>
					</div>
				</td>
			</tr>
		</table>
	</center>
</div>