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
			<div class="row">
				<div class="col-lg-12">
					<?php echo $this->session->flashdata('pesan'); ?>
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
														<?php if ($level->id_level == 1) { ?>
															<h5><b>Level :</b> <button type="button" class="btn btn-flat btn-sm btn-info" disabled><?= $level->level ?></button></h5>
														<?php }else{ ?>
															<h5><b>Level :</b> <button type="button" class="btn btn-flat btn-sm btn-danger" disabled><?= $level->level ?></button></h5>
														<?php } ?>
													</td>
												</tr>
											</thead>
										</table>
									</div>
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th><center>Menu</center></th>
												<th><center>Icon</center></th>
												<th><center>Aksi</center></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($menu_all as $row) : ?>
												<?php
													$akses_menu = "SELECT * FROM mr_akses_menu WHERE id_level = $level->id_level AND id_menu = $row->id_menu";
													$akses_menu = $this->db->query($akses_menu)->row_array();
												?>
												<tr>
													<td><center><?= $row->menu ?></center></td>
													<td><center><?= $row->icon ?></center></td>
													<td>
														<center>
															<div class="form-check">
																<?php if ($akses_menu['id_menu'] == $row->id_menu) { ?>
																	<input type="checkbox" class="form-check-input coba" checked data-level="<?= $level->id_level ?>" data-menu="<?= $row->id_menu ?>">
																<?php }else{ ?>
																	<input type="checkbox" class="form-check-input coba" data-level="<?= $level->id_level ?>" data-menu="<?= $row->id_menu ?>">
																<?php } ?>
															</div>
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

	$('.form-check-input').on('click', function(){
		let idLevel = $(this).data('level');
		let idMenu = $(this).data('menu');
		var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
    		csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

		$.ajax({
			url : "<?php echo base_url(); ?>Master/ChangeAksesAction",
			type : 'post',
			data : {
				id_level : idLevel,
				id_menu : idMenu,
				<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo
				$this->security->get_csrf_hash(); ?>'
			},
			success : function(){
				document.location.href = "<?= base_url('Master/changeAccess/'); ?>" + btoa(idLevel);
			}
		});
	});

</script>