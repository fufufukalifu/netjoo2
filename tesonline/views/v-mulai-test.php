

<div class="modal fade " tabindex="-1" role="dialog" id="myModal">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><br>
  </div>
  <div class="modal-body">
    <div id="chartContainer" style="height: 400px; width: 100%;">
    </div>
    <div class="modal-footer bg-color-3">

    </div>
  </form>

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>


<div class="modal fade " tabindex="-1" role="dialog" id="myModal2">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">


      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>


<!-- START Blog Content -->
<section class="section bgcolor-white"> 
  <div class="container">
   <!-- START Row -->
   <div class="row">
    <!-- START Left Section -->
    <div class="col-md-3 mb15">
     <!-- Category -->
     <div class="mb15">
      <!-- Header -->
      <div class="section-header section-header-bordered mb10">
       <h4 class="section-title">
         <p class="font-alt nm">Menu</p>
       </h4>
     </div>
     <!--/ Header -->
     <a href="<?=base_url('index.php/tesonline') ?>" class="cws-button small bt-color-3"><i class="glyphicon glyphicon-plus"></i> Latihan</a>
     <a onclick="show_report();" class="cws-button small bt-color-3"><i class="glyphicon glyphicon-list-alt"></i> Daftar Latihan</a>
   </ul>
 </div>
 <!--/ Category -->

 <!-- Category -->
 <div class="mb15">
  <!-- Header -->
  <div class="section-header section-header-bordered mb10">
   <h4 class="section-title">
    <p class="font-alt nm">Filter By</p>
  </h4>
</div>
<!--/ Header -->
<ul class="list-unstyled">
 <li class="mb5"><i class="ico-angle-right text-muted mr5"></i> 
  <form>
   <p class="has-succes">
    <select>
     <option>- Pilih Filter-</option>
     <option>Pelajaran</option>
     <option>Status</option>
   </select>
 </p>

</form>
</li>
</ul>
</div>
<!--/ Category -->

<!-- Text Widget -->
<div class="mb15" >
  <!-- Header -->
  <div class="section-header section-header-bordered mb10">
   <h4 class="section-title">
    <p class="font-alt nm">Deskripsi</p>
  </h4>
</div>
<!--/ Header -->
<p class="nm text-default">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
 consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
<!--/ Text Widget -->
</div>
<!--/ END Left Section -->

<style type="text/css">
  .table th:hover{
    cursor: hand;
  }
</style>
<!-- top -->
<div class="col-md-9">
  <h3>Daftar Latihan</h3>
  <div class="col-md-12">
    <?php if ($latihan==array()): ?>
      <h4>Tidak ada latihan.</h4>
    <?php else: ?>
      <table class="table" style="font-size: 13px" id="zero-configuration">
        <thead>
         <tr>
          <th>Id</th>
          <th>Nama Latihan</th>
          <th>Tingkat Kesulitan</th>
          <th>Status Pengerjaan</th>
          <th>Jumlah Soal</th>
          <th>Tanggal Dibuat</th>
          <th width="2%">Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($latihan as $latihanitem): ?>
          <tr>
            <td><?=$latihanitem['id_latihan'] ?></td>
            <td><?=$latihanitem['nm_latihan'] ?></td>
            <td><?=$latihanitem['tingkatKesulitan'] ?></td>
            <td><?=$latihanitem['status_pengerjaan'] ?></td>
            <td><?=$latihanitem['jumlahSoal'] ?></td>
            <td><?=$latihanitem['date_created'] ?></td>

            <td>
              <a class="btn btn-success detail-<?=$latihanitem['id_latihan']?>" 
                title="Kerjakan" 
                onclick="mulai_test(<?=$latihanitem['id_latihan'] ?>)"
                ><i class="glyphicon glyphicon-pencil"></i></a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>

    <?php endif ?>
  </div>

</div>

<div class="col-md-9">
  <h3>Daftar Report</h3>
  <div class="col-md-12">
    <?php if ($report==array()): ?>
      <h4>Tidak ada Report Latihan.</h4>
    <?php else: ?>
      <table class="table 2" style="font-size: 13px">
        <thead>
         <tr>
          <th>Id</th>
          <th>Nama Latihan</th>
          <th>Tingkat Kesulitan</th>
          <th>Tanggal Dibuat</th>
          <th width="2%">Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($report as $reportitem): ?>
          <tr>
            <td><?=$reportitem['id_latihan'] ?></td>
            <td><?=$reportitem['nm_latihan'] ?></td>
            <td><?=$reportitem['tingkatKesulitan'] ?></td>
            <td><?=$reportitem['tgl_pengerjaan'] ?></td>
            
            <td>
              <a class="btn btn-primary modal-on<?=$reportitem['id_latihan']?>" 
                title="Lihat score" 
                onclick="lihat_grafik(<?=$reportitem['id_latihan'] ?>)" 
                data-todo='<?=json_encode($reportitem)?>'
                ><i class="glyphicon glyphicon-list-alt"></i></a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
<?php endif ?>
</div>
</div>




</section>
<!--/ END Blog Content -->

<!-- START To Top Scroller -->
<a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
<!--/ END To Top Scroller -->

</section>
<!--/ END Template Main -->
<script type="text/javascript"> 
  function load_grafik(data) {
   var report = {
     durasi:0,
     level:0,
     poin:0,
     konstanta:0,
     score:0};

     //report.durasi = 10;
     report.jumlah_soal = parseInt(data.jumlahSoal);
     report.level = parseInt(data.tingkatKesulitan);
     report.poin = parseInt(data.jmlh_benar);
     //report.konstanta =  report.durasi * report.jumlah_soal;
     report.score = data.jmlh_benar;


     var chart = new CanvasJS.Chart("chartContainer", {
       title: {
        text: "nama latihan : "+data.nm_latihan+" - Score : "+report.score
      },
      animationEnabled: true,
      theme: "theme1",
      data: [
      {
        type: "doughnut",
        indexLabelFontFamily: "Garamond",
        indexLabelFontSize: 20,
        startAngle: 0,
        indexLabelFontColor: "dimgrey",
        indexLabelLineColor: "darkgrey",
        toolTipContent: "Jumlah : {y} ",

        dataPoints: [
        { y : data.jmlh_benar, indexLabel:"Poin {y}"},
        { y: data.jmlh_salah, indexLabel: "Salah {y}" },
        { y: data.jmlh_kosong, indexLabel: "Kosong {y}" }
        ]
      }
      ]
    });
     chart.render();
   }

   function lihat_grafik(id){
    var kelas = ".modal-on"+id;
    var data = $(kelas).data('todo');
    $('.modal-title').text('Grafik Latihan ');
    $('#myModal').modal('show');
    load_grafik(data);
  }

  function show_report(){
    $('#myModal2').modal('show');
    $('#myModal2 modal-title').text('Report Latihan');
  }

  function mulai_test(id_latihan){
    window.location.href = base_url + "index.php/latihan/create_session_id_latihan/"+id_latihan;
  }


  $(document).ready(function(){
    $('.table').DataTable();
    $('.table 2').DataTable();

  })
  
</script>
<script src="<?= base_url('assets/back/plugins/canvasjs.min.js') ?>"></script>