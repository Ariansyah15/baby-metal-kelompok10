<div class="container">
	<center>
		<table>
			<?php foreach ($agt_transaksi as $ab) { ?>
				<tr>
					<td>Data Anggota</td>
					<td>:</td>
					<th><?= $ab['nama']; ?></th>
				</tr>
				<tr>
					<td>ID Transaksi</td>
					<td>:</td>
					<th><?= $ab['id_transaksi']; ?></th>
				</tr>
			<?php } ?>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3">
					<hr>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<div class="table-responsive full-width">
						<table class="table table-bordered table-striped tablehover" id="table-datatable">
							<tr>
								<th>No.</th>
								<th>Nama</th>
								<th>Harga</th>
								<th>Satuan</th>
								<th>Photo</th>
								<th>Deskripsi</th>
							</tr>
							<?php
							$no = 1;
							foreach ($detail as $d) {
								?>
								<tr>
									<td><?= $no; ?></td>
									<td><?= $d['name']; ?></td>
									<td><?= $d['price']; ?></td>
									<td><?= $d['nama_satuan']; ?></td>
									<td><?= $d['image']; ?></td>
									<td><?= $d['description']; ?></td>
								</tr>
								<?php $no++;
							} ?>
						</table>
					</div>
				</td>
			</tr>
			<tr>
				<td align="center" colspan="3"><a href="#" onclick="window.history.go(-1)" class="btn btn-outline-dark">
					<i class="fas fa-fw fareply"></i> Kembali</a></td>
			</tr>
		</table>
	</center>
</div>