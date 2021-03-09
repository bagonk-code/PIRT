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
							<form action="<?php echo site_url('Master/updateKecamatanAction') ?>" method="post" enctype="multipart/form-data">
								<div class="col-lg-12">
									<input type="hidden" name="id_kecamatan" value="<?= base64_encode($kc->id_kecamatan) ?>">
									<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" 
									value="<?= $this->security->get_csrf_hash() ?>">
									<div class="form-group">
										<label>Nama Kota</label>
										<select class="form-control" id="kota" name="kode_kota">
											<option value="">Pilih</option>
											<?php foreach($kota as $row) { ?>
												<?php if ($kc->kode_kota == $row->kode_kota) { ?>
													<option value="<?=$row->kode_kota;?>" selected><?=$row->nama_kota;?></option>
												<?php }else{ ?>
													<option value="<?=$row->kode_kota;?>"><?=$row->nama_kota;?></option>
												<?php } ?>
											<?php } ?>
										</select>
										<?= form_error('kode_kota','<small class="text-danger">','</small>') ?>
									</div>
									<div class="form-group">
										<label>Kode Kecamatan</label>
										<input type="text" name="kode_kecamatan" class="form-control" placeholder="Kode kecamatan" value="<?= $this->input->post('kode_kecamatan') ?? $kc->kode_kecamatan ?>">
										<?= form_error('kode_kecamatan','<small class="text-danger">','</small>') ?>
									</div>
									<div class="form-group">
										<label>Nama Kecamatan</label>
										<input type="text" name="nama_kecamatan" class="form-control" placeholder="Nama Kecamatan" value="<?= $this->input->post('nama_kecamatan') ?? $kc->nama_kecamatan ?>">
										<?= form_error('nama_kecamatan','<small class="text-danger">','</small>') ?>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success">Edit</button>
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
		$('#kota').select2({
			theme: 'bootstrap4',
			placeholder : 'Pilih Kota'
		});
	});
</script>