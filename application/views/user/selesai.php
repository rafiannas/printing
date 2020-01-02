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

<?= $this->session->flashdata('message');  ?>
<a href="<?= base_url('user/checkout'); ?>">back</a>
<!--================End Checkout Area =================-->