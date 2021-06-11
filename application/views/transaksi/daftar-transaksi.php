<div class="container">
	<center>
		<table>
			<tr>
				<td>
					<div class="table-responsive full-width">
						<table class="table table-bordered table-striped tablehover" id="table-datatable">
							<tr>
								<th>No.</th>
								<th>ID Transaksi</th>
								<th>Tanggal Transaksi</th>
								<th>ID User</th>
								<th>Action</th>
								<th>Denda / Product /Hari</th>
								<th>Lama Pembelian</th>
								</tr>
								<?php
								$no = 1;
								foreach ($order as $order)
									{
										?>
										<tr>
											<td><?= $no; ?></td>
											<td><a class="btn btnlink" href="<?= base_url('order/transaksiDetail/' . $p['id_transaksi']); ?>"><?= $p['id_transaksi']; ?></a></td>
											<td><?= $p['tgl_transaksi']; ?></td>
											<td><?= $p['id_user']; ?></td>
											<form action="<?= base_url('order/orderAct/' . $p['id_transaksi']); ?>" method="post">
												<td nowrap>
													<button type="submit" class="btn btnsm btn-outline-info"><i class="fas fa-fw fa-cart-plus"></i> Order</button>
												</td>
												<td>
													<input class="form-checkuser roundedsm" style="width:100px" type="text" name="denda" id="denda" value="5000">
													<?= form_error(); ?>
												</td>
												<td>
													<input class="form-checkuser rounded-sm" style="width:100px" type="text" name="lama" id="lama" value="3">
													<?= form_error(); ?>
												</td>
											</form>
										</tr>
										<?php
										$no++;
									} ?>
								</table>
							</div>
						</td>
					</tr>
					<tr>
						<td align="center">
							<a href="<?= base_url('order/daftarTransaksi');?>" class="btn btn-link">
								<i class="fas fa-fw fa-refresh"></i> Refresh</a>
							</td>
						</tr>
					</table>
				</center>
			</div>