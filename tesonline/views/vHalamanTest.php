<!-- START Body --><body class="bgcolor-white">    <!-- START Template Main -->    <section id="main" role="main">        <!-- START page header -->        <section class="page-header page-header-block nm" style="">            <!-- pattern -->            <!--/ pattern -->            <div class="container pt15 pb15">                <div class="">                    <div class="page-header-section text-center">                        <img src="<?= base_url('assets/back/img/logo.png') ?>" width="70px"  alt>                        <p class="title font-alt">Latihan Online</p>                    </div>                </div>            </div>        </section>        <!--/ END page header -->        <!-- START Register Content -->        <section class="section bgcolor-white">            <div class="container">                <div class="row">                    <div class="col-md-12">                        <div class="content tryout-soal">                            <div class="paginate pagination-lg">                                <div class="col-md-8">                                    <div class="items">                                        <form action="<?= base_url('index.php/tesonline/cekjawaban') ?>" method="post" id="hasil" onsubmit="return deleteAllCookies('seconds', 'minutes')">                                            <?php $i = 1; ?>                                            <?php foreach ($soal as $key): ?>                                                <div class="">                                                    <!--START panel-->                                                     <div class="konten">                                                        <div class="panel panel-default" style="min-height:400px;">                                                            <div class="panel-heading">                                                                <div class="row">                                                                    <div class="col-md-6 center"><h4 class="">Matematika - <small>Pertambahan</small></h4></div>                                                                    <div class="col-md-2"></div>                                                                    <div class="col-md-4 text-right"><h4 id="timer">Sumber</h4></div>                                                                </div>                                                            </div>                                                            <div class="panel-collapse">                                                                <div class="panel-body">                                                                    <div class="row">                                                                        <div class="col-md-1 text-right">                                                                            <p><h4><?= $i ?>.</h4></p>                                                                        </div>                                                                        <div class="col-md-11">                                                                            <h4><?= $key['soal'] ?></h4>                                                                            <br>                                                                        </div>                                                                      </div>                                                                    <div class="row">                                                                        <div class="col-md-10 col-md-offset-1">                                                                            <?php                                                                            $k = $key['soalid'];                                                                            $pilihan = array("A", "B", "C", "D", "E");                                                                            $indexpil = 0;                                                                            ?>                                                                            <?php foreach ($pil as $row): ?>                                                                                <?php                                                                                if ($row['pilid'] == $k) {                                                                                    ?>                                                                                    <div class="mb10">                                                                                        <input type="radio" id="radio01" value="<?= $row['pilpil'] ?>" name="pil[<?= $row['pilid'] ?>]" /><!--                                                                                        <?= $pilihan[$indexpil];                                                                                        $indexpil++; ?>.-->                                                                                    <?= $row['piljaw'] ?>                                                                                    </div>                                                                                    <?php                                                                                } else {                                                                                    $indexpil = 0;                                                                                }                                                                                ?>    <?php endforeach ?>                                                                        </div>                                                                    </div>                                                                </div>                                                                <!--/ panel body with collapse capabale-->                                                             </div>                                                        </div>                                                        <!--panel heading/header-->                                                     </div>                                                </div>                                                <?php $i++; ?><?php endforeach; ?>                                    </div>                                    <div class="row">                                        <div class="col-md-12">                                            <ul class="pager">                                                <div class="">                                                    <div class="col-md-6">                                                         <li><a href="#" class="previousPage btn btn-teal btn-block" style="">&lsaquo; Sebelumnya</a></li>                                                        <!--<button type="button" class="btn btn-teal btn-block">Sebelumnya</button>-->                                                    </div>                                                    <div class="col-md-6">                                                        <li><a href="#" class="nextPage btn-primary btn-block">Selanjutnya &rsaquo;</a></li>                                                        <!--<button type="button" class="btn btn-primary btn-block">Selanjutnya</button>-->                                                    </div>                                                </div>                                            </ul>                                        </div>                                    </div>                                </div>                                <!--<div style="clear: both"></div>-->                                <div class="col-md-4" style="">                                    <div class="panel panel-default"  style="min-height:400px;">                                        <!--panel heading/header-->                                         <div class="panel-heading">                                            <div class="row">                                                <div class="text-center"><h4>Lembar Jawaban</h4></div>                                            </div>                                        </div>                                        <!--/ panel heading/header-->                                         <!--panel body with collapse capabale-->                                         <div class="panel-collapse">                                            <div class="panel-body">                                                <div class="row">                                                    <div class="col-md-12" style="">                                                        <ul class="pager">                                                            <div class="col-md-12">                                                                <li class="pageNumbers"></li>                                                                <hr>                                                            </div>                                                        </ul>                                                          <div class="col-md-12"> <button type="submit" class="btn btn-info btn-block" onclick="return confirm('Yakin sudah selesai mengerjakan latihan?');">Kumpulkan Jawaban</button></div>                                                    </div>                                                </div>                                              </div>                                            <!--/ panel body with collapse capabale-->                                         </div>                                        <!--/ END panel-->                                     </div>                                </div>                                </form>                            </div>                        </div>                    </div>                </div>            </div>        </section>        <!--/ END Register Content -->        <!-- START To Top Scroller -->        <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>        <!--/ END To Top Scroller -->    </section>    <!--/ END Template Main -->