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
							<form action="<?php echo base_url() ?>Master/updateMenuAction" method="post" enctype="multipart/form-data">
								<div class="col-lg-12">
									<input type="hidden" name="id_menu" value="<?= base64_encode($mn->id_menu) ?>">
									<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" 
									value="<?= $this->security->get_csrf_hash() ?>">
									<div class="form-group">
										<label>Nama Menu</label>
										<input type="text" name="menu" class="form-control" placeholder="Nama Menu" value="<?= $this->input->post('menu') ?? $mn->menu ?>">
										<?= form_error('menu','<small class="text-danger">','</small>') ?>
									</div>
									<div class="form-group">
										<label>Icon</label>
										<input type="text" name="icon" class="form-control" placeholder="Icon" value="<?= $this->input->post('icon') ?? $mn->icon ?>">
										<?= form_error('icon','<small class="text-danger">','</small>') ?>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success">Edit</button>
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