<?php $this->load->view('user/import_css'); ?>
<?php $this->load->view('user/navbar'); ?>
<?php $this->load->view('user/sidebar'); ?>

<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<ol class="breadcrumb float-sm-right">
						<?php foreach($menu as $m) : ?>
							<?php if ($judul1 == $m->menu) { ?>
								<li class="breadcrumb-item"><?= $m->menu; ?></li>
							<?php } ?>	
						<?php endforeach; ?>
						<li class="breadcrumb-item"><?= $judul2; ?></li>	
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="row h-100 justify-content-center align-items-center">
				<div class="col-lg-12">
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title"><b><?= $judul2 ?></b></h3>
						</div>
						<div class="card-body">
							<form action="<?php echo site_url('Pemohon/addPemohonAction') ?>" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-6">
										<div class="row">
											<div class="col-lg-12">
												<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" 
												value="<?= $this->security->get_csrf_hash() ?>">
												<div class="form-group">
													<label>Nama Penanggungjawab</label>
													<input type="text" name="nama_user" class="form-control" placeholder="Nama Penanggungjawab" value="<?= set_value('nama_user') ?>">
													<?= form_error('nama_user','<small class="text-danger">','</small>') ?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label>Nama Perusahaan</label>
													<input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan" value="<?= set_value('nama_perusahaan') ?>">
													<?= form_error('nama_perusahaan','<small class="text-danger">','</small>') ?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label>Email</label>
													<input type="text" name="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>">
													<?= form_error('email','<small class="text-danger">','</small>') ?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label>Gender</label>
													<select class="form-control" id="jk" name="jk">
														<option value="">Pilih</option>
														<option value="Laki-Laki" <?= set_select('jk',"Laki-Laki") ?>>Laki-Laki</option>
														<option value="Perempuan" <?= set_select('jk',"Perempuan") ?>>Perempuan</option>
													</select>
													<?= form_error('jk','<small class="text-danger">','</small>') ?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label>No Handphone</label>
													<input type="text" name="no_hp" class="form-control" placeholder="No Handphone" value="<?= set_value('no_hp') ?>" maxlength="15">
													<?= form_error('no_hp','<small class="text-danger">','</small>') ?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label>Alamat</label>
													<input type="alamat" name="alamat" class="form-control" placeholder="Alamat" value="<?= set_value('alamat') ?>">
													<?= form_error('alamat','<small class="text-danger">','</small>') ?>
												</div>
											</div>
										</div>
									</div> 
									<div class="col-lg-6">
										<div class="row">
											<div class="col-lg-12">
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
											<div class="col-lg-12">
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
											<div class="col-lg-12">
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
											<div class="col-lg-6">
												<div class="form-group">
													<label>RT</label>
													<input type="text" name="rt" class="form-control" placeholder="Contoh:01" value="<?= set_value('rt') ?>" maxlength="2">
													<?= form_error('rt','<small class="text-danger">','</small>') ?>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label>RW</label>
													<input type="text" name="rw" class="form-control" placeholder="Contoh:02" value="<?= set_value('rw') ?>" max_length="2">
													<?= form_error('rw','<small class="text-danger">','</small>') ?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label>Status</label>
													<select class="form-control" id="status" name="is_active">
														<option value="">Pilih</option>
														<option value="1" <?= set_select('is_active',1) ?>>Aktif</option>
														<option value="0" <?= set_select('is_active',0) ?>>Tidak Aktif</option>
													</select>
													<?= form_error('is_active','<small class="text-danger">','</small>') ?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group" style="margin-top: 30px">
													<button type="submit" class="btn btn-success">Tambah</button>
													<a href="<?php echo site_url('Pemohon/index'); ?>" class="btn btn-default btn-md">Batal</a>
												</div>
											</div>
										</div>	
									</div> 
								</div>	
							</form>						
						</div>	
					</div>			
				</div>
			</div>
		</div>
	</section>
</div>


<?php $this->load->view('user/footer'); ?>
<?php $this->load->view('user/import_js'); ?>

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
		$('#jk').select2({
			theme: 'bootstrap4',
			placeholder : 'Pilih Jenis Kelamin'
		});
		$('#status').select2({
			theme: 'bootstrap4',
			placeholder : 'Pilih Status'
		});
	});
</script>