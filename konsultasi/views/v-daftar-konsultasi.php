<main class="container">
	<div class="page-content">
		<section>
			<h2><a href="<?=base_url('konsultasi/buatkonsultasi') ?>" class="cws-button bt-color-3 border-radius icon-left"><i class="fa fa-plus"></i>Buat Pertanyaan</a></h2>
			<!-- tabs -->
			<div class="tabs">
				<div class="block-tabs-btn clear-fix">
					<div class="tabs-btn active" data-tabs-id="tabs1">Semua Konsultasi</div>
					<div class="tabs-btn" data-tabs-id="tabs2">Konsul Terbaru</div>
					<div class="tabs-btn" data-tabs-id="tabs3">Pertanyaan saya</div>
				</div>
				<!-- tabs keeper -->
				<div class="tabs-keeper">
					<!-- tabs container -->
					<div class="container-tabs active" data-tabs-id="cont-tabs1" style="display: block;">
						<form class="form-group">
							<p class="input-icon">
								<i class="fa fa-search"></i>
								<input type="text" placeholder="Cari Pertanyaan" name="search_data" id="search">
							</p>
						</form>
						<?php foreach ($questions as $question): ?>

							<div class="blog-post">
								<article>
									<hr class="divider-color">
									<br><br>
									<div class="quotes clear-fix">
										<div class="quote-avatar-author clear-fix">
											<img src="<?=base_url("assets/image/photo/siswa/".$question['photo'])?>" 
											data-at2x="<?=base_url("assets/image/photo/siswa/".$question['photo'])?>" 
											width=60
											alt=""><div class="author-info"><?=$question['namaDepan']." ".$question['namaBelakang'] ?><br></div></div>
											<q><b><?=$question['judulPertanyaan'] ?></b><span title="waktu dibuat"> (<?=$question['date_created'] ?>)</span><br> 
												<?=$question['isiPertanyaan'] ?>
											</q>
										</div>
										<br>
										<div class="tags-post">
											<a href="#" rel="tag"><?=$question['judulSubBab'] ?></a><a href="#" rel="tag">jumlah</a>
										</div>
										<a href="blog-post.html" class="cws-button border-radius alt icon-right">
											Read More 
											<i class="fa fa-angle-right"></i></a>
										</article>
									</div>

									<!-- / blog item -->
								<?php endforeach ?>
													<!-- pagination -->
					<div class="page-pagination clear-fix">
					<a href="#"><i class="fa fa-angle-double-left"></i></a><!--
					--><a href="#">1</a><!-- 
					--><a href="#">2</a><!-- 
					--><a href="#" class="active">3</a><!-- 
				--><a href="#"><i class="fa fa-angle-double-right"></i></a>
			</div>
			<!-- / pagination -->
							</div>


							<!--/tabs container -->
							<div class="container-tabs" data-tabs-id="cont-tabs2" style="display: none;"><strong>Maecenas aliquam risus et neque euismod, vel luctus nulla tincidunt.</strong><br> Praesent ut dui sit amet ipsum scelerisque rhoncus.<br><br> Vivamus eu porttitor lectus. Nullam varius lacinia congue. Donec ac dapibus elit. Proin facilisis nulla in est mattis, ut dapibus justo.Cras porta dictum condimentum. Nulla magna erat, facilisis non velit eu, suscipit bibendum quam. Phasellus sit amet viverra neque.</div>
							<!-- tabs container -->
							<div class="container-tabs" data-tabs-id="cont-tabs3" style="display: none;">
								<form class="form-group">
									<p class="input-icon">
										<i class="fa fa-search"></i>
										<input type="text" placeholder="Cari Pertanyaan" name="search_data" id="search">
									</p>
								</form>
								<?php foreach ($my_questions as $question): ?>

									<div class="blog-post">
										<article>
											<hr class="divider-color">
											<br><br>
											<div class="quotes clear-fix">
												<div class="quote-avatar-author clear-fix">
													<img src="<?=base_url("assets/image/photo/siswa/".$question['photo'])?>" 
													data-at2x="<?=base_url("assets/image/photo/siswa/".$question['photo'])?>" 
													width=60
													alt=""><div class="author-info"><?=$question['namaDepan']." ".$question['namaBelakang'] ?><br></div></div>
													<q><b><?=$question['judulPertanyaan'] ?></b><span title="waktu dibuat"> (<?=$question['date_created'] ?>)</span><br> 
														<?=$question['isiPertanyaan'] ?>
													</q>
												</div>
												<br>
												<div class="tags-post">
													<a href="#" rel="tag"><?=$question['judulSubBab'] ?></a><a href="#" rel="tag">jumlah</a>
												</div>
												<a href="blog-post.html" class="cws-button border-radius alt icon-right">
													Read More 
													<i class="fa fa-angle-right"></i></a>
												</article>
											</div>

											<!-- / blog item -->
										<?php endforeach ?>
															<!-- pagination -->
					<div class="page-pagination clear-fix">
					<a href="#"><i class="fa fa-angle-double-left"></i></a><!--
					--><a href="#">1</a><!-- 
					--><a href="#">2</a><!-- 
					--><a href="#" class="active">3</a><!-- 
				--><a href="#"><i class="fa fa-angle-double-right"></i></a>
			</div>
			<!-- / pagination -->
									</div>

									<!--/tabs container -->
									<!-- tabs container -->

									<!--/tabs container -->
								</div>
								<!--/tabs keeper -->
							</div>
							<!-- /tabs -->
						</section>
					</div>
				</div>
			</main>
			<script type="text/javascript">
				$(this).ready( function() {  
					$("#search").autocomplete({  

						minLength: 1,  
						source:   
						function(req, add){  
							$.ajax({  
								url: "<?php echo base_url(); ?>index.php/autocomplete/lookup",  
								dataType: 'json',  
								type: 'POST',  
								data: req,  
								success:      
								function(data){  
									if(data.response =="true"){  
										add(data.message);  
										console.log(data);
									}  
								},  
							});  
						},  

					});  
				});  
			</script>