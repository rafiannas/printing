<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= base_url('assets'); ?> /img/favicon.png" type="image/png">
    <title>Fashiop</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?> /css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?> /vendors/linericon/style.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?> /css/font-awesome.min.css">
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


    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="top_menu row m0">
            <div class="container-fluid">
                <div class="float-left">
                    <p>Call Us: 012 44 5698 7456 896</p>
                </div>
                <div class="float-right">
                    <ul class="right_side">
                        <li>
                            <a href="<?= base_url('user/login'); ?>">
                                Login/Register
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                My Account
                            </a>
                        </li>
                        <li>
                            <a href="contact.html">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html">
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
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" href="blog.html">Blog</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="single-blog.html">Blog Details</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item submenu dropdown">
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
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.html">Contact</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-5">
                                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                                    <hr>
                                    <li class="nav-item">
                                        <a href="#" class="icons">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    <hr>


                                    <li class="nav-item submenu dropdown">
                                        <a href="#" class="icons">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </a>
                                        <?php
                                        $cek = $this->session->userdata('email');
                                        if ($cek) :
                                        ?>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="login.html">My Profile</a>

                                                <li class="nav-item">
                                                    <a class="nav-link" href="tracking.html">Logout</a>

                                            </ul>
                                        <?php endif; ?>

                                    </li>

                                    <hr>

                                    <li class="nav-item">
                                        <a href="#" class="icons">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    <hr>

                                    <li class="nav-item">
                                        <a href="#" class="icons">
                                            <i class="lnr lnr lnr-cart"></i>
                                        </a>
                                    </li>

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