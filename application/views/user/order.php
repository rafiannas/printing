<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>Single Product Page</h2>
				<div class="page_link">
					<a href="index.html">Home</a>
					<a href="category.html">Category</a>
					<a href="single-product.html">Product Details</a>
				</div>
			</div>
		</div>
	</div>
</section>
<?= $this->session->flashdata('message');  ?>
<!--================End Home Banner Area =================-->

<!--================Single Product Area =================-->
<div class="product_image_area">
	<div class="container">
		<div class="row s_product_inner">
			<div class="col-lg-6">
				<div class="s_product_img">
					<img src="<?= base_url('assets'); ?>/img/ukuran_kertas/ukuran_all.png" alt="" width="630" height="510">
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div class="s_product_text">

					<h2>Order</h2>
					<h2 class="mb-6">----------------</h2>

				</div>
				<?= form_open_multipart('user/order'); ?>
				<div class="row">
					<label>Ukuran Kertas</label>
					<div class="form-group ml-2">
						<select name="kertas" id="kertas" class="form-control">
							<?php foreach ($kertas as $k) : ?>
								<option value="<?= $k['id']; ?>"><?= $k['kertas']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="product_count">
					<label for="qty">Quantity:</label>
					<input type="number" name="qty" id="qty" value="1" title="Quantity:" class="input-text qty" min=1>
				</div>

				<div class="input-group mb-3">


					<div class="custom-file">
						<input type="file" name="file" id="file">
					</div>
				</div>

				<div class="card_area mt-5">
					<button class="main_btn" type="submit" name="submit">Tambah</button>

				</div>
				</form>

			</div>

		</div>
		<div class="order_details_table">
			<h2>Order Details</h2>
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
						foreach ($order as $ord) :
						?>
							<tr>
								<th><?= $i; ?></th>
								<th><?= $ord['file']; ?></th>
								<th><?= $ord['kertas']; ?></th>
								<th><?= $ord['jumlah']; ?></th>
								<th>Rp. <?= number_format($ord['harga']); ?></th>
								<?php $ttl = $ord['harga'] * $ord['jumlah']; ?>
								<th>Rp. <?= number_format($ttl); ?></th>
							</tr>


						<?php $i += 1;
						endforeach; ?>


					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->