<style type="text/css">

  .table th:hover{

    cursor: hand;

  }

  .pagination li:before{

    color:white;

  }

</style>
<div class="modal fade " tabindex="-1" role="dialog" id="myModal">

 <div class="modal-dialog" role="document">

  <div class="modal-content">

   <div class="modal-header">

    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><br>

  </div>

  <div class="modal-body">

    <div id="chartContainer" style="height: 400px; width: 100%;">

    </div>

  </form>



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

    <!-- top -->

    <div class="col-md-12">

      <h4>Daftar Paket TO yang Belum Dikerjakan</h4>

      <div class="col-md-12">

        <?php if ($paket==array()): ?>

          <h5>Belum ada paket Try Out.</h5>

        <?php else: ?>

          <table class="table" style="font-size: 13px">

            <thead>

             <tr>

              <th>ID Paket</th>

              <th>Nama Paket Soal</th>

              <th>Status</th>

              <th width="10%">Aksi</th>

            </tr>

          </thead>



          <tbody>

            <?php foreach ($paket as $paketitem):?>

              <tr>

                <td><?=$paketitem['id_paket'] ?></td>

                <td><?=$paketitem['nm_paket'] ?></td>

                <td>Belum Dikerjakan</td>

                <td>

                  <a onclick="kerjakan(<?=$paketitem['id_paket']?>)" 

                   class="btn btn-success border-radius modal-on<?=$paketitem['id_paket']?>"

                   data-todo='<?=json_encode($paketitem)?>'><i class="glyphicon glyphicon-pencil"></i></a>



                 </td>

               </tr>

             <?php endforeach ?>

           </tbody>

         </table>

       <?php endif ?>

     </div>



   </div>





   <div class="col-md-12">

    <section>

      <!-- gallery navigation -->

      <h4>Paket Soal yang Sudah Dikerjakan</h4>
      <!-- gallery container -->
      <div class="col-md-12">
        <?php if($paket_dikerjakan==array()): ?>
          <h5>Tidak ada paket soal.</h5>
        <?php else: ?>
          <table class="table" style="font-size: 13px">
            <thead>
             <tr>
              <th>ID Paket</th>
              <th>Nama Paket Soal</th>
              <th width="10%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($paket_dikerjakan as $paketitem): ?>
              <tr>
                <td><?=$paketitem['id'] ?></td>
                <td><?=$paketitem['nm_paket'] ?></td>
                <td><a onclick="detail_paket(<?=$paketitem['id_paket']?>)" 
                  class="cws-button border-radius bt-color-2 modal-on<?=$paketitem['id_paket']?>"
                  data-todo='<?=json_encode($paketitem)?>'>Lihat Score</a></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        <?php endif ?>

      </div>

    </div>

  </div>

  <!-- / gallery container -->

</section>

</div>

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



  function kerjakan(id_to){

    var kelas = ".modal-on"+id_to;

    var data_to = $(kelas).data('todo');

    url = base_url+"index.php/tryout/buatto";



    

    var datas = {

      id_paket:data_to.id_paket,

      id_tryout:data_to.id_tryout,

      id_mm_tryoutpaket:data_to.id

    }



    $.ajax({

      url : url,

      type: "POST",

      data: datas,

      dataType: "TEXT",

      success: function(data)

      {

       window.location.href = base_url + "index.php/tryout/mulaitest";

     },

     error: function (jqXHR, textStatus, errorThrown)

     {

      console.log("gagal");

    }

  });







  }

  function detail_paket(id_to){

    var kelas = ".modal-on"+id_to;

    var data_to = $(kelas).data('todo');

    console.log(data_to);

    $('.modal-title').text('Grafik Paket Soal Tryout');

    $('#myModal').modal('show');

    load_grafik(data_to);

  }

  function load_grafik(data) {



   var chart = new CanvasJS.Chart("chartContainer", {

     title: {

      text: "Nama Paket : "+data.nm_paket

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

      { y : data.total_nilai, indexLabel:"Poin {y}"},

      { y: data.jmlh_salah, indexLabel: "Salah {y}" },

      { y: data.jmlh_kosong, indexLabel: "Kosong {y}" },

      { y: data.jmlh_benar, indexLabel: "Benar {y}" },



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



$(document).ready(function() {

  $(".table").dataTable();

  $("#owl2").owlCarousel();

});



</script>

<script src="<?= base_url('assets/back/plugins/canvasjs.min.js') ?>"></script>