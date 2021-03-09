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
				<div class="col-lg-12">
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
														<a href="<?php echo site_url('Pemohon/addPemohon'); ?>" class="btn btn-success btn-md"><i class="fa fa-plus"></i> Tambah Data</a>
													</td>
												</tr>
											</thead>
										</table>
									</div>
									<table id="table" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th><center>Nama Penanggungjawab</center></th>
												<th><center>Nama Perusahaan</center></th>
												<th><center>Alamat</center></th>
												<th><center>No Handphone</center></th>
												<th><center>Action</center></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($pemohon as $pmh) : ?>
												<tr>
													<td><?= $pmh->nama_user ?></td>
													<td><?= $pmh->nama_perusahaan ?></td>
													<td>
														<?= $pmh->alamat ?> <br>
														<?= $pmh->nama_kota ?> <br>
														<?= $pmh->nama_kecamatan ?> <br>
														<?= $pmh->nama_kelurahan ?> <br>
														RT <?= $pmh->rt ?> / RW <?= $pmh->rw ?>
													</td>
													<td><?= $pmh->no_hp ?></td>
													<td>
														<center>
															<?=anchor('Pemohon/updateUser/'.base64_encode($pmh->id_user), '<i class="fas fa-fw fa-edit"></i> Edit',
															['class'=>'btn btn-secondary btn-xs']) ?>
															<button type="button" class="btn btn-danger btn-xs"><i class="fas fa-fw fa-trash-alt" data-toggle="modal" data-target="#modal_hapus<?php echo $pmh->id_user ?>"></i> Hapus</button>
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

<!-- Modal Hapus -->
<?php foreach($pemohon as $pmh) : ?>
	<div class="modal fade" id="modal_hapus<?php echo $pmh->id_user; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Data <?= $pmh->nama_user ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url() ?>Pemohon/deleteUserAction" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="modal-body">
							Apakah anda yakin ?
						</div>
						<div class="modal-footer">
							<input type="hidden" name="id_user" value="<?= base64_encode($pmh->id_user) ?>">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
							<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-danger">Hapus</button>
						</div>
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
		$('#table').DataTable({
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