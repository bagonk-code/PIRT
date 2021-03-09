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
							<form action="<?php echo site_url('Master/addSubMenuAction') ?>" method="post" enctype="multipart/form-data">
								<div class="col-lg-12">
									<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" 
									value="<?= $this->security->get_csrf_hash() ?>">
									<div class="form-group">
										<label>Nama Menu</label>
										<select class="form-control" id="menu" name="id_menu">
											<option value="">Pilih</option>
											<?php foreach($menu_all as $row) { ?>
												<option value="<?=$row->id_menu;?>" <?= set_select('id_menu',$row->id_menu ) ?>><?=$row->menu;?></option>
											<?php } ?>
										</select>
										<?= form_error('id_menu','<small class="text-danger">','</small>') ?>
									</div>
									<div class="form-group">
										<label>Nama Sub Menu</label>
										<input type="text" name="title" class="form-control" placeholder="Nama Sub Menu" value="<?= set_value('title') ?>">
										<?= form_error('title','<small class="text-danger">','</small>') ?>
									</div>
									<div class="form-group">
										<label>URL</label>
										<input type="text" name="url" class="form-control" placeholder="URL" value="<?= set_value('url') ?>">
										<?= form_error('url','<small class="text-danger">','</small>') ?>
									</div>
									<div class="form-group">
										<label>Status</label>
										<select class="form-control" id="status" name="is_active">
											<option value="">Pilih</option>
											<option value="1" <?= set_select('is_active',1) ?>>Aktif</option>
											<option value="0" <?= set_select('is_active',0) ?>>Tidak Aktif</option>
										</select>
										<?= form_error('is_active','<small class="text-danger">','</small>') ?>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success">Tambah</button>
										<a href="<?php echo site_url('Master/menu'); ?>" class="btn btn-default btn-md">Batal</a>
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
		$('#menu').select2({
			theme: 'bootstrap4',
			placeholder : 'Pilih Menu'
		});
		$('#status').select2({
			theme: 'bootstrap4',
			placeholder : 'Pilih Menu'
		});
	});
</script>