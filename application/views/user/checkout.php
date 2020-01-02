<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="banner_content text-center">
                <h2>Product Checkout</h2>
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="checkout.html">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Billing Details</h3>

                    <?= form_open_multipart('user/checkout'); ?>
                    <div class="col-md-12 form-group">
                        <span style="font-size: 90%; margin-left:15px; "><b>Nama</b></span>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $order['nama']; ?>" readonly>
                        <!-- <h5 class="ml-3"><?= $order['nama']; ?></h5> -->
                    </div>

                    <div class="col-md-12 form-group">
                        <span style="font-size: 90%; margin-left:15px; "><b>Alamat</b></span>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $order['alamat']; ?>" readonly>
                        <!-- <h5 class="ml-3"><?= $order['alamat']; ?></!-->
                    </div>

                    <div class="col-md-12 form-group p_star">
                        <span style="font-size: 90%; margin-left:15px; "><b>Nomor HP</b></span>
                        <input type="text" class="form-control" id="number" name="number" placeholder="No HP" value="<?= $order['no_hp']; ?>" readonly>

                        </input>
                        <!-- <h5 class="ml-3"><?= $order['no_hp']; ?></h5> -->

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list list_2">
                            <li>
                                <a>Total Harga
                                    <span>Rp. <?= number_format($order['total_harga']);  ?></span>
                                </a>
                            </li>
                            <li>
                                <a>Harga Bookoing
                                    <span>Rp. <?= number_format($order['total_harga'] / 2); ?></span>
                                </a>
                            </li>

                        </ul>

                        <div class="payment_item mt-3"><b>Upload Bukti Pembayaran</b>
                            <p><input type="file" name="file" id="file"><span>File Max 2 Mb (jpg/png)</span></p>

                        </div>

                        <div class="payment_item active">
                            <p>Pesanan akan dikerjakan jika anda sudah membayar booking. Pesanan otomatis dibatalkan jika anda tidak melakukan pembayaran selama 2x24 Jam</p>
                        </div>
                        <br>
                        <button type="submit" name="submit" id="submit" class="main_btn" style="margin-left: 32%">Selesai</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
</section>
<!--================End Checkout Area =================-->