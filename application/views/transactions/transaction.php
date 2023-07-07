<div id="layoutSidenav_content">
	<main>
		<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
			<div class="container-xl px-4">
				<div class="page-header-content pt-4">
					<div class="row align-items-center justify-content-between">
						<div class="col-auto mt-4">
							<h1 class="page-header-title">
								<div class="page-header-icon"><i data-feather="filter"></i></div>
								List Inventory
							</h1>
							<div class="page-header-subtitle">An extension of the Simple DataTables library, customized for SB Admin Pro</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Main page content-->
		<div class="container-xl px-4 mt-n10">
			<div class="card mb-4">
				<div class="card-header">List Inventory</div>
				<div class="card-body">
					<div class="container">
						<?= $this->session->flashdata('message'); ?>
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th scope="col">No.</th>
										<th scope="col">Nama Barang</th>
										<th scope="col">Image</th>
										<th scope="col">Jumlah Barang</th>
										<th scope="col">Harga</th>
										<th scope="col">status</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>

									<?php $no = 1;
									foreach ($transactions as $transaction) : ?>
										<tr>
											<td> <?= $no++ ?> </td>
											<td> <?= $transaction['nama_barang'] ?> </td>
											<td> <img class="" height="50px" src="<?= base_url('public/assets/img/inventory/');
																														?><?= $transaction['image'] ?>" alt=""> </td>
											<td> <?= $transaction['jumlah_barang_transaction'] ?> <?= $transaction['satuan_barang'] ?> </td>
											<td> <?= $transaction['harga_beli'] ?> </td>
											<td>
												<?php if ($transaction['status'] == 0) : ?>
													<span class="badge text-bg-primary">Dipakai</span>
												<?php else : ?>
													<span class="badge text-bg-success">Dikembalikan</span>
												<?php endif; ?>
											</td>
											<td class="d-flex gap-2 flex-wrap">
												<form action="return/<?= $transaction['id_transaction'] ?>/<?= $transaction['id_barang'] ?>/<?= $transaction['jumlah_barang_transaction'] ?>" method="post">
													<button type="submit" class="btn btn-sm btn-warning">
														<i class="fa fa-pencil-square me-2"></i> Kembalikan
													</button>
												</form>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>