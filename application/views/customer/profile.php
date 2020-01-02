<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Login/Register</h2>
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="login.html">Login</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Login Box Area =================-->

<section class="login_box_area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="<?= base_url('assets'); ?> /img/login.jpg" alt="">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                        <a class="main_btn" href="<?= base_url('user/registration'); ?>">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">

                <?= $this->session->flashdata('message');  ?>
                <div class="section-title text-center">
                    <h2>My Profile</h2>

                </div>
                <br>
                <div class="contact_info center">
                    <div class="info_item">
                        <i class="fas fa-user ml-5 fa-2x"></i>
                        <h6 style="margin-left: 10%"><?= $user['nama']; ?></h6>
                    </div>
                    <br>
                    <div class="info_item">
                        <i class="fab fa-google ml-5 fa-2x"></i>
                        <h6 style="margin-left: 10%"><?= $user['email']; ?></h6>
                    </div>
                    <br>
                    <div class="info_item">
                        <i class="fas fa-key ml-5 fa-2x"></i>
                        <h6 style="margin-left: 10%"><?= $user['password']; ?></h6>
                    </div>
                    <br>
                    <div class="info_item">
                        <i class="fas fa-phone ml-5 fa-2x"></i>
                        <h6 style="margin-left: 10%"><?= $user['no_hp']; ?></h6>
                    </div>
                    <br>
                    <div class="info_item">
                        <i class="fas fa-home ml-5 fa-2x"></i>
                        <h6 style="margin-left: 10%"><?= $user['alamat']; ?></h6>
                    </div>


                </div>

            </div>
        </div>
        <div class="order_details_table">
            <h2>Order History</h2>

            <?= $this->session->flashdata('message');  ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tgl</th>
                            <th scope="col">Jumlah File</th>
                            <th scope="col">Status Order</th>
                            <th scope="col">Total Harga</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;

                        foreach ($order as $ord) :
                        ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $ord['tgl_order']; ?></td>
                                <td><?= $ord['jumlah_order']; ?></td>
                                <td><?= $ord['status_order']; ?></td>
                                <td>Rp. <?= number_format($ord['total_harga']); ?></td>

                            </tr>
                        <?php
                            $i += 1;
                        endforeach;
                        ?>
                </table>
            </div>


        </div>
    </div>


</section>
<!--================End Login Box Area =================-->