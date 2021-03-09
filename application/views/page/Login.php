<?php $this->load->view('template/import_css'); ?>
<?php $this->load->view('template/navbar'); ?>

<div class="content-wrapper">
	<div class="content-header"></div>
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">          
					<div class="card card-success card-outline">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-6">
									<center>
										<img src="<?php echo base_url('assets/dist/img/pirt.png') ?>" width="400" height="400" class="img-fluid">
									</center>
								</div> 
								<div class="col-lg-6">
									<div class="form-group">
										<center><h4><b>FORM LOGIN</b></h4></center>
									</div>
									<hr>
									<div class="form-group">
										<?php echo $this->session->flashdata('pesan'); ?>
									</div>
									<form action="<?php echo site_url('Auth/actionLogin') ?>" method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-12">
											<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" 
												value="<?= $this->security->get_csrf_hash() ?>">
											<div class="form-group">
												<label>Email</label>
												<input type="text" name="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>">
												<?= form_error('email','<small class="text-danger">','</small>') ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label>Password</label>
												<input type="password" name="password" class="form-control" placeholder="Password" id="pass">
												<?= form_error('password','<small class="text-danger">','</small>') ?>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="form-check">
											<input type="checkbox" class="form-check-input" onclick="tampilPassword()">
											<label class="form-check-label">Tampilkan Password</label>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<button type="submit" class="btn btn-success">Masuk</button>
											</div>
										</div>
									</div>
									</form>
								</div>  
							</div>
						</div>
						<div class="card-footer">
							<!-- <small class="font-weight-bold float-right">Belum Punya Akun? <a href="<?php echo site_url('Register'); ?>" class="text-danger">Daftar Disini</a></small> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('template/footer'); ?>
<?php $this->load->view('template/import_js'); ?>

<script type="text/javascript">
	function tampilPassword() {
		var pass = document.getElementById("pass");
		if (pass.type === "password") {
			pass.type = "text";
		} else {
			pass.type = "password";
		}
	}
</script>