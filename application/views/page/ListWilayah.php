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
							<h3 class="card-title"><b>Master Kota</b></h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="row mb-4">
										<table>
											<thead>
												<tr>
													<td>
														<a href="<?php echo site_url('Master/addKota'); ?>" class="btn btn-success btn-md"><i class="fa fa-plus"></i> Tambah Data</a>
													</td>
												</tr>
											</thead>
										</table>
									</div>
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
													<td><center><?= $kt->kode_kota ?></center></td>
													<td><center><?= $kt->nama_kota ?></center></td>
													<td>
														<center>
															<?=anchor('Master/updateKota/' . base64_encode($kt->id_kota), 
																'<i class="fas fa-fw fa-edit"></i> Edit',
																['class'=>'btn btn-secondary btn-xs']) ?>
															<button type="button" class="btn btn-danger btn-xs"><i class="fas fa-fw fa-trash-alt" data-toggle="modal" data-target="#modal_kota<?php echo $kt->id_kota ?>"></i> Hapus</button>
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
								<div class="col-md-12">
									<div class="row mb-4">
										<table>
											<thead>
												<tr>
													<td>
														<a href="<?php echo site_url('Master/addKecamatan'); ?>" class="btn btn-success btn-md"><i class="fa fa-plus"></i> Tambah Data</a>
													</td>
												</tr>
											</thead>
										</table>
									</div>
									<table id="kecamatan" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th><center>Kota</center></th>
												<th><center>Kode</center></th>
												<th><center>Kecamatan</center></th>
												<th><center>Aksi</center></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($kecamatan as $kc) : ?>
												<tr>
													<td><center><?= $kc->nama_kota ?></center></td>
													<td><center><?= $kc->kode_kecamatan ?></center></td>
													<td><center><?= $kc->nama_kecamatan ?></center></td>
													<td>
														<center>
															<?=anchor('Master/updateKecamatan/' . base64_encode($kc->id_kecamatan), 
																'<i class="fas fa-fw fa-edit"></i> Edit',
																['class'=>'btn btn-secondary btn-xs']) ?>
															<button type="button" class="btn btn-danger btn-xs"><i class="fas fa-fw fa-trash-alt" data-toggle="modal" data-target="#modal_kecamatan<?php echo $kc->id_kecamatan ?>"></i> Hapus</button>
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
							<h3 class="card-title"><b>Master Kelurahan</b></h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="row mb-4">
										<table>
											<thead>
												<tr>
													<td>
														<a href="<?php echo site_url('Master/addKelurahan'); ?>" class="btn btn-success btn-md"><i class="fa fa-plus"></i> Tambah Data</a>
													</td>
												</tr>
											</thead>
										</table>
									</div>
									<table id="kelurahan" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th><center>Kecamatan</center></th>
												<th><center>Kode</center></th>
												<th><center>Kelurahan</center></th>
												<th><center>Aksi</center></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($kelurahan as $kl) : ?>
												<tr>
													<td><center><?= $kl->nama_kecamatan ?></center></td>
													<td><center><?= $kl->kode_kelurahan ?></center></td>
													<td><center><?= $kl->nama_kelurahan ?></center></td>
													<td>
														<center>
															<?=anchor('Master/updateKelurahan/' . base64_encode($kl->id_kelurahan), 
																'<i class="fas fa-fw fa-edit"></i> Edit',
																['class'=>'btn btn-secondary btn-xs']) ?>
															<button type="button" class="btn btn-danger btn-xs"><i class="fas fa-fw fa-trash-alt" data-toggle="modal" data-target="#modal_kelurahan<?php echo $kl->id_kelurahan ?>"></i> Hapus</button>
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

<?php foreach($kota as $kt) : ?>
	<div class="modal fade" id="modal_kota<?php echo $kt->id_kota; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Data <?= $kt->nama_kota ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url() ?>Master/deleteKotaAction" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						Apakah anda yakin ?
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id_kota" value="<?= base64_encode($kt->id_kota) ?>">
						<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
						<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-danger">Hapus</button>
					</div>
				</form> 
			</div>
		</div>
	</div>
<?php endforeach; ?>

<?php foreach($kecamatan as $kc) : ?>
	<div class="modal fade" id="modal_kecamatan<?php echo $kc->id_kecamatan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Data <?= $kc->nama_kecamatan ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url() ?>Master/deleteKecamatanAction" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						Apakah anda yakin ?
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id_kecamatan" value="<?= base64_encode($kc->id_kecamatan) ?>">
						<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
						<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-danger">Hapus</button>
					</div>
				</form> 
			</div>
		</div>
	</div>
<?php endforeach; ?>

<?php foreach($kelurahan as $kl) : ?>
	<div class="modal fade" id="modal_kelurahan<?php echo $kl->id_kelurahan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Data <?= $kl->nama_kelurahan ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url() ?>Master/deleteKelurahanAction" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						Apakah anda yakin ?
					</div>
					<div class="modal-footer">
						<input type="hidden" name="id_kelurahan" value="<?= base64_encode($kl->id_kelurahan) ?>">
						<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
						<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-danger">Hapus</button>
					</div>
				</form> 
			</div>
		</div>
	</div>
<?php endforeach; ?>

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