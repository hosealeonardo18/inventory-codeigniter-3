<div id="layoutSidenav_content">
	<main>
		<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
			<div class="container-fluid px-4">
				<div class="page-header-content">
					<div class="row align-items-center justify-content-between pt-3">
						<div class="col-auto mb-3">
							<h1 class="page-header-title">
								<div class="page-header-icon"><i data-feather="file-plus"></i></div>
								Create Inventory
							</h1>
						</div>

					</div>
				</div>
			</div>
		</header>
		<!-- Main page content-->
		<div class="container-fluid px-4">
			<?php echo form_open_multipart('admin/inventory/create'); ?>
			<div class="row gx-4">
				<div class="col-lg-8">
					<div class="card mb-4">
						<div class="card-header">Category</div>
						<div class="card-body">
							<select class="form-select mb-3" aria-label="Default select example" name="categories_id">
								<option value="" selected>Open this select category</option>
								<?php foreach ($categories as $category) : ?>
									<option value="<?= $category->id ?>"><?= $category->name ?></option>
								<?php endforeach; ?>
							</select>

							<input type="text" class="form-control mb-3" placeholder="Kode Barang" name="kode_barang">

							<input type="text" class="form-control mb-3" placeholder="Nama Barang" name="nama_barang">

							<input type="file" class="form-control mb-3" placeholder="Nama Barang" name="image">

							<input type="number" class="form-control mb-3" placeholder="Jumlah Barang" name="jumlah_barang" min="0">

							<select class="form-select mb-3" aria-label="Default select example" name="satuan_barang">
								<option value="" selected>Open this select satuan barang</option>
								<option value="pcs">Pcs</option>
								<option value="unit">Unit</option>
							</select>

							<div class="input-group mb-3">
								<span class="input-group-text">Rp.</span>
								<input type="number" class="form-control" id="harga" oninput="formatCurrency()" min="0" name="harga">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card card-header-actions">
						<div class="card-header">
							Publish
							<i class="text-muted" data-feather="info" data-bs-toggle="tooltip" data-bs-placement="left" title="After submitting, your post will be published once it is approved by a moderator."></i>
						</div>
						<div class="card-body">
							<div class="d-grid">
								<button type="submit" class=" fw-500 btn btn-primary">Create</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>