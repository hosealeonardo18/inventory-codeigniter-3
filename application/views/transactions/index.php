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
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>

									<?php $no = 1;
									foreach ($transactions as $transaction) : ?>
										<tr>
											<td> <?= $no++ ?> </td>
											<td> <?= $transaction->nama_barang ?> </td>
											<td> <img class="" height="50px" src="<?= base_url('public/assets/img/inventory/');
																														?><?= $transaction->image ?>" alt=""> </td>
											<td> <?= $transaction->jumlah_barang ?> <?= $transaction->satuan_barang ?> </td>
											<td> <?= $transaction->harga_beli ?> </td>
											<td class="d-flex gap-2 flex-wrap">
												<button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editModal<?= $transaction->id_barang ?>">
													<i class="fa fa-pencil-square me-2"></i> Pakai
												</button>
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

	<?php foreach ($transactions as $list) : ?>
		<div class="modal fade" id="editModal<?= $list->id_barang ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $list->id_barang ?>" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="editModalLabel<?= $list->id_barang ?>">list Barang</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>

					<form action="dashboard/create/<?= $list->id_barang ?>" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<input type="text" class="form-control mb-3" placeholder="Kode Barang" name="kode_barang" value="<?= $list->kode_barang ?>" style="background-color:#F0F0F0;" readonly>

							<input type="text" class="form-control mb-3" placeholder="Nama Barang" name="nama_barang" value="<?= $list->nama_barang ?>" readonly style="background-color:#F0F0F0;">

							<div class="my-4">
								<img src="<?= base_url('public/assets/img/inventory/' . $list->image) ?>" alt="img" style="width: 100px; object-fit:cover; margin:auto;">
							</div>

							<input type="number" class="form-control mb-3" placeholder="Jumlah Barang" name="jumlah_barang" value="<?= $list->jumlah_barang ?>" min="0" max="<?= $list->jumlah_barang ?>">

							<div class="input-group mb-3">
								<span class="input-group-text">Rp.</span>
								<input type="number" class="form-control" id="harga" oninput="formatCurrency()" min="0" name="harga" value="<?= $list->harga_beli ?>" style="background-color:#F0F0F0;" readonly>
							</div>

						</div>
						<div class=" modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary">Pakai</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endforeach; ?>