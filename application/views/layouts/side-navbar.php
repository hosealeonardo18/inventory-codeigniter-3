<div id="layoutSidenav">
	<div id="layoutSidenav_nav">
		<nav class="sidenav shadow-right sidenav-light">
			<div class="sidenav-menu">
				<div class="nav accordion" id="accordionSidenav">
					<div class="sidenav-menu-heading">Dashboard</div>
					<a class="nav-link collapsed" href="<?= base_url('dashboard'); ?>">
						<div class="nav-link-icon"><i data-feather="activity"></i></div>
						Dashboard
						<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
					</a>
				</div>
				<?php if ($this->session->userdata('role_id') == 3 || $this->session->userdata('role_id') == 2) : ?>
					<div class="nav accordion" id="accordionSidenav">
						<div class="sidenav-menu-heading">Master Data</div>
						<!-- Sidenav Accordion (Dashboard)-->
						<a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
							<div class="nav-link-icon"><i data-feather="activity"></i></div>
							Inventory
							<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseDashboards" data-bs-parent="#accordionSidenav">
							<nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
								<a class="nav-link" href="<?= base_url('admin/inventory'); ?>">List Invetory</a>
							</nav>
						</div>

						<!-- Sidenav Accordion (categori)-->
						<a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
							<div class="nav-link-icon"><i data-feather="activity"></i></div>
							Category
							<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseCategories" data-bs-parent="#accordionSidenav">
							<nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
								<a class="nav-link" href="<?= base_url('admin/category'); ?>">List Category</a>
							</nav>
						</div>
					</div>
					<div class="nav accordion" id="accordionSidenav">
						<div class="sidenav-menu-heading">Transaction</div>
						<a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseTransaction" aria-expanded="false" aria-controls="collapseTransaction">
							<div class="nav-link-icon"><i data-feather="activity"></i></div>
							Transaction
							<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseTransaction" data-bs-parent="#accordionSidenav">
							<nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
								<a class="nav-link" href="<?= base_url('dashboard'); ?>">List Transaction</a>
							</nav>
						</div>
					</div>
				<?php else : ?>

					<div class="nav accordion" id="accordionSidenav">
						<div class="sidenav-menu-heading">Transaction</div>
						<a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseTransaction" aria-expanded="false" aria-controls="collapseTransaction">
							<div class="nav-link-icon"><i data-feather="activity"></i></div>
							Transaction
							<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseTransaction" data-bs-parent="#accordionSidenav">
							<nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
								<a class="nav-link" href="<?= base_url('dashboard/transactions'); ?>">List Transaction</a>
							</nav>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<!-- Sidenav Footer-->
			<div class="sidenav-footer">
				<div class="sidenav-footer-content">
					<div class="sidenav-footer-subtitle">Logged in as:</div>
					<div class="sidenav-footer-title"><?= $this->session->userdata('fullname') ?></div>
				</div>
			</div>
		</nav>
	</div>