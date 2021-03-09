<?php $this->load->view('template/import_css'); ?>

<body class="hold-transition layout-top-nav">
	<div class="wrapper">
		<div class="content-wrapper">
			<div class="content-header"></div>
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-lg-12" style="margin-top: ">          
							<div class="row">
								<div class="col-lg-12">          
									<div class="error-page">
										<h2 class="headline text-warning">
											<center><b>404</b></center>
										</h2>
										<div class="error-content">
											<h3>
												<i class="fas fa-exclamation-triangle text-warning"></i> 
												<b>Halaman Tidak Ditemukan</b>
											</h3>
											<p>
												Sama seperti jodoh, halaman yang anda cari tidak dapat ditemukan.
												Jangan khawatir anda hanya tersesat.<br>
											</p>
											<?=  anchor('User','Kembali Ke Beranda',[
													'class'=>'btn btn-warning'
												]) 
											?>
										</div>	
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<aside class="control-sidebar control-sidebar-dark">
			<div class="p-3">
				<h5>Title</h5>
				<p>Sidebar content</p>
			</div>
		</aside>
	</div>


<?php $this->load->view('template/import_js'); ?>