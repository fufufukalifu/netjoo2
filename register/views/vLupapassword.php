<main>
    <section class="fullwidth-background bg-2">
        <div class="grid-row">
            <div class="login-block" style="min-width: 50%">
                <div class="logo">
                    <img src="<?= base_url('assets/back/img/logo.png') ?>" data-at2x='img/logo@2x.png' alt>
                    <!--<h4>Login</h4>-->
                </div>
                <form class="panel nm" name="form-register" action="<?= base_url() ?>index.php/register/ch_sent_reset" method="post">

                    <!-- Alert message -->
                    <!--                                <div class="alert alert-warning">
                                                        <span class="semibold">Info :</span>&nbsp;&nbsp;Kami akan kirimkan kode reset password ke email akun mu.
                                                    </div>-->
                    <!--/ Alert message -->
                    <?php if ($this->session->flashdata('notif') != '') {
                        ?>
                        <div class="alert alert-warning">
                            <span class="semibold">Note :</span><?php echo $this->session->flashdata('notif'); ?>
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-warning">
                            <span class="semibold">Note :</span>&nbsp;&nbsp;Kami akan kirimkan kode reset password ke email akun mu.
                        </div>
                    <?php }; ?>



                    <hr class="nm">

                    <!-- Star form konfirmasi akun by email -->
                    <div class="panel-body" >
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <div class="has-icon">
                                <input type="email" class="form-control" name="email" placeholder="xxx@mail.com" required>
                                <i class="ico-envelop form-control-icon"></i>
                                <!-- untuk menampilkan pesan kesalahan penginputan email -->
                            </div>
                        </div>

                    </div>
                    <!-- end form konfirmasi akun by email -->
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-block btn-success"><span class="semibold">Submit</span></button>
                    </div>
                </form>

            </div>
        </div>
        <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
    </section>
</main>
