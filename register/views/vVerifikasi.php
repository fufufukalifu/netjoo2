<!-- START Template Main -->
<section id="main" role="main">
	<!-- START page header -->
	<section class="page-header page-header-block nm">
		<!-- pattern -->
		<div class="pattern pattern9"></div>
		<!--/ pattern -->
		<div class="container pt15 pb15">
			<div class="page-header-section">
				<h4 class="title font-alt">Konfirmasi Akun</h4>
			</div>
			<div class="page-header-section">
				<!-- Toolbar -->
				<div class="toolbar">
					<ol class="breadcrumb breadcrumb-transparent nm">
						<li><a href="<?= base_url(); ?>">Beranda</a></li>
						<li class="active"><a href="<?php echo base_url('index.php/login/logout'); ?>">Logout</a></li>

					</ol>
				</div>
				<!--/ Toolbar -->
			</div>
		</div>
	</section>
	<!--/ END page header -->

	<!-- START Register Content -->
	<section class="section bgcolor-white">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Header -->
					<div class="section-header section-header-bordered text-center">
						<h2 class="section-title">
							<p class="font-alt nm">Konfirmasi Akun Joonet</p>
						</h2>
					</div>
					<!--/ Header -->
				</div>

				<div class="col-md-6 col-md-offset-3">
					

					<form class="panel nm" name="form-register" action="<?=base_url()?>index.php/register/ch_mail_aktivasi" method="post">
						<ul class="list-table pa15">
							<li>
								<!-- Alert message -->
								<div class="alert alert-warning">
									<span class="semibold">Info :</span>&nbsp;&nbsp; Kode aktivasi telah dikirim ke emailmu. Silahkan cek email. 
									<a href="<?=base_url('index.php/register/resend_mail/');?>"> Tidak terkirim? Kirim ulang email </a>
								</div>
								<!--/ Alert message -->
							</li>
						</ul>


						<hr class="nm">

						<!-- Star form konfirmasi akun by email -->
						<div class="panel-body">
							<p class="semibold text-muted">Jika email verifikasi tidak terkirim, masukan kembali emailmu dengan benar?</p>
							<div class="form-group">
								<label class="control-label">Email</label>
								<div class="has-icon pull-left">
									<input type="email" class="form-control" name="email" placeholder="xxx@mail.com">
									<i class="ico-envelop form-control-icon"></i>
									<!-- untuk menampilkan pesan kesalahan penginputan email -->
									<span class="text-danger"><?php echo form_error('email'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<div class="checkbox custom-checkbox">  
									<input type="checkbox" name="agree" id="agree" value="1" required="">  
									<label for="agree">&nbsp;&nbsp;I agree to the <a class="semibold" href="javascript:void(0);">Term Of Services</a></label>   
								</div>
							</div>

						</div>
						<!-- end form konfirmasi akun by email -->
						<div class="panel-footer">
							<button type="submit" class="btn btn-block btn-success"><span class="semibold">Sign up</span></button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</section>
	<!--/ END Register Content -->

	<!-- START To Top Scroller -->
	<a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
	<!--/ END To Top Scroller -->
</section>
<!--/ END Template Main -->
