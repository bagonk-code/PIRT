<?php $this->load->view('user/import_css'); ?>
<?php $this->load->view('user/navbar'); ?>
<?php $this->load->view('user/sidebar'); ?>

<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-kc-12">
					<ol class="breadcrumb float-kc-right">
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
			<div class="row">
				<div class="col-lg-12">
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title"><b>Master Kota</b></h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<table id="kota" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th><center>Kode</center></th>
												<th><center>Kota</center></th>
												<th><center>Aksi</center></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($kota as $kt) : ?>
												<tr>
													<td><center><?= $kt->id_kota ?></center></td>
													<td><center><?= $kt->nama_kota ?></center></td>
													<td>
														<center>
															<?=anchor(	'Puskekcas/update/' . $kt->id_kota, 
																'<i class="fas fa-fw fa-edit"></i>',
																['class'=>'btn btn-secondary btn-kc btn-flat']) ?>
															<?=anchor(	'Puskekcas/delete_action/' . $kt->id_kota, 
																'<i class="fas fa-fw fa-trash-alt"></i>',
																['class'=>'btn btn-danger btn-kc btn-flat',
																'onclick'=>'return confirm(\'Apakah Anda Yakin?\')' ]) ?>
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
								<h3 class="card-title"><b>Master Kecamatan</b></h3>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12" style="overflow-x:auto;">
										<table id="kecamatan" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th><center>Kode</center></th>
													<th><center>Kecamatan</center></th>
													<th><center>Aksi</center></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($kecamatan as $kc) : ?>
													<tr>
														<td><center><?= $kc->id_kecamatan ?></center></td>
														<td><center><?= $kc->nama_kecamatan ?></center></td>
														<td>
															<center>
																<?=anchor(	'Puskekcas/update/' . $kc->id_kecamatan, 
																	'<i class="fas fa-fw fa-edit"></i>',
																	['class'=>'btn btn-secondary btn-kc btn-flat']) ?>
																<?=anchor(	'Puskekcas/delete_action/' . $kc->id_kecamatan 
																	'<i class="fas fa-fw fa-trash-alt"></i>',
																	['class'=>'btn btn-danger btn-kc btn-flat',
																	'onclick'=>'return confirm(\'Apakah Anda Yakin?\')' ]) ?>
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
								<h3 class="card-title"><b>Master Kelurahan</b></h3>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12" style="overflow-x:auto;">
										<table id="kelurahan" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th><center>Kode</center></th>
													<th><center>Kelurahan</center></th>
													<th><center>Aksi</center></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($kelurahan as $kl) : ?>
													<tr>
														<td><center><?= $kl->id_kelurahan ?></center></td>
														<td><center><?= $kl->nama_kelurahan ?></center></td>
														<td>
															<center>
																<?=anchor(	'Puskekcas/update/' . $kl->id_kelurahan, 
																	'<i class="fas fa-fw fa-edit"></i>',
																	['class'=>'btn btn-secondary btn-kc btn-flat']) ?>
																<?=anchor(	'Puskekcas/delete_action/' . $kl->id_kelurahan 
																	'<i class="fas fa-fw fa-trash-alt"></i>',
																	['class'=>'btn btn-danger btn-kc btn-flat',
																	'onclick'=>'return confirm(\'Apakah Anda Yakin?\')' ]) ?>
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

<?php $this->load->view('user/footer'); ?>
<?php $this->load->view('user/import_js'); ?>

<script type="text/javascript" charset="utf-8">
	$(function () {
		$('#kota').DataTable({
			"paging": true,
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
		$('#kecamatan').DataTable({
			"paging": true,
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
		$('#kelurahan').DataTable({
			"paging": true,
			"lengthMenu": [ 10, 25, 50, 75, 100 ],
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>