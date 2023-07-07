<div id="layoutAuthentication">
	<div id="layoutAuthentication_content">
		<main>
			<div class="container-xl px-4">
				<div class="row justify-content-center">
					<div class="col-xl-6 col-lg-6">
						<!-- Social registration form-->
						<div class="card my-5">
							<div class="card-body p-5 text-center">
								<div class="h3 fw-light mb-3">Create an Account</div>
								<div class="small text-muted mb-2">Sign in using...</div>
								<!-- Social registration links-->
								<a class="btn btn-icon btn-facebook mx-1" href="#!"><i class="fab fa-facebook-f fa-fw fa-sm"></i></a>
								<a class="btn btn-icon btn-github mx-1" href="#!"><i class="fab fa-github fa-fw fa-sm"></i></a>
								<a class="btn btn-icon btn-google mx-1" href="#!"><i class="fab fa-google fa-fw fa-sm"></i></a>
								<a class="btn btn-icon btn-twitter mx-1" href="#!"><i class="fab fa-twitter fa-fw fa-sm text-white"></i></a>
							</div>
							<hr class="my-0" />
							<div class="card-body p-5">

								<form method="post" action="<?= base_url('auth/register/create') ?>">
									<div class="mb-3">
										<label for="fullname" class="form-label">Fullname</label>
										<input type="text" class="form-control 	<?= form_error('fullname') ? 'is-invalid' : '' ?>" id="fullname" name="fullname" placeholder="Your name" value="<?= set_value('name'); ?>" required>
										<div id=" fullname" class="invalid-feedback">
											<?= form_error('fullname') ?>
										</div>
									</div>
									<!-- Form Group (email address)-->
									<div class="mb-3">
										<label for="email" class="form-label">Email</label>
										<input type="text" class="form-control 	<?= form_error('email') ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Your Email" value="<?= set_value('email'); ?>" required>
										<div id=" email" class="invalid-feedback">
											<?= form_error('email') ?>
										</div>
									</div>
									<!-- Form Row-->
									<div class="row gx-3">
										<div class="col-md-12">
											<!-- Form Group (choose password)-->
											<div class="mb-3">
												<label for="password" class="form-label">Password</label>
												<input type="password" class="form-control 	<?= form_error('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Your password" required>
												<div id=" password" class="invalid-feedback">
													<?= form_error('password') ?>
												</div>
											</div>
											<button class="btn btn-primary w-100 mt-4" type="submit">Create Account</button>
										</div>
									</div>

								</form>
							</div>
							<hr class="my-0" />
							<div class="card-body px-5 py-4">
								<div class="small text-center">
									Have an account?
									<a href="auth-login-social.html">Sign in!</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
	<div id="layoutAuthentication_footer">
		<footer class="footer-admin mt-auto footer-dark">
			<div class="container-xl px-4">
				<div class="row">
					<div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
					<div class="col-md-6 text-md-end small">
						<a href="#!">Privacy Policy</a>
						&middot;
						<a href="#!">Terms &amp; Conditions</a>
					</div>
				</div>
			</div>
		</footer>
	</div>
</div>