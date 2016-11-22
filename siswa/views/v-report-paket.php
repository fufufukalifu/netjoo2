<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/css/jquery.datatables.min.css'); ?>">
<section id="main" role="main">
    <div class="col-md-12">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Report Paket Tryout</h4>
                    <!-- Trigger the modal with a button -->
                    <br>
                    <!--<a data-toggle="modal" class="btn btn-default pull-right"  "  data-target="#myModal">Tambah</a>-->
                </div>

                <div class="tab-pane" id="tingkatSMP">

                    <!--<table class="table table-striped" id="mapelsmp" style="font-size: 13px">-->

                    <table id="" class="table table-striped display" cellspacing="0" width="100%">

                        <thead>

                            <tr>
                                <th>No</th>
                                <th>Paket</th>
                                <th>Waktu Pengerjaan</th>
                                <th>Jumlah Soal</th>
                                <th>Benar</th>
                                <th>Salah</th>
                                <th>Kosong</th>
                                <!--<th>Level Soal</th>-->
                                <th>Skore</th>
                            </tr>

                        </thead>

                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($reportpaket as $key) {
                                ?>
                                <tr>
                                    <td class="text-center"><?= $i ?></td>
                                    <td><?= $key['nm_latihan'] ?></td>
                                    <td><?= $key['tgl_pengerjaan'] ?></td>
                                    <td class="text-center"><?= $key['jmlh_benar'] + $key['jmlh_salah'] + $key['jmlh_kosong'] ?></td>
                                    <td class="text-center"><?= $key['jmlh_benar'] ?></td>
                                    <td class="text-center"><?= $key['jmlh_salah'] ?></td>
                                    <td class="text-center"><?= $key['jmlh_kosong'] ?></td>
                                    <td><?= $key['durasi_pengerjaan'] / 60 ?> Menit</td>
                                    <td><?= $key['skore'] ?></td>
                                </tr>

                            <?php $i++;};
                            ?>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        $('table.display').DataTable();
    });
</script>