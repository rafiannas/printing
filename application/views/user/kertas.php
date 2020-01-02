<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>Shop Category Page</h2>
				<div class="page_link">
					<a href="index.html">Home</a>
					<a href="category.html">Category</a>
					<a href="category.html">Women Fashion</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->


<!--================Category Product Area =================-->
<section class="cat_product_area section_gap">
	<div class="container-fluid">
		<div class="row flex-row-reverse">
			<div class="col-lg-12">
				<div class="main_title">
					<h2>Ukuran kertas</h2>

				</div>

				<div class="latest_product_inner row">
					<?php foreach ($kertas as $k) : ?>
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="f_p_item">
								<div class="f_p_img">
									<img class="img-fluid" src="<?= base_url('assets/img/ukuran_kertas/') . $k['gambar']; ?>" width="320px">
									<div class="p_icon">
										<a href="#">
											<i class="lnr lnr-heart"></i>
										</a>
										<a href="#">
											<i class="lnr lnr-cart"></i>
										</a>
									</div>
								</div>
								<a href="#">
									<h2><?= $k['kertas']; ?></h2>
								</a>
								<h3><b>Rp. <?= number_format($k['harga']); ?></b></h3>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

		</div>


	</div>
</section>
<!--================End Category Product Area =================-->