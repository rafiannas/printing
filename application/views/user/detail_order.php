<br><br>
<!--============br  ====Order Details Area =================-->
<section class="order_details p_120">s
    <div class="container">
        <!-- <h3 class="title_confirmation">Thank you. Your order has been received.</h3> -->
        <div class="row order_d_inner">
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Order Info</h4>
                    <ul class="list">
                        <li>
                            <a>
                                <span>Id Order</span> : <?= $fororder['id_order']; ?></a>
                        </li>
                        <li>
                            <a>
                                <span>Tanggal Order</span> : <?= $fororder['tgl_order']; ?></a>
                        </li>
                        <li>
                            <a>
                                <span>Jumlah Order</span> : <?= $fororder['jumlah_order']; ?></a>
                        </li>
                        <li>
                            <a>
                                <span>Status Order</span> : <?= $fororder['status_order']; ?></a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-lg-8">
                <img width="70%" class="row justify-content-center" src="<?= base_url('assets/img/status_order'); ?>/<?= $fororder['gambar']; ?>">
            </div>

        </div>
        <div class="order_details_table">
            <h2>Detail Order</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">File</th>
                            <th scope="col">Ukuran Kertas</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Total</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        $total_harga = 0;
                        foreach ($order as $ord) :
                        ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $ord['file']; ?></td>
                                <td><?= $ord['kertas']; ?></td>


                                <td><?= $ord['jumlah']; ?></td>


                                <td>Rp. <?= number_format($ord['harga']); ?></td>
                                <?php $ttl = $ord['harga'] * $ord['jumlah']; ?>
                                <td>Rp. <?= number_format($ttl); ?></td>

                            </tr>


                        <?php
                            $total_harga += $ttl;
                            $i += 1;
                        endforeach;

                        ?>

                    </tbody>
                    <tr>
                        <td><b>Total Harga</b></td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td><b>Rp. <?= number_format($total_harga); ?> </b></td>

                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Order Details Area =================-->

<!--================ Subscription Area ================-->
<!-- <section class="subscription-area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h2>Status Order</h2>

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <img width="80%" class="row justify-content-center" src="<?= base_url('assets/img/status_order/pending.png'); ?>">
        </div>
    </div>
</section> -->
<!--================ End Subscription Area ================-->