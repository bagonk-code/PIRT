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
				<div class="col-lg-5">
					<div class="card card-success card-outline" style="height: 345px">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12 mt-4">
									<div class="text-center">
										<img class="img-fluid img-thumbnail" src="<?php echo base_url('assets/dist/img/user.png') ?>" width="150">
									</div>
									<h3 class="profile-username text-center"><b><?= $user->nama_user ?></b></h3>
									<p class="text-muted text-center"><?= $user->nama_perusahaan ?></p>
								</div>
							</div>
						</div>			
					</div>
				</div>
				<div class="col-lg-7">
					<div class="card card-success card-outline">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="float-right row mb-2">
										<?=anchor('Profil/uploadBerkas/'.base64_encode($user->id_user), '<i class="fas fa-fw fa-upload"></i> Upload Berkas',['class'=>'btn btn-secondary btn-sm','style'=>'margin-right:10px']) ?>
									</div>
									<table id="example" class="table table-bordered table-striped">
										<thead>
											<th><center>Keterangan</center></th>
											<th><center>Status</center></th>
										</thead>
										<tbody>
											<tr>
												<th>Pas Foto (4 x 6)</th>
												<td></td>
											</tr>
											<tr>
												<th>Rencana / Konsep Label Kemasan</th>
												<td></td>
											</tr>
											<tr>
												<th>Ruagan Tempat Produksi Lengkap</th>
												<td></td>
											</tr>
											<tr>
												<th>Sertifikat Penyuluhan Keamanan Pangan</th>
												<td></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>			
					</div>
				</div>
				<div class="col-lg-12">
					<div class="card card-success card-outline">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="float-right row mb-2">
										<?=anchor('Profil/updateProfil/'.base64_encode($user->id_user), '<i class="fas fa-fw fa-edit"></i> Edit Profil',['class'=>'btn btn-secondary btn-sm','style'=>'margin-right:10px']) ?>
									</div>
									<table id="example" class="table table-bordered table-striped">
										<tbody>
											<tr>
												<th>Nama Perusahaan</th>
												<td><?= $user->nama_perusahaan ?></td>
											</tr>
											<tr>
												<th style="width: 250px">Nama Penanggung Jawab</th>
												<td><?= $user->nama_user ?></td>
											</tr>
											<tr>
												<th>Email</th>
												<td><?= $user->email ?></td>
											</tr>
											<tr>
												<th>Gender</th>
												<td><?= $user->jk ?></td>
											</tr>
											<tr>
												<th>Alamat</th>
												<td><?= $user->alamat ?></td>
											</tr>
											<tr>
												<th>Kota</th>
												<td><?= $user->nama_kota ?></td>
											</tr>
											<tr>
												<th>Kecamatan</th>
												<td><?= $user->nama_kecamatan ?></td>
											</tr>
											<tr>
												<th>Kelurahan</th>
												<td><?= $user->nama_kelurahan ?></td>
											</tr>
											<tr>
												<th>RT / RW</th>
												<td><?= $user->rt ?> / <?= $user->rw ?></td>
											</tr>
											<tr>
												<th>No Handphone</th>
												<td><?= $user->no_hp ?></td>
											</tr>
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