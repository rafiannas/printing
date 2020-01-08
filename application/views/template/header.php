<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= base_url('assets'); ?> /img/favicon.png" type="image/png">
    <title>Printing </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?> /css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?> /vendors/linericon/style.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?> /css/font-awesome.min.css">
    <link href=" <?= base_url('assets'); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?> /vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?> /vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?> /vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?> /vendors/animate-css/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?> /vendors/jquery-ui/jquery-ui.css">
    <!-- main css -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?> /css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?> /css/responsive.css">
</head>

<body>
    <?php $kertas = $this->db->get('tipe_kertas')->result_array(); ?>


    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="top_menu row m0">
            <div class="container-fluid">

                <?php $cek = $this->session->userdata('email'); ?>
                <div class="float-right">
                    <ul class="right_side">
                        <li>
                            <?php if ($cek) { ?>
                                <a href="<?= base_url('user/login'); ?>">
                                    Halo <?= $user['nama']; ?>
                                </a>
                            <?php } ?>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="<?= base_url('user/index'); ?>">
                        <img src="<?= base_url('assets'); ?> /img/logo.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <div class="row w-100">
                            <div class="col-lg-7 pr-0">
                                <ul class="nav navbar-nav center_nav pull-right">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="<?= base_url('user/index'); ?>">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url('user/order'); ?>">Order</a>
                                    </li>

                                    <li class="nav-item submenu dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">List Harga</a>
                                        <ul class="dropdown-menu">
                                            <?php foreach ($kertas as $k) : ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?= base_url('user/kertas/'); ?><?= $k['id_tipe']; ?>"> <?= $k['tipe']; ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                    <!--            <li class="nav-item submenu dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" href="login.html">Login</a>
                                            <li class="nav-item">
                                                <a class="nav-link" href="tracking.html">Tracking</a>
                                            <li class="nav-item">
                                                <a class="nav-link" href="elements.html">Elements</a>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url('user/kontak'); ?>">Hubungi Kami</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-5">
                                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                                    <?php
                                    if ($cek) {
                                    ?>
                                        <hr>
                                        <li class="nav-item submenu dropdown">
                                            <a href="#" class="icons">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?= base_url('customer'); ?>">My Profile</a>

                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?= base_url('user/logout'); ?>">Logout</a>
                                            </ul>
                                        </li>
                                    <?php } else { ?>

                                        <li class="nav-item">
                                            <a href="<?= base_url('user/login'); ?>" class="icons">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </a>
                                        </li>

                                    <?php } ?>
                                    <hr>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->