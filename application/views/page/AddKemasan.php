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
				<div class="col-lg-8">
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title"><b><?= $judul2 ?></b></h3>
						</div>
						<div class="card-body">
							<form action="<?php echo site_url('Master/addKemasanAction') ?>" method="post" enctype="multipart/form-data">
								<div class="col-lg-12">
									<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" 
									value="<?= $this->security->get_csrf_hash() ?>">
									<div class="form-group">
										<label>Kode</label>
										<input type="text" name="kode" class="form-control" placeholder="Kode" value="<?= set_value('kode') ?>">
										<?= form_error('kode','<small class="text-danger">','</small>') ?>
									</div>
									<div class="form-group">
										<label>Jenis Kemasan</label>
										<input type="text" name="jenis" class="form-control" placeholder="Jenis Kemasan" value="<?= set_value('jenis') ?>">
										<?= form_error('jenis','<small class="text-danger">','</small>') ?>
									</div>
									<div class="form-group">
										<label>Keterangan</label>
										<input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?= set_value('keterangan') ?>">
										<?= form_error('keterangan','<small class="text-danger">','</small>') ?>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success">Tambah</button>
										<a href="<?php echo site_url('Master/kemasan'); ?>" class="btn btn-default btn-md">Batal</a>
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