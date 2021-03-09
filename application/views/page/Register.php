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
										<center><h4><b>FORM REGISTER</b></h4></center>
									</div>
									<hr>
									<form action="<?php echo site_url('Auth/actionRegister') ?>" method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-lg-6">
											<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" 
												value="<?= $this->security->get_csrf_hash() ?>">
											<div class="form-group">
												<label>Nama Penanggungjawab</label>
												<input type="text" name="nama_user" class="form-control" placeholder="Nama Penanggungjawab" value="<?= set_value('nama_user') ?>">
												<?= form_error('nama_user','<small class="text-danger">','</small>') ?>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label>Nama Perusahaan</label>
												<input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan" value="<?= set_value('nama_perusahaan') ?>">
												<?= form_error('nama_perusahaan','<small class="text-danger">','</small>') ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Email</label>
												<input type="text" name="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>">
												<?= form_error('email','<small class="text-danger">','</small>') ?>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label>Alamat</label>
												<input type="alamat" name="alamat" class="form-control" placeholder="Alamat" value="<?= set_value('alamat') ?>">
												<?= form_error('alamat','<small class="text-danger">','</small>') ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4">
											<div class="form-group">
												<label>Kota</label>
												<select class="form-control" id="kota" name="kota">
													<option value="">Pilih</option>
													<?php foreach($kota as $row) { ?>
														<option value="<?=$row->kode_kota;?>" <?= set_select('kota',$row->kode_kota ) ?>><?=$row->nama_kota;?></option>
													<?php } ?>
												</select>
												<?= form_error('kota','<small class="text-danger">','</small>') ?>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label>Kecamatan</label>
												<select class="form-control" id="kecamatan" name="kecamatan">
													<option value="">Pilih</option>
													<?php foreach($kecamatan as $row) { ?>
														<option value="<?=$row->kode_kecamatan;?>" <?= set_select('kecamatan',$row->kode_kecamatan ) ?>><?=$row->nama_kecamatan;?></option>
													<?php } ?>
												</select>
												<?= form_error('kecamatan','<small class="text-danger">','</small>') ?>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label>Kelurahan/Desa</label>
												<select class="form-control" id="kelurahan" name="kelurahan">
													<option value="">Pilih</option>
													<?php foreach($kelurahan as $row) { ?>
														<option value="<?=$row->kode_kelurahan;?>" <?= set_select('kelurahan',$row->kode_kelurahan ) ?>><?=$row->nama_kelurahan;?></option>
													<?php } ?>
												</select>
												<?= form_error('kelurahan','<small class="text-danger">','</small>') ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4">
											<div class="form-group">
												<label>RT</label>
												<input type="text" name="rt" class="form-control" placeholder="Contoh:01" value="<?= set_value('rt') ?>" maxlength="2">
												<?= form_error('rt','<small class="text-danger">','</small>') ?>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label>RW</label>
												<input type="text" name="rw" class="form-control" placeholder="Contoh:02" value="<?= set_value('rw') ?>" max_length="2">
												<?= form_error('rw','<small class="text-danger">','</small>') ?>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label>No Handphone</label>
												<input type="text" name="no_hp" class="form-control" placeholder="No Handphone" value="<?= set_value('no_hp') ?>" maxlength="15">
												<?= form_error('no_hp','<small class="text-danger">','</small>') ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Password</label>
												<input type="password" name="password" class="form-control" placeholder="Password" id="pass" value="<?= set_value('password') ?>">
												<?= form_error('password','<small class="text-danger">','</small>') ?>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label>Konfirmasi Password</label>
												<input type="password" name="c_password" class="form-control" placeholder="Password" id="c_pass" value="<?= set_value('c_password') ?>">
												<?= form_error('c_password','<small class="text-danger">','</small>') ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<div class="form-check">
													<input type="checkbox" class="form-check-input" onclick="tampilPassword()">
													<label class="form-check-label">Tampilkan Password</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<button type="submit" class="btn btn-success">Daftar</button>
											</div>
										</div>
									</div>
									</form>
								</div>  
							</div>
						</div>
						<div class="card-footer">
							<small class="font-weight-bold float-right">
								Sudah Punya Akun? 
								<a href="<?php echo site_url('Login'); ?>" class="text-danger">Masuk Disini</a>
							</small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('template/footer'); ?>
<?php $this->load->view('template/import_js'); ?>


<script type="text/javascript" charset="utf-8">
	$(function () {
		$('#kota').select2({
			theme: 'bootstrap4',
			placeholder : 'Pilih Kota'
		});
		$('#kecamatan').select2({
			theme: 'bootstrap4',
			placeholder : 'Pilih Kecamatan'
		});
		$('#kelurahan').select2({
			theme: 'bootstrap4',
			placeholder : 'Pilih Kelurahan'
		});
	});
</script>