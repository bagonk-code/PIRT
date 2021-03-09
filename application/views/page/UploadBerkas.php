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
		<div class="container">
			<div class="row h-100 justify-content-center align-items-center">
				<div class="col-lg-12">
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title"><b><?= $judul2 ?></b></h3>
						</div>
						<div class="card-body">
							<form action="<?php echo site_url('Master/addPanganAction') ?>" method="post" enctype="multipart/form-data">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" 
									value="<?= $this->security->get_csrf_hash() ?>">
								<div class="col-lg-12">
									<div class="row">
										<div class="col-lg-6">
											<div class="card" style="height: 180px">
												<div class="card-body">
													<div class="form-group">
														<label>Pas Foto (4 x 6)</label>
														<input type="file" name="pasfoto" class="form-control" required>
													</div>
												</div>	
											</div>
										</div>
										<div class="col-lg-6">
											<div class="card">
												<div class="card-body">
													<div class="form-group">
														<label>Rencana / Konsep Label Kemasan</label>
														<input type="file" name="label1" class="form-control" required>
													</div>
													<div class="form-group">
														<input type="file" name="label2" class="form-control" required>
													</div>
												</div>	
											</div>
										</div>	
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="card">
												<div class="card-body">
													<div class="form-group">
														<label>Ruagan Tempat Produksi Lengkap</label>
														<input type="file" name="produksi1" class="form-control" required>
													</div>
													<div class="form-group">
														<input type="file" name="produksi2" class="form-control" required>
													</div>
													<div class="form-group">
														<input type="file" name="produksi3" class="form-control" required>
													</div>
												</div>	
											</div>
										</div>
										<div class="col-lg-6">
											<div class="card" style="height: 234px">
												<div class="card-body">
													<div class="form-group">
														<label>Sertifikat Penyuluhan Keamanan Pangan</label>
														<input type="file" name="serti1" class="form-control" required>
													</div>
													<div class="form-group">
														<input type="file" name="serti2" class="form-control" required>
													</div>
												</div>	
											</div>
										</div>	
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<center>
													<button type="submit" class="btn btn-secondary">Simpan</button>
													<a href="<?php echo site_url('Profil/index'); ?>" class="btn btn-default btn-md">Batal</a>
												</center>
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