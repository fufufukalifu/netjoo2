<!DOCTYPE html>
<html class="backend">
    <!-- START Head -->
    <head>
        <!-- START META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=$judul_halaman;?></title>
        <meta name="author" content="pampersdry.info">
        <meta name="description" content="Adminre is a clean and flat backend and frontend theme build with twitter bootstrap 3.1.1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('assets/image/touch/apple-touch-icon-144x144-precomposed.png') ?>">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets/image/touch/apple-touch-icon-114x114-precomposed.png') ?>">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('assets/image/touch/apple-touch-icon-72x72-precomposed.png') ?>">
        <link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/image/touch/apple-touch-icon-57x57-precomposed.png') ?>">
        <link rel="shortcut icon" href="<?= base_url('assets/image/favicon.ico') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/css/jquery.datatables.min.css'); ?>">
        <script type="text/javascript" src="<?= base_url('assets/library/jquery/js/jquery.min.js') ?>"></script>
        <script>var base_url = '<?php echo base_url() ?>';</script>
        <!--/ END META SECTION -->

        <!-- START STYLESHEETS -->
        <!-- Plugins stylesheet : optional -->


        <!--/ Plugins stylesheet -->

        <!-- Application stylesheet : mandatory -->
        <link rel="stylesheet" href="<?= base_url('assets/library/bootstrap/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/stylesheet/layout.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/stylesheet/uielement.min.css') ?>">
        <!--/ Application stylesheet -->
        <!-- END STYLESHEETS -->

        <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
        <script src="<?= base_url('assets//library/modernizr/js/modernizr.min.js') ?>"></script>
        <!--/ END JAVASCRIPT SECTION -->
    </head>
    <!--/ END Head -->

    <!-- START Body -->
    <body>
        <!-- START Modal ADD BANK SOAL -->
        <div class="modal fade" id="modalsoal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>

                    
                        <!-- Start Body modal -->
                        <div class="modal-body">
                        <form  class="panel panel-default form-horizontal form-bordered" action="<?=base_url();?>index.php/banksoal/listsoal" method="get" >
                            <div  class="form-group">
                                <label class="col-sm-3 control-label">Tingkat</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="tingkat" id="gettkt">
                                        <option>-Pilih Tingkat-</option>
                                    </select>
                                </div>
                            </div>

                            <div  class="form-group">
                                <label class="col-sm-3 control-label">Mata Pelajaran</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="mataPelajaran" id="getpel">

                                    </select>
                                </div>
                            </div>

                            <div  class="form-group">
                                <label class="col-sm-3 control-label">Bab</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="bab" id="getbb">

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Subab</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="subbab" id="subb">

                                    </select>
                                </div>
                            </div>
                                
                        </div>
                        <!-- END BODY modla-->
                        <div class="modal-footer">
                            <button type="submit" id="myFormSubmit" class="btn btn-primary"  >Proses</button>                
                        </div>
                   </form> 
                </div><!-- /.modal-content -->
               
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- END  Modal ADD BANK SOAL-->



        <!-- START Modal ADD TO -->
        <div class="modal fade" id="modalto" tabindex="-1" role="dialog">
            <!--START modal dialog  -->
            <div class="modal-dialog" role="document">
                <!-- STRAT MOdal Content -->
                <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Buat TO</h4>
                    </div>
                   
                        <!-- START Modal Body -->
                        <div class="modal-body">

                            <!-- START PESAN ERROR EMPTY INPUT -->
                            <div class="alert alert-dismissable alert-danger" id="e_crtTo" hidden="true" >
                                <button type="button" class="close" onclick="hide_e_crtTo()" >×</button>
                                <strong>O.M.G.!</strong> Tolong di ISI semua.
                            </div>
                            <!-- END PESAN ERROR EMPTY INPUT -->
                             <form class="panel panel-default form-horizontal form-bordered" action="javascript:void(0);" method="post" id="form_to">
                                <div  class="form-group">
                                    <label class="col-sm-3 control-label">Nama Tryout</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" name="nmpaket" id="to_nm">
                                    </div>
                                </div>
                                <div  class="form-group">
                                    <label class="col-sm-3 control-label">Tanggal Mulai</label>
                                    <div class="col-sm-4">
                                      <input type="date" class="form-control" name="tglmulai" id="to_tglmulai">
                                    </div >
                                    <div class="col-sm-4">
                                        <input type="time" class="form-control" name="wktmulai" id="to_wktmulai" >
                                    </div>
                                </div>
                                <div  class="form-group">
                                    <label class="col-sm-3 control-label">Tanggal Berakhir</label>
                                    <div class="col-sm-4">
                                      <input type="date" class="form-control" name="tglakhir" id="to_tglakhir">
                                    </div>
                                     <div class="col-sm-4">
                                        <input type="time" class="form-control" name="wktakhir" id="to_wktakhir" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Publish</label>
                                    <div class="col-sm-8">
                                        <div class="checkbox custom-checkbox">  
                                            <input type="checkbox" name="publish" id="to_publish" value="1">  
                                            <label for="to_publish" >&nbsp;&nbsp;</label>   
                                        </div>
                                    </div>
                                </div> 
                              
                        </div>
                        <!-- END Modal Body -->
                        <!-- START Modal Footer -->
                        <div class="modal-footer">
                            <button type="submit" id="myFormSubmit" class="btn btn-primary" onclick="crtTo()"  >Proses</button>
                        </div>
                        </form>
                        <!-- START Modal Footer -->
                    
                </div>
                <!-- END MOdal Content -->

            </div>
            <!--END modal dialog  -->
        </div>
        <!-- END Modal ADD TO -->

        <!-- START Template Header -->
        <header id="header" class="navbar navbar-fixed-top">
            <!-- START navbar header -->
            <div class="navbar-header">
                <!-- Brand -->
                <a class="navbar-brand" href="javascript:void(0);">
                    <span class="logo-figure"></span>
                    <span class="logo-text"></span>
                </a>
                <!--/ Brand -->
            </div>
            <!--/ END navbar header -->

            <!-- START Toolbar -->
            <div class="navbar-toolbar clearfix">
                <!-- START Left nav -->
                <ul class="nav navbar-nav navbar-left">
                    <!-- Sidebar shrink -->
                    <li class="hidden-xs hidden-sm">
                        <a href="javascript:void(0);" class="sidebar-minimize" data-toggle="minimize" title="Minimize sidebar">
                            <span class="meta">
                                <span class="icon"></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Sidebar shrink -->

                    <!-- Offcanvas left: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                    <li class="navbar-main hidden-lg hidden-md hidden-sm">
                        <a href="javascript:void(0);" data-toggle="sidebar" data-direction="ltr" rel="tooltip" title="Menu sidebar">
                            <span class="meta">
                                <span class="icon"><i class="ico-paragraph-justify3"></i></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Offcanvas left -->

                    <!-- Message dropdown -->
                    <li class="dropdown custom" id="header-dd-message">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="icon"><i class="ico-bubbles3"></i></span>
                            </span>
                        </a>

                        <!-- mustache template: used for update the `.media-list` requested from server-side -->
                        <script class="mustache-template" type="x-tmpl-mustache">

                            {{#data}}
                            <a href="page-message-rich.html" class="media border-dotted new">
                            <span class="pull-left">
                            <img src="<?= base_url('assets//image/avatar/{{picture}}') ?>" class="media-object img-circle" alt="">
                            </span>
                            <span class="media-body">
                            <span class="media-heading">{{name}}</span>
                            <span class="media-text ellipsis nm">{{text}}</span>

                            {{#meta.star}}<span class="media-meta"><i class="ico-star3"></i></span>{{/meta.star}}
                            {{#meta.reply}}<span class="media-meta"><i class="ico-reply"></i></span>{{/meta.reply}}
                            {{#meta.attachment}}<span class="media-meta"><i class="ico-attachment"></i></span>{{/meta.attachment}}
                            <span class="media-meta pull-right">{{meta.time}}</span>
                            </span>
                            </a>
                            {{/data}}

                        </script>
                        <!--/ mustache template -->

                        <!-- Dropdown menu -->
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-header">
                                <span class="title">Messages <span class="count"></span></span>
                                <span class="option text-right"><a href="javascript:void(0);">New message</a></span>
                            </div>
                            <div class="dropdown-body slimscroll">
                                <!-- Search form -->
                                <form class="form-horizontal" action="">
                                    <div class="has-icon">
                                        <input type="text" class="form-control" placeholder="Search message...">
                                        <i class="ico-search form-control-icon"></i>
                                    </div>
                                </form>
                                <!--/ Search form -->

                                <!-- indicator -->
                                <div class="indicator inline"><span class="spinner"></span></div>
                                <!--/ indicator -->

                                <!-- Message list -->
                                <div class="media-list">
                                    <a href="page-message-rich.html" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="<?= base_url('assets//image/avatar/avatar1.jpg') ?>" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Martina Poole</span>
                                            <span class="media-text ellipsis nm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta"><i class="ico-reply"></i></span>
                                            <span class="media-meta"><i class="ico-attachment"></i></span>
                                            <span class="media-meta pull-right">20m</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="page-message-rich.html" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="<?= base_url('assets//image/avatar/avatar3.jpg') ?>" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Walter Foster</span>
                                            <span class="media-text ellipsis nm">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta"><i class="ico-attachment"></i></span>
                                            <span class="media-meta pull-right">21h</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="page-message-rich.html" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="<?= base_url('assets/image/avatar/avatar4.jpg') ?>" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Callum Santosr</span>
                                            <span class="media-text ellipsis nm">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">1d</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="page-message-rich.html" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="<?= base_url('assets/image/avatar/avatar5.jpg') ?>" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Noelani Blevins</span>
                                            <span class="media-text ellipsis nm">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">2d</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="page-message-rich.html" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="<?= base_url('assets/image/avatar/avatar8.jpg') ?>" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Carl Johnson</span>
                                            <span class="media-text ellipsis nm">Curabitur consequat, lectus sit amet luctus vulputate, nisi sem</span>
                                            <!-- meta icon -->
                                            <span class="media-meta"><i class="ico-attachment"></i></span>
                                            <span class="media-meta pull-right">2w</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="page-message-rich.html" class="media border-dotted read">
                                        <span class="pull-left">
                                            <img src="<?= base_url('assets/image/avatar/avatar9.jpg') ?>" class="media-object img-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="media-heading">Tamara Moon</span>
                                            <span class="media-text ellipsis nm">Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta"><i class="ico-attachment"></i></span>
                                            <span class="media-meta pull-right">2w</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>
                                </div>
                                <!--/ Message list -->
                            </div>
                        </div>
                        <!--/ Dropdown menu -->
                    </li>
                    <!--/ Message dropdown -->

                    <!-- Notification dropdown -->
                    <li class="dropdown custom" id="header-dd-notification">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="icon"><i class="ico-bell"></i></span>
                                <span class="hasnotification hasnotification-danger"></span>
                            </span>
                        </a>

                        <!-- mustache template: used for update the `.media-list` requested from server-side -->
                        <script class="mustache-template" type="x-tmpl-mustache">

                            {{#data}}
                            <a href="javascript:void(0);" class="media border-dotted new">
                            <span class="media-object pull-left">
                            <i class="{{icon}}"></i>
                            </span>
                            <span class="media-body">
                            <span class="media-text">{{{text}}}</span>
                            <span class="media-meta pull-right">{{meta.time}}</span>
                            </span>
                            </a>
                            {{/data}}

                        </script>
                        <!--/ mustache template -->

                        <!-- Dropdown menu -->
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-header">
                                <span class="title">Notification <span class="count"></span></span>
                                <span class="option text-right"><a href="javascript:void(0);">Clear all</a></span>
                            </div>
                            <div class="dropdown-body slimscroll">
                                <!-- indicator -->
                                <div class="indicator inline"><span class="spinner"></span></div>
                                <!--/ indicator -->

                                <!-- Message list -->
                                <div class="media-list">
                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-basket2 bgcolor-info"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text">Duis aute irure dolor in <span class="text-primary semibold">reprehenderit</span> in voluptate.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">2d</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-call-incoming"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text">Aliquip ex ea commodo consequat.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">1w</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-alarm2"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text">Excepteur sint <span class="text-primary semibold">occaecat</span> cupidatat non.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">12w</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>

                                    <a href="javascript:void(0);" class="media read border-dotted">
                                        <span class="media-object pull-left">
                                            <i class="ico-checkmark3 bgcolor-success"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="media-text">Lorem ipsum dolor sit amet, <span class="text-primary semibold">consectetur</span> adipisicing elit.</span>
                                            <!-- meta icon -->
                                            <span class="media-meta pull-right">14w</span>
                                            <!--/ meta icon -->
                                        </span>
                                    </a>
                                </div>
                                <!--/ Message list -->
                            </div>
                        </div>
                        <!--/ Dropdown menu -->
                    </li>
                    <!--/ Notification dropdown -->

                    <!-- Search form toggler  -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="dropdown" data-target="#dropdown-form">
                            <span class="meta">
                                <span class="icon"><i class="ico-search"></i></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Search form toggler -->
                </ul>
                <!--/ END Left nav -->

                <!-- START navbar form -->
                <div class="navbar-form navbar-left dropdown" id="dropdown-form">
                    <form action="" role="search">
                        <div class="has-icon">
                            <input type="text" class="form-control" placeholder="Search application...">
                            <i class="ico-search form-control-icon"></i>
                        </div>
                    </form>
                </div>
                <!-- START navbar form -->

                <!-- START Right nav -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Profile dropdown -->
                    <li class="dropdown profile">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="meta">
                                <span class="avatar"><img src="<?= base_url('assets/image/avatar/avatar7.jpg') ?>" class="img-circle" alt="" /></span>
                                <span class="text hidden-xs hidden-sm pl5"><?=$this->session->userdata['USERNAME'];?></span>
                                <span class="caret"></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="javascript:void(0);"><span class="icon"><i class="ico-user-plus2"></i></span> My Accounts</a></li>
                            <li><a href="<?=base_url('index.php/guru/pengaturanProfileguru');?>"><span class="icon"><i class="ico-cog4"></i></span> Profile Setting</a></li>
                            <li><a href="javascript:void(0);"><span class="icon"><i class="ico-question"></i></span> Help</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=base_url('index.php/login/logout');?>"><span class="icon"><i class="ico-exit"></i></span> Sign Out</a></li>
                        </ul>
                    </li>
                    <!-- Profile dropdown -->

                    <!-- Offcanvas right This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
                    <li class="navbar-main">
                        <a href="javascript:void(0);" data-toggle="sidebar" data-direction="rtl" rel="tooltip" title="Feed / contact sidebar">
                            <span class="meta">
                                <span class="icon"><i class="ico-users3"></i></span>
                            </span>
                        </a>
                    </li>
                    <!--/ Offcanvas right -->
                </ul>
                <!--/ END Right nav -->
            </div>
            <!--/ END Toolbar -->
        </header>
        <!--/ END Template Header -->

        <!-- START Template Sidebar (Left) -->
        <aside class="sidebar sidebar-left sidebar-menu">
            <!-- START Sidebar Content -->
            <section class="content slimscroll">
                <h5 class="heading">Main Menu</h5>
              <!-- START MENU -->
                <ul class="topmenu topmenu-responsive" data-toggle="menu">
                    <li >
                        <a href="<?= base_url('index.php/guru/dashboard/') ?>">
                            <span class="figure"><i class="ico-trophy"></i></span>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>


                   

                    <li>
                        <a href="javascript:void(0);" data-target="#video" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-facetime-video"></i></span>
                            <span class="text">Video</span>
                            <span class="arrow"></span>
                        </a>

                        <ul id="video" class="submenu collapse ">
                            <li class="submenu-header ellipsis">Video</li>

                            <li >
                                <a href="<?=base_url('index.php/videoBack/formupvideo')?>">
                                    <span class="text">Upload Video</span>
                                </a>
                            </li>
                            <li >
                                <a href="">
                                    <span class="text">Daftar Published Video</span>
                                </a>
                            </li>
                            <li >
                                <a href="">
                                    <span class="text">Daftar Unpublished Video</span>
                                </a>
                            </li>
                            <li >
                                <a href="">
                                    <span class="text">Daftar semua video</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-target="#banksoal" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-clipboard2"></i></span>
                            <span class="text">Bank Soal</span>
                            <span class="arrow"></span>
                        </a>

                        <ul id="banksoal" class="submenu collapse ">
                            <li class="submenu-header ellipsis">Bank Soal</li>

                            <li >
                                <a href="javascript:void(0);" onclick="add_soal()">
                                    <span class="text">Tambahkan Bank Soal</span> 
                                </a>
                            </li>
                            <li >
                                <a href="javascript:void(0);" data-target="#subbanksoal" data-toggle="submenu"  >
                                    <span class="text">Daftar Bank Soal</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul id="subbanksoal" class="submenu collapse ">
                                    <li class="submenu-header ellipsis">Sub Bank Soal</li>
                                    <li><a href="<?=base_url('index.php/banksoal/allsoal')?>"><span class="text">Daftar Semual Soal</span>
                                    </a></li>
                                     <li><a href="javascript:void(0);" onclick="add_soal()"><span class="text">Daftar Soal per-SUb-bab</span>
                                    </a></li>
                                    

                                </ul>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-target="#tryout" data-toggle="submenu" data-parent=".topmenu">
                            <span class="figure"><i class="ico-clipboard"></i></span>
                            <span class="text">Try Out</span>
                            <span class="arrow"></span>
                        </a>

                        <ul id="tryout" class="submenu collapse ">
                            <li class="submenu-header ellipsis">Try Out</li>

                            <li >
                                <a href="<?= base_url('index.php/paketsoal/tambahpaketsoal');?>">
                                    <span class="text">Paket Soal</span>
                                </a>
                            </li>

                            <li >
                                <a href="javascript:void(0);" onclick="add_to()">
                                    <span class="text">Tambahkan Try Out</span>
                                </a>
                            </li>
                            <li >
                                <a href="<?= base_url('index.php/toback/listTo');?>">
                                    <span class="text">Daftar Try Out</span>
                                </a>
                            </li>

                        </ul>
                    </li>


                </ul>
                <!--/ END Template Navigation/Menu -->
            </section>
            <!--/ END Sidebar Container -->
        </aside>
        <!--/ END Template Sidebar (Left) -->

        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold"><?=$judul_halaman;?></h4>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar">
                            <ol class="breadcrumb breadcrumb-transparent nm">
                                <li><a href="#">Page</a></li>
                                <li class="active">Starter</li>
                            </ol>
                        </div>
                        <!--/ Toolbar -->
                    </div>
                </div>

               <?php
                foreach ($files as $file) {
                    include $file;
                }
                ?>

                <!-- Page Header -->
            </div>
            <!--/ END Template Container -->

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->

        </section>
        <!--/ END Template Main -->

        <!-- START Template Sidebar (right) -->
        <aside class="sidebar sidebar-right">
            <!-- START Offcanvas -->
            <div class="offcanvas-container" data-toggle="offcanvas" data-options='{"openerClass":"offcanvas-opener", "closerClass":"offcanvas-closer"}'>
                <!-- START Wrapper -->
                <div class="offcanvas-wrapper">
                    <!-- Offcanvas Left -->
                    <div class="offcanvas-left">
                        <!-- Header -->
                        <div class="header pl0 pr0">
                            <ul class="list-table nm">
                                <li style="width:50px;">
                                    <a href="javascript:void(0);" class="btn btn-link text-default offcanvas-closer"><i class="ico-arrow-left6 fsize16"></i></a>
                                </li>
                                <li class="text-center">
                                    <h5 class="semibold nm">Settings</h5>
                                </li>
                                <li style="width:50px;" class="text-right">
                                    <a href="javascript:void(0);" class="btn btn-link text-default"><i class="ico-info22 fsize16"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!--/ Header -->

                        <!-- Content -->
                        <div class="content slimscroll">
                            <h5 class="heading">News Feed</h5>
                            <ul class="topmenu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-plus"></i></span>
                                        <span class="text">Add &amp; Manage Source</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-google-plus"></i></span>
                                        <span class="text">Google Reader</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-twitter2"></i></span>
                                        <span class="text">Twitter Source</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                            </ul>

                            <h5 class="heading">Friends</h5>
                            <ul class="topmenu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-search22"></i></span>
                                        <span class="text">Find Friends</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-user-plus2"></i></span>
                                        <span class="text">Add Friends</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                            </ul>

                            <h5 class="heading">Account</h5>
                            <ul class="topmenu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-user2"></i></span>
                                        <span class="text">Edit Account</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-envelop"></i></span>
                                        <span class="text">Manage Subscription</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-location6"></i></span>
                                        <span class="text">Location Service</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="figure"><i class="ico-switch"></i></span>
                                        <span class="text">Logout</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="text-danger">
                                        <span class="figure"><i class="ico-minus-circle2"></i></span>
                                        <span class="text">Deactivate</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--/ Content -->
                    </div>
                    <!--/ Offcanvas Left -->

                    <!-- Offcanvas Content -->
                    <div class="offcanvas-content">
                        <!-- Content -->
                        <div class="content slimscroll">
                            <!-- START profile -->
                            <div class="panel nm">
                                <!-- thumbnail -->
                                <div class="thumbnail">
                                    <!-- media -->
                                    <div class="media">
                                        <!-- indicator -->
                                        <div class="indicator"><span class="spinner"></span></div>
                                        <!--/ indicator -->
                                        <img data-toggle="unveil" src="<?= base_url('assets/image/background/400x250/placeholder.jpg') ?>" data-src="<?= base_url('assets/image/background/400x250/background3.jpg') ?>" alt="Cover" width="100%">
                                    </div>
                                    <!--/ media -->
                                </div>
                                <!--/ thumbnail -->
                            </div>
                            <div class="panel-body text-center" style="margin-top:-55px;z-index:11">
                                <img class="img-circle mb5" src="<?= base_url('assets/image/avatar/avatar7.jpg') ?>" alt="" width="75">
                                <h5 class="bold mt0 mb5">Erich Reyes</h5>
                                <p>Administrator</p>
                                <button type="button" class="btn btn-primary offcanvas-opener offcanvas-open-ltr"><i class="ico-settings"></i> Settings</button>
                            </div>
                            <!--/ END profile -->

                            <!-- START contact -->
                            <div class="media-list media-list-contact">
                                <h5 class="heading pa15 pb0">Family</h5>
                                <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                                    <span class="media-object pull-left">
                                        <img src="<?= base_url('assets/image/avatar/avatar1.jpg') ?>" class="img-circle" alt="">
                                    </span>
                                    <span class="media-body">
                                        <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Autumn Barker</span>
                                        <span class="media-meta ellipsis">Malaysia</span>
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                                    <span class="media-object pull-left">
                                        <img src="<?= base_url('assets/image/avatar/avatar2.jpg') ?>" class="img-circle" alt="">
                                    </span>
                                    <span class="media-body">
                                        <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Giselle Horn</span>
                                        <span class="media-meta ellipsis">Bolivia</span>
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                                    <span class="media-object pull-left">
                                        <img src="<?= base_url('assets/image/avatar/avatar.png') ?>" class="img-circle" alt="">
                                    </span>
                                    <span class="media-body">
                                        <span class="media-heading"><span class="hasnotification hasnotification-danger mr5"></span> Austin Shields</span>
                                        <span class="media-meta ellipsis">Timor-Leste</span>
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                                    <span class="media-object pull-left">
                                        <img src="<?= base_url('assets/image/avatar/avatar.png') ?>" class="img-circle" alt="">
                                    </span>
                                    <span class="media-body">
                                        <span class="media-heading"><span class="hasnotification hasnotification-danger mr5"></span> Caryn Gibson</span>
                                        <span class="media-meta ellipsis">Libya</span>
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                                    <span class="media-object pull-left">
                                        <img src="<?= base_url('assets/image/avatar/avatar3.jpg') ?>" class="img-circle" alt="">
                                    </span>
                                    <span class="media-body">
                                        <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Nash Evans</span>
                                        <span class="media-meta ellipsis">Honduras</span>
                                    </span>
                                </a>

                                <h5 class="heading pa15 pb0">Friends</h5>
                                <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                                    <span class="media-object pull-left">
                                        <img src="<?= base_url('assets/image/avatar/avatar4.jpg') ?>" class="img-circle" alt="">
                                    </span>
                                    <span class="media-body">
                                        <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Josiah Johnson</span>
                                        <span class="media-meta ellipsis">Belgium</span>
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                                    <span class="media-object pull-left">
                                        <img src="<?= base_url('assets/image/avatar/avatar.png') ?>" class="img-circle" alt="">
                                    </span>
                                    <span class="media-body">
                                        <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Philip Hewitt</span>
                                        <span class="media-meta ellipsis">Bahrain</span>
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                                    <span class="media-object pull-left">
                                        <img src="<?= base_url('assets/image/avatar/avatar5.jpg') ?>" class="img-circle" alt="">
                                    </span>
                                    <span class="media-body">
                                        <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Wilma Hunt</span>
                                        <span class="media-meta ellipsis">Dominica</span>
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                                    <span class="media-object pull-left">
                                        <img src="<?= base_url('assets/image/avatar/avatar6.jpg') ?>" class="img-circle" alt="">
                                    </span>
                                    <span class="media-body">
                                        <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Noah Gill</span>
                                        <span class="media-meta ellipsis">Guatemala</span>
                                    </span>
                                </a>

                                <h5 class="heading pa15 pb0">Others</h5>
                                <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                                    <span class="media-object pull-left">
                                        <img src="<?= base_url('assets/image/avatar/avatar8.jpg') ?>" class="img-circle" alt="">
                                    </span>
                                    <span class="media-body">
                                        <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> David Fisher</span>
                                        <span class="media-meta ellipsis">French Guiana</span>
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                                    <span class="media-object pull-left">
                                        <img src="<?= base_url('assets/image/avatar/avatar9.jpg') ?>" class="img-circle" alt="">
                                    </span>
                                    <span class="media-body">
                                        <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Samantha Avery</span>
                                        <span class="media-meta ellipsis">Jersey</span>
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="media offcanvas-opener offcanvas-open-rtl">
                                    <span class="media-object pull-left">
                                        <img src="<?= base_url('assets/image/avatar/avatar.png') ?>" class="img-circle" alt="">
                                    </span>
                                    <span class="media-body">
                                        <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Madaline Medina</span>
                                        <span class="media-meta ellipsis">Finland</span>
                                    </span>
                                </a>
                            </div>
                            <!--/ END contact -->
                        </div>
                        <!--/ Content -->
                    </div>
                    <!--/ Offcanvas Content -->

                    <!-- Offcanvas Right -->
                    <div class="offcanvas-right has-footer">
                        <!-- Header -->
                        <div class="header pl0 pr0">
                            <ul class="list-table nm">
                                <li style="width:50px;">
                                    <a href="javascript:void(0);" class="btn btn-link text-default offcanvas-closer"><i class="ico-arrow-left6 fsize16"></i></a>
                                </li>
                                <li class="text-center">
                                    <h5 class="semibold nm">
                                        <p class="nm">Autumn Barker</p>
                                        <small>Last seen 02:21am</small>
                                    </h5>
                                </li>
                                <li style="width:50px;" class="text-right">
                                    <a href="javascript:void(0);" class="btn btn-link text-default"><i class="ico-info22 fsize16"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!--/ Header -->

                        <!-- Content -->
                        <div class="content slimscroll">
                            <!-- START chat -->
                            <ul class="media-list media-list-bubble">
                                <li class="media media-right">
                                    <a href="javascript:void(0);" class="media-object">
                                        <img src="<?= base_url('assets/image/avatar/avatar7.jpg') ?>" class="img-circle" alt="">
                                    </a>
                                    <div class="media-body">
                                        <p class="media-text">eros non enim commodo hendrerit.</p>
                                        <span class="clearfix"></span>
                                        <p class="media-text">Suspendisse dui.</p>
                                        <span class="clearfix"></span>
                                        <p class="media-text">eu nulla at</p>
                                        <!-- meta -->
                                        <span class="clearfix"></span><!-- important: clearing floated media text -->
                                        <p class="media-meta">Sun, Mar 02</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <a href="javascript:void(0);" class="media-object">
                                        <img src="<?= base_url('assets/image/avatar/avatar6.jpg') ?>" class="img-circle" alt="">
                                    </a>
                                    <div class="media-body">
                                        <p class="media-text">Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat.</p>
                                        <span class="clearfix"></span>
                                        <p class="media-text">faucibus ut, nulla. Cras eu tellus</p>
                                        <!-- meta -->
                                        <span class="clearfix"></span><!-- important: clearing floated media text -->
                                        <p class="media-meta">Tue, Oct 01</p>
                                    </div>
                                </li>
                                <li class="media media-right">
                                    <a href="javascript:void(0);" class="media-object">
                                        <img src="<?= base_url('assets/image/avatar/avatar7.jpg') ?>" class="img-circle" alt="">
                                    </a>
                                    <div class="media-body">
                                        <p class="media-text">Duis a mi fringilla mi lacinia mattis. Integer</p>
                                        <!-- meta -->
                                        <span class="clearfix"></span><!-- important: clearing floated media text -->
                                        <p class="media-meta">Fri, Sep 27</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <a href="javascript:void(0);" class="media-object">
                                        <img src="<?= base_url('assets/image/avatar/avatar6.jpg') ?>" class="img-circle" alt="">
                                    </a>
                                    <div class="media-body">
                                        <p class="media-text">Praesent interdum ligula eu enim. Etiam imperdiet dictum magna.</p>
                                        <!-- meta -->
                                        <span class="clearfix"></span><!-- important: clearing floated media text -->
                                        <p class="media-meta">Wed, Aug 28</p>
                                    </div>
                                </li>
                                <li class="media media-right">
                                    <a href="javascript:void(0);" class="media-object">
                                        <img src="<?= base_url('assets/image/avatar/avatar7.jpg') ?>" class="img-circle" alt="">
                                    </a>
                                    <div class="media-body">
                                        <p class="media-text">Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna.</p>
                                        <!-- meta -->
                                        <span class="clearfix"></span><!-- important: clearing floated media text -->
                                        <p class="media-meta">Sat, Sep 27</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <a href="javascript:void(0);" class="media-object">
                                        <img src="<?= base_url('assets/image/avatar/avatar6.jpg') ?>" class="img-circle" alt="">
                                    </a>
                                    <div class="media-body">
                                        <p class="media-text">Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac</p>
                                        <span class="clearfix"></span>
                                        <p class="media-text">Nam porttitor scelerisque neque</p>
                                        <!-- meta -->
                                        <span class="clearfix"></span><!-- important: clearing floated media text -->
                                        <p class="media-meta">Sun, Feb 22</p>
                                    </div>
                                </li>
                            </ul>
                            <!--/ END chat -->
                        </div>
                        <!--/ Content -->

                        <!-- Footer -->
                        <div class="footer">
                            <div class="has-icon">
                                <input type="text" class="form-control" placeholder="Type message...">
                                <i class="ico-paper-plane form-control-icon"></i>
                            </div>
                        </div>
                        <!--/ Footer -->
                    </div>
                    <!--/ Offcanvas Right -->
                </div>
                <!--/ END Wrapper -->
            </div>
            <!--/ END Offcanvas -->
        </aside>
        <!--/ END Template Sidebar (right) -->

        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- Library script : mandatory -->
        <script type="text/javascript" src="<?= base_url('assets/library/jquery/js/jquery-migrate.min.j') ?>s"></script>
        <script type="text/javascript" src="<?= base_url('assets/library/bootstrap/js/bootstrap.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/library/core/js/core.min.js') ?>"></script>
        <!--/ Library script -->

        <!-- App and page level script -->
        <script type="text/javascript" src="<?= base_url('assets/plugins/sparkline/js/jquery.sparkline.min.js') ?>"></script><!-- will be use globaly as a summary on sidebar menu -->
        <script type="text/javascript" src="<?= base_url('assets/javascript/app.min.js') ?>"></script>

        <!--datatable-->
        <script type="text/javascript" src="<?= base_url('assets/plugins/datatables/js/jquery.datatables.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/plugins/datatables/tabletools/js/tabletools.min.js') ?>"></script>
        <!--<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/tabletools/js/zeroclipboard.js') ?>"></script>-->
        <script type="text/javascript" src="<?= base_url('assets/plugins/datatables/js/jquery.datatables-custom.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/javascript/tables/datatable.js') ?>"></script>
     
         <script type="text/javascript">
            //panggil modal
            function add_soal() {
                $('#modalsoal').modal('show'); // show bootstrap modal
            }
            function add_to() {
                $('#modalto').modal('show'); // show bootstrap modal
            }

        </script>
       <!-- drop down dependend for get subbab -->
        <script type="text/javascript">


            function hide_e_crtTo() {
                $("#e_crtTo").hide();
            }

            function crtTo() {
                var nm_paket   =   $('#to_nm').val();
                var tgl_mulai  =   $('#to_tglmulai').val();
                var tgl_akhir  =   $('#to_tglakhir').val();
                var wkt_mulai  =   $('#to_wktakhir').val();
                var wkt_akhir  =   $('#to_wktmulai').val();
                var publish;
                if ($('#to_publish:checked')==true) {
                    publish = 1;
                } else{
                    publish = 0;
                }
                alert(publish);

                if (nm_paket != "" && tgl_mulai != "" && tgl_akhir!= "" && wkt_mulai != "" && wkt_akhir != "" ) {
                   
                     var url = base_url+"index.php/toback/buatTo";
                    $.ajax({
                        url : url,
                        type: "POST",
                        data: { nmpaket : nm_paket,
                                tglmulai:tgl_mulai,
                                tglakhir:tgl_akhir,
                                wktmulai:wkt_mulai,
                                wktakhir:wkt_akhir,
                                publish :publish 
                               
                              },
                        // cache: false,
                      // dataType: "JSON",
                        success: function(data,respone)
                        {   
                            reload_tblist();  
                            $("#e_crtTo").hide(); 
                            $('#modalto').modal('hide'); 
                            $('#form_to')[0].reset(); // reset form on modals
                            $('#modalto').removeClass('has-error'); // clear error class  

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {

                            // $("#e_crtTo").show();
                                    alert('Error adding / update data');
                        }
                    });
                }else{
                    
                    $("#e_crtTo").show();
                }
               
               
                
            }
           
            //buat load tingkat untuk modal buat soal
            function loadTkt() {
                jQuery(document).ready(function () {
                    var tingkat_id = {"tingkat_id": $('#gettkt').val()};
                    var idTingkat;

                    $.ajax({
                        type: "POST",
                        data: tingkat_id,
                        url: "<?= base_url() ?>index.php/videoback/getTingkat",
                        success: function (data) {
                           
                            $('#gettkt').html('<option value="">-- Pilih Tingkat  --</option>');
                            $.each(data, function (i, data) {
                                $('#gettkt').append("<option value='" + data.id + "'>" + data.aliasTingkat + "</option>");
                                return idTingkat = data.id;
                            });
                        }
                    });

                    $('#gettkt').change(function () {
                        tingkat_id = {"tingkat_id": $('#gettkt').val()};
                        loadPel($('#gettkt').val());
                    });

                    $('#getpel').change(function () {
                        pelajaran_id = {"pelajaran_id": $('#getpel').val()};
                        loadBb($('#getpel').val());
                    });

                    $('#getbb').change(function () {
                        loadSubb($('#getbb').val());
                        loadPel(idTingkat);
                    });
                })
            }
            ;

            //buat load pelajaran
            function loadPel(tingkatID) {
                $.ajax({
                    type: "POST",
                    data: tingkatID.tingkat_id,
                    url: "<?php echo base_url() ?>index.php/videoback/getPelajaran/" + tingkatID,
                    success: function (data) {
                        $('#getpel').html('<option value="">-- Pilih Mata Pelajaran  --</option>');
                        $.each(data, function (i, data) {
                            $('#getpel').append("<option value='" + data.id + "'>" + data.keterangan + "</option>");
                        });
                    }
                });
            }
            //buat load bab
            function loadBb(mapelID) {
                $.ajax({
                    type: "POST",
                    data: mapelID.mapel_id,
                    url: "<?php echo base_url() ?>index.php/videoback/getBab/" + mapelID,
                    success: function (data) {

                        $('#getbb').html('<option value="">-- Pilih Bab Pelajaran  --</option>');
                       
                        $.each(data, function (i, data) {
                            $('#getbb').append("<option value='" + data.id + "'>" + data.judulBab + "</option>");
                        });
                    }

                });
            }

            //load sub bab
            function loadSubb(babID){
                $.ajax({
                    type: "POST",
                    data: babID.bab_id,
                    url: "<?php echo base_url() ?>index.php/videoback/getSubbab/"+babID,
                    success: function(data){
                        $('#subb').html('<option value="">-- Pilih Sub Bab Pelajaran  --</option>');
                     
                        $.each(data, function(i, data){
                            $('#subb').append("<option value='"+data.id+"'>"+data.judulSubBab+"</option>");
                        });
                    }

                });
            }

            loadTkt();
        </script>

        <!--/ App and page level script -->
        <!--/ END JAVASCRIPT SECTION -->
    </body>
    <!--/ END Body -->
</html>