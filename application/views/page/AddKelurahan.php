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
				<div class="col-lg-6">
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title"><b><?= $judul2 ?></b></h3>
						</div>
						<div class="card-body">
							<form action="<?php echo site_url('Master/addKelurahanAction') ?>" method="post" enctype="multipart/form-data">
								<div class="col-lg-12">
									<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" 
									value="<?= $this->security->get_csrf_hash() ?>">
									<div class="form-group">
										<label>Nama Kecamatan</label>
										<select class="form-control" id="kecamatan" name="kode_kecamatan">
											<option value="">Pilih</option>
											<?php foreach($kecamatan as $row) { ?>
												<option value="<?=$row->kode_kecamatan;?>" <?= set_select('kode_kecamatan',$row->kode_kecamatan ) ?>><?=$row->nama_kecamatan;?></option>
											<?php } ?>
										</select>
										<?= form_error('kode_kecamatan','<small class="text-danger">','</small>') ?>
									</div>
									<div class="form-group">
										<label>Kode Kelurahan</label>
										<input type="text" name="kode_kelurahan" class="form-control" placeholder="Kode Kelurahan" value="<?= set_value('kode_kelurahan') ?>">
										<?= form_error('kode_kelurahan','<small class="text-danger">','</small>') ?>
									</div>
									<div class="form-group">
										<label>Nama Kelurahan</label>
										<input type="text" name="nama_kelurahan" class="form-control" placeholder="Nama Kelurahan" value="<?= set_value('nama_kelurahan') ?>">
										<?= form_error('nama_kelurahan','<small class="text-danger">','</small>') ?>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success">Simpan</button>
										<a href="<?php echo site_url('Master/wilayah'); ?>" class="btn btn-default btn-md">Batal</a>
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
		$('#kecamatan').select2({
			theme: 'bootstrap4',
			placeholder : 'Pilih Kecamatan'
		});
	});
</script>