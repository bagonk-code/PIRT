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
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<?php echo $this->session->flashdata('pesan'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title"><b><?= $judul2 ?></b></h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="row mb-4">
										<table>
											<thead>
												<tr>
													<td>
														<a href="<?php echo site_url('Master/addMenu'); ?>" class="btn btn-success btn-md"><i class="fa fa-plus"></i> Tambah Data</a>
													</td>
												</tr>
											</thead>
										</table>
									</div>
									<table id="menu" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th><center>Menu</center></th>
												<th><center>Icon</center></th>
												<th><center>Aksi</center></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($menu_all as $mn) : ?>
												<tr>
													<td><center><?= $mn->menu ?></center></td>
													<td><center><?= $mn->icon ?></center></td>
													<td>
														<center>
															<?=anchor('Master/updateMenu/' . base64_encode($mn->id_menu), 
																'<i class="fas fa-fw fa-edit"></i> Edit',
																['class'=>'btn btn-secondary btn-xs']) ?>
															<button type="button" class="btn btn-danger btn-xs"><i class="fas fa-fw fa-trash-alt" data-toggle="modal" data-target="#modal_menu<?php echo $mn->id_menu ?>"></i> Hapus</button>
															</center>
														</center>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>			
					</div>
				</div>
				<div class="col-lg-6">
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title"><b><?= $judul4 ?></b></h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12" style="overflow-x:auto;">
									<table id="rolemenu" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th><center>Level</center></th>
												<th><center>Akses</center></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($level as $lv) : ?>
												<tr>
													<td><center><?= $lv->level ?></center></td>
													<td>
														<center>
															<?=anchor('Master/changeAccess/' . base64_encode($lv->id_level), '<i class="fas fa-fw fa-key"></i> Edit Akses',['class'=>'btn btn-warning btn-xs']) ?>
														</center>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>			
					</div>
				</div>
				<div class="col-lg-12">
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title"><b><?= $judul3 ?></b></h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12" style="overflow-x:auto;">
									<div class="row mb-4">
										<table>
											<thead>
												<tr>
													<td>
														<a href="<?php echo site_url('Master/addSubMenu'); ?>" class="btn btn-success btn-md"><i class="fa fa-plus"></i> Tambah Data</a>
													</td>
												</tr>
											</thead>
										</table>
									</div>
									<table id="submenu" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th><center>Sub Menu</center></th>
												<th><center>Menu</center></th>
												<th><center>URL</center></th>
												<th><center>Status</center></th>
												<th><center>Aksi</center></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($sub_menu as $sm) : ?>
												<tr>
													<td><center><?= $sm->title ?></center></td>
													<td><center><?= $sm->menu ?></center></td>
													<td><center><?= $sm->url ?></center></td>
													<td>
														<center>
															<?php if ($sm->is_active == 1) { ?>
																<button type="button" class="btn btn-xs btn-primary" disabled>Aktif</button>
															<?php }else{ ?>
																<button type="button" class="btn btn-xs btn-danger" disabled>Tidak Aktif</button>
															<?php } ?>
														</center>
													</td>
													<td>
														<center>
															<?=anchor('Master/updateSubMenu/' . base64_encode($sm->id_sub_menu), 
																'<i class="fas fa-fw fa-edit"></i> Edit',
																['class'=>'btn btn-secondary btn-xs']) ?>
															<button type="button" class="btn btn-danger btn-xs"><i class="fas fa-fw fa-trash-alt" data-toggle="modal" data-target="#modal_submenu<?php echo $sm->id_sub_menu ?>"></i> Hapus</button>
														</center>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>			
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php foreach($menu_all as $mn) : ?>
	<div class="modal fade" id="modal_menu<?php echo $mn->id_menu; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url() ?>Master/deleteMenuAction" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						Apakah anda yakin ?
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id_menu" value="<?= base64_encode($mn->id_menu) ?>">
						<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
						<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-danger">Hapus</button>
					</div>
				</form> 
			</div>
		</div>
	</div>
<?php endforeach; ?>

<?php foreach($sub_menu as $sm) : ?>
	<div class="modal fade" id="modal_submenu<?php echo $sm->id_sub_menu; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?= form_open_multipart('Master/deleteSubmenuAction/'.base64_encode($sm->id_sub_menu),['class'=>'form-horizontal']) ?>
				<div class="modal-body">
					Apakah anda yakin ?
				</div>
				<div class="modal-footer">
					<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
				<?= form_close() ?>  
			</div>
		</div>
	</div>
<?php endforeach; ?>

<?php $this->load->view('user/footer'); ?>
<?php $this->load->view('user/import_js'); ?>

<script type="text/javascript" charset="utf-8">
	$(function () {
		$('#menu').DataTable({
			"paging": true,
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
		$('#submenu').DataTable({
			"paging": true,
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"searching": true,
			"order": [[ 1, "asc" ]],
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
		$('#rolemenu').DataTable({
			"paging": true,
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>