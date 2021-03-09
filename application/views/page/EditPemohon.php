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
							<form action="<?php echo site_url('Pemohon/updateUserAction') ?>" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-6">
										<div class="row">
											<div class="col-lg-12">
												<input type="hidden" name="id_user" value="<?= base64_encode($pmh->id_user) ?>">
												<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" 
												value="<?= $this->security->get_csrf_hash() ?>">
												<div class="form-group">
													<label>Nama Penanggungjawab</label>
													<input type="text" name="nama_user" class="form-control" placeholder="Nama Penanggungjawab" value="<?= $this->input->post('nama_user') ?? $pmh->nama_user ?>">
													<?= form_error('nama_user','<small class="text-danger">','</small>') ?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label>Nama Perusahaan</label>
													<input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan" value="<?= $this->input->post('nama_perusahaan') ?? $pmh->nama_perusahaan ?>">
													<?= form_error('nama_perusahaan','<small class="text-danger">','</small>') ?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label>Email</label>
													<input type="text" name="email" class="form-control" placeholder="Email" value="<?= $this->input->post('email') ?? $pmh->email ?>">
													<?= form_error('email','<small class="text-danger">','</small>') ?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label>Gender</label>
													<select class="form-control" id="jk" name="jk">
														<option value="">Pilih</option>
														<option value="Laki-Laki" <?php echo ($pmh->jk =='Laki-Laki')?"selected":""; ?>>Laki-Laki</option>
														<option value="Perempuan" <?php echo ($pmh->jk =='Perempuan')?"selected":""; ?>>Perempuan</option>
													</select>
													<?= form_error('jk','<small class="text-danger">','</small>') ?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label>No Handphone</label>
													<input type="text" name="no_hp" class="form-control" placeholder="No Handphone" value="<?= $this->input->post('no_hp') ?? $pmh->no_hp ?>" maxlength="15">
													<?= form_error('no_hp','<small class="text-danger">','</small>') ?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label>Alamat</label>
													<input type="alamat" name="alamat" class="form-control" placeholder="Alamat" value="<?= $this->input->post('alamat') ?? $pmh->alamat ?>">
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
															<?php if ($pmh->kota == $row->kode_kota) { ?>
																<option value="<?=$row->kode_kota;?>" selected><?=$row->nama_kota;?></option>
															<?php }else{ ?>	
																<option value="<?=$row->kode_kota;?>"><?=$row->nama_kota;?></option>
															<?php } ?>	
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
															<?php if ($pmh->kecamatan == $row->kode_kecamatan) { ?>
																<option value="<?=$row->kode_kecamatan;?>" selected><?=$row->nama_kecamatan;?></option>
															<?php }else{ ?>	
																<option value="<?=$row->kode_kecamatan;?>"><?=$row->nama_kecamatan;?></option>
															<?php } ?>	
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
															<?php if ($pmh->kelurahan == $row->kode_kelurahan) { ?>
																<option value="<?=$row->kode_kelurahan;?>" selected><?=$row->nama_kelurahan;?></option>
															<?php }else{ ?>		
																<option value="<?=$row->kode_kelurahan;?>"><?=$row->nama_kelurahan;?></option>
															<?php } ?>		
														<?php } ?>
													</select>
													<?= form_error('kelurahan','<small class="text-danger">','</small>') ?>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label>RT</label>
													<input type="text" name="rt" class="form-control" placeholder="Contoh:01" value="<?= $this->input->post('rt') ?? $pmh->rt ?>" maxlength="2">
													<?= form_error('rt','<small class="text-danger">','</small>') ?>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label>RW</label>
													<input type="text" name="rw" class="form-control" placeholder="Contoh:02" value="<?= $this->input->post('rw') ?? $pmh->rw ?>" max_length="2">
													<?= form_error('rw','<small class="text-danger">','</small>') ?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<label>Status</label>
													<select class="form-control" id="status" name="is_active">
														<option value="">Pilih</option>
														<option value="1" <?php echo ($pmh->is_active =='1')?"selected":""; ?>>Aktif</option>
														<option value="0" <?php echo ($pmh->is_active =='0')?"selected":""; ?>>Tidak Aktif</option>
													</select>
													<?= form_error('is_active','<small class="text-danger">','</small>') ?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group" style="margin-top: 30px">
													<button type="submit" class="btn btn-success">Edit</button>
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