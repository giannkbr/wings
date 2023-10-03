<!-- Outer Row -->
<div class="row justify-content-center mt-5 pt-lg-5">

	<div class="col-xl-10 col-lg-12 col-md-9">

		<div class="card o-hidden border-0 shadow-lg">
			<div class="card-body p-lg-5 p-0">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
					<div class="col-lg-12">
						<div class="p-5">
							<div class="text-center mb-4">
								<!--<h1 class="h4 text-gray-900">Sendok Garpu</h1>-->
								<!-- <img src="<?= base_url() ?>/assets/img/logo.png" alt="Sendok Garpu" width="150" height="150"> -->
								</br>
								<h2 class="text-primary">Login</h2>
							</div>
							<?= $this->session->flashdata('pesan'); ?>
							<?= form_open('', ['class' => 'user']); ?>
							<div class="form-group">
								<input autofocus="autofocus" autocomplete="off" value="<?= set_value('username'); ?>"
									type="text" name="username" class="form-control form-control"
									placeholder="Username">
								<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control form-control"
									placeholder="Password">
								<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
							</div>
							<button type="submit" class="btn btn-primary btn btn-block">
								Login
							</button>

							<div class="text-center mt-4">
								<a class="small" href="<?= base_url('auth/register') ?>">Register</a>
							</div>
							<?= form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
