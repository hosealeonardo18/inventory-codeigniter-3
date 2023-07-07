<div id="layoutAuthentication">
	<div id="layoutAuthentication_content">
		<main>
			<div class="container-xl px-4">
				<div class="row justify-content-center">
					<div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
						<!-- Social login form-->
						<div class="card my-5">
							<div class="card-body p-5 text-center">
								<div class="h3 fw-light mb-3">Sign In</div>
								<!-- Social login links-->
								<a class="btn btn-icon btn-facebook mx-1" href="#!"><i class="fab fa-facebook-f fa-fw fa-sm"></i></a>
								<a class="btn btn-icon btn-github mx-1" href="#!"><i class="fab fa-github fa-fw fa-sm"></i></a>
								<a class="btn btn-icon btn-google mx-1" href="#!"><i class="fab fa-google fa-fw fa-sm"></i></a>
								<a class="btn btn-icon btn-twitter mx-1" href="#!"><i class="fab fa-twitter fa-fw fa-sm text-white"></i></a>
							</div>
							<hr class="my-0" />
							<div class="card-body p-5">
								<!-- Login form-->
								<?= $this->session->flashdata('message'); ?>
								<form method="post" action="<?= base_url('auth/login') ?>">
									<!-- Form Group (email address)-->
									<div class="mb-3">
										<label for="email" class="form-label">Email</label>
										<input type="text" class="form-control 	<?= form_error('email') ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Your Email" value="<?= set_value('email'); ?>" required>
										<div id=" email" class="invalid-feedback">
											<?= form_error('email') ?>
										</div>
									</div>
									<!-- Form Group (password)-->
									<div class="mb-3">
										<label for="password" class="form-label">Password</label>
										<input type="password" class="form-control 	<?= form_error('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Your password" required>
										<div id=" password" class="invalid-feedback">
											<?= form_error('password') ?>
										</div>
									</div>
									<!-- Form Group (forgot password link)-->
									<div class="mb-3"><a class="small" href="auth-password-social.html">Forgot your password?</a></div>
									<!-- Form Group (login box)-->
									<div class="d-flex align-items-center justify-content-between mb-0">
										<div class="form-check">
											<input class="form-check-input" id="checkRememberPassword" type="checkbox" value="" />
											<label class="form-check-label" for="checkRememberPassword">Remember password</label>
										</div>
										<button type="submit" class="btn btn-primary">Login</button>
									</div>
								</form>
							</div>
							<hr class="my-0" />
							<div class="card-body px-5 py-4">
								<div class="small text-center">
									New user?
									<a href="<?= base_url('auth/register') ?>">Create an account!</a>
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