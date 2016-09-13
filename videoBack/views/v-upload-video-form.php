
<!-- konten -->
<section id="main" role="main" class="mt10">
	<!--js buat menampilakan priview video sebelum di upload  -->
	<script type="text/javascript" src="<?= base_url('assets/library/jquery/js/preview.js') ?>"></script>
	<!-- js untuk progres bar file yg di upload -->
	<script type="text/javascript" src="<?= base_url('assets/library/jquery/js/upbar.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/library/jquery/js/jequery.form.js') ?>"></script>

	<div class="col-md-12">
		<!-- START Form panel -->
		<form  class="panel panel-default form-horizontal form-bordered" action="<?=base_url()?>index.php/videoback/upvideo" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<div class="panel-heading"><h5 class="panel-title">Upload Video</h5></div>
			<div class="panel-body pt0">
				<div class="form-group message-container"></div><!-- will be use as done/fail message container -->

				<div  class="form-group">
					<label class="col-sm-1 control-label">Tingkat</label>
					<div class="col-sm-4">
						<select class="form-control" name="tingkat" id="tingkat">
							<option>-Pilih Tingkat-</option>

						</select>
					</div>

					<label class="col-sm-2 control-label">Mata Pelajaran</label>
					<div class="col-sm-4">
						<select class="form-control" name="mataPelajaran" id="pelajaran">

						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-1 control-label">Bab</label>
					<div class="col-sm-4">
						<select class="form-control" name="bab" id="bab">

						</select>
					</div>

					<label class="col-sm-2 control-label">Subab</label>
					<div class="col-sm-4">
						<select class="form-control" name="subBab" id="subbab">

						</select>
					</div>
				</div>

				<!-- untuk preview video -->
				<div  class="form-group">
					<video id="preview" class="img-tumbnail image" src="" width="100%" height="50%" controls></video>
					<div class="row" style="margin:1%;"> 
						<div class="col-md-5 left"> 
							<h6>Name: <span id="filename"></span></h6> 
						</div> 
						<div class="col-md-4 left"> 
							<h6>Size: <span id="filesize"></span>Kb</h6> 
						</div> 
						<div class="col-md-3 bottom"> 
							<h6>Type: <span id="filetype"></span></h6> 
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-11 bottom">		
							<progress id="prog" max="100" value="0" style="display:none;"></progress>
						</div>
					</div>

					<div id="upload" class="form-group">
						<label class="col-sm-2 control-label">File Video</label>
						<div class="col-sm-4">
							
							<label for="file" class="btn btn-success">
								Pilih Video
							</label>
							<input style="display:none;" type="file" id="file" name="video"/>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Judul Video</label>
						<div class="col-sm-9">
							<input type="text" name="judulvideo" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Deskripsi Video</label>
						<div class="col-sm-9">
							<textarea class="form-control" name="deskripsi"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2">Published</label>
						<div class="col-sm-4">
							<select name="publish" class="form-control">
								<option selected="">Select</option>
								<option value="0">Private</option>
								<option value="1">Public</option>
							</select>
						</div>
					</div>

					<div class="panel-footer">
						<button type="reset" class="btn btn-default">Reset</button>
						<button type="submit" class="btn btn-success ladda-button" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
					</div>

				</form>
				<!--/ END Form panel -->
			</div>
		</div>
		<!--/ END row -->

	</section>


	<script>
	// Script for getting the dynamic values from database using jQuery and AJAX
	$(document).ready(function() {
		$('#eTingkat').change(function() {

			var form_data = {
				name: $('#eTingkat').val()
			};

			$.ajax({
				url: "<?php echo site_url('videoback/getPelajaran'); ?>",
				type: 'POST',
				data: form_data,
				success: function(msg) {
					var sc='';
					$.each(msg, function(key, val) {
						sc+='<option value="'+val.id+'">'+val.keterangan+'</option>';
					});
					$("#ePelajaran option").remove();
					$("#ePelajaran").append(sc);
				}
			});
		});
	});


// function loadmatapelajaran(){

// }

//buat load tingkat
function loadTingkat(){
	jQuery(document).ready(function(){
		var tingkat_id = {"tingkat_id" : $('#tingkat').val()};
		var idTingkat;

		$.ajax({
			type: "POST",
			data: tingkat_id,
			url: "<?= base_url() ?>index.php/videoback/getTingkat",

			success: function(data){
				console.log("Data"+data); 
				$('#tingkat').html('<option value="">-- Pilih Tingkat  --</option>');
				$.each(data, function(i, data){
					$('#tingkat').append("<option value='"+data.id+"'>"+data.aliasTingkat+"</option>");
					return idTingkat=data.id;
				});
			}
		});
		
		$('#tingkat').change(function(){
			tingkat_id={"tingkat_id" : $('#tingkat').val()};
			loadPelajaran($('#tingkat').val());
		})

		$('#pelajaran').change(function(){
			pelajaran_id = {"pelajaran_id":$('#pelajaran').val()};
			load_bab($('#pelajaran').val());
		})

		$('#bab').change(function(){
			load_sub_bab($('#bab').val());
			loadPelajaran(idTingkat);
		})
	})};

	//buat load pelajaran
	function loadPelajaran(tingkatID){
		$.ajax({
			type: "POST",
			data: tingkatID.tingkat_id,

			url: "<?php echo base_url() ?>index.php/videoback/getPelajaran/"+tingkatID,
			success: function(data){
				$('#pelajaran').html('<option value="">-- Pilih Mata Pelajaran  --</option>');
				$.each(data, function(i, data){
					$('#pelajaran').append("<option value='"+data.id+"'>"+data.keterangan+"</option>");
				});
			}
		});
	}
	//buat load bab
	function load_bab(mapelID){
		$.ajax({
			type: "POST",
			data: mapelID.mapel_id,
			url: "<?php echo base_url() ?>index.php/videoback/getBab/"+mapelID,
			success: function(data){

				$('#bab').html('<option value="">-- Pilih Bab Pelajaran  --</option>');
				//console.log(data);
				$.each(data, function(i, data){
					$('#bab').append("<option value='"+data.id+"'>"+data.judulBab+"</option>");
				});
			}

		});
	}
	//load sub bab
	function load_sub_bab(babID){
		$.ajax({
			type: "POST",
			data: babID.bab_id,
			url: "<?php echo base_url() ?>index.php/videoback/getSubbab/"+babID,
			success: function(data){
				$('#subbab').html('<option value="">-- Pilih Sub Bab Pelajaran  --</option>');
				console.log(data);
				$.each(data, function(i, data){
					$('#subbab').append("<option value='"+data.id+"'>"+data.judulSubBab+"</option>");
				});
			}

		});
	}


	loadTingkat();
	</script>
