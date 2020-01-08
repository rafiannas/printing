================Home Banner Area =================-->
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
                        <h4>Don't Have Account</h4>
                      
                        <a class="main_btn" href="<?= base_url('user/registration'); ?>">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <?= $this->session->flashdata('message');  ?>
                    <h3>Log in to enter</h3>
                    <form class="row login_form" method="post">
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Adress">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password"><?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div> <br>
                        <!-- <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input type="checkbox" id="f-option2" name="selector">
                                <label for="f-option2">Keep me logged in</label>
                            </div>
                        </div> -->
                        <div class="col-md-12 mt-2 form-group">
                            <button type="submit" value="submit" class="btn submit_btn">Log In</button>
                           <!--  <a href="#">Forgot Password?</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
