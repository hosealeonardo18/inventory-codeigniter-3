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
						<button type="button" class="btn btn-primary mb-3" onclick="window.location.href='inventory/index/create'">
							<i class="fa-solid fa-plus me-2"></i> Tambah Barang</button>
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
										<th scope="col">Kategori</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>

									<?php $no = 1;
									foreach ($inventory as $data) : ?>
										<tr>
											<td> <?= $no++ ?> </td>
											<td> <?= $data->nama_barang ?> </td>
											<td> <img class="" height="50px" src="<?= base_url('public/assets/img/inventory/');
																														?><?= $data->image ?>" alt=""> </td>
											<td> <?= $data->jumlah_barang ?> <?= $data->satuan_barang ?> </td>
											<td> <?= $data->harga_beli ?> </td>
											<td> <?= $data->name ?> </td>
											<td class="d-flex gap-2 flex-wrap">
												<button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $data->id_barang ?>">
													<i class="fa fa-pencil-square me-2"></i> Ubah
												</button>

												<a class="btn btn-sm btn-danger" value="<?= $data->slug; ?>" href="<?= base_url('admin/inventory/delete/' . $data->slug) ?>" onclick="return confirm('Yakin akan dihapus')"><i class="fa fa-times-circle me-2"></i> Hapus </a>
											</td>
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

	<!-- edit modal -->
	<?php foreach ($inventory as $update) : ?>
		<div class="modal fade" id="editModal<?= $update->id_barang ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $update->id_barang ?>" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="editModalLabel<?= $update->id_barang ?>">Update Barang</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>

					<form action="inventory/update/<?= $update->id_barang ?>" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<select class="form-select mb-3" aria-label="Default select example" name="categories_id">
								<?php foreach ($categories as $category) : ?>
									<?php if ($update->category_id === $category->id) { ?>
										<option value="<?= $category->id ?>"><?= $category->name ?></option>
									<?php } ?>
								<?php endforeach; ?>
							</select>

							<input type="text" class="form-control mb-3" placeholder="Kode Barang" name="kode_barang" value="<?= $update->kode_barang ?>">

							<input type="text" class="form-control mb-3" placeholder="Nama Barang" name="nama_barang" value="<?= $update->nama_barang ?>">

							<input type="file" class="form-control mb-3" placeholder="Nama Barang" name="image" value="<?= $update->image ?>">

							<input type="number" class="form-control mb-3" placeholder="Jumlah Barang" name="jumlah_barang" value="<?= $update->jumlah_barang ?>" min="0">

							<select class="form-select mb-3" aria-label="Default select example" name="satuan_barang">
								<option value="<?= $update->satuan_barang ?>"><?= $update->satuan_barang ?></option>
							</select>

							<div class="input-group mb-3">
								<span class="input-group-text">Rp.</span>
								<input type="number" class="form-control" id="harga" oninput="formatCurrency()" min="0" name="harga" value="<?= $update->harga_beli ?>">
							</div>

						</div>
						<div class=" modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endforeach; ?>