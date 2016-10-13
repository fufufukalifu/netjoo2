<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/css/jquery.datatables.min.css'); ?>">
<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">


        <!-- START row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <h3 class="panel-title">Daftar Soal Berdasarkan Subbab</h3>
                        <form action="<?= base_url(); ?>index.php/banksoal/formsoal" method="get">
                            <input type="text" name="subBab" id="subBabID" value="<?= $subBab; ?>" hidden="true" >
                            <button title="Tambah Data" type="submit" class="btn btn-default pull-right"  style="margin-top:-30px;"><i class="ico-plus"></i></button>    
                        </form>
                        <hr>

                    </div>
                    <table class="table table-striped" id="tb_soalsub" style="font-size: 13px">
                        <thead>
                            <tr>
                               <th>ID</th>
                                <th>Judul Soal</th>
                                <th>Sumber</th>
                                <th>Mata Pelajaran</th>
                                <th>Tingkat Kesulitan</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Publish</th>
                                <!-- <th>Random</th> -->
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ END row -->

    </div>
    <!--/ END Template Container -->

    <!-- START To Top Scroller -->
    <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
    <!--/ END To Top Scroller -->

</section>
<!--/ END Template Main -->
<

<script type="text/javascript">
    var tb_soalsub;
    var subBab =$('#subBabID').val();
    // var idTo =$('#id_to').val();
    console.log(subBab );
    $(document).ready(function() {
        tblist_TO = $('#tb_soalsub').DataTable({ 
           "ajax": {
                    "url": base_url+"index.php/bankSoal/ajax_soalPerSub/"+subBab,
                    "type": "POST"
                    },
            "processing": true,
        });
    });

    function dropSoal(id_soal) {
        alert('masuk drop soal');
    }
</script>