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

			<?= $this->session->flashdata('message');  ?>
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
							<th scope="col">Hapus</th>

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

								<td>
									<a href="<?= base_url(); ?>user/minus/<?= $ord['id_isi_order']; ?>" class="badge badge-warning mr-3"> -</a><?= $ord['jumlah']; ?>

									<a href="<?= base_url(); ?>user/plus/<?= $ord['id_isi_order']; ?>" class="badge badge-success ml-3"> +</a>
								</td>


								<td>Rp. <?= number_format($ord['harga']); ?></td>
								<?php $ttl = $ord['harga'] * $ord['jumlah']; ?>
								<td>Rp. <?= number_format($ttl); ?></td>

								<td>
									<a href="<?= base_url(); ?>user/hapus/<?= $ord['id_isi_order']; ?>" class="fas fa-trash-alt ml-3"></a>
								</td>
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

			<a style="margin-left:48%" class="btn btn-primary" href="<?= base_url(); ?>user/s_checkout/<?= $total_harga; ?>">Checkout</a>
		</div>
	</div>
	<!--================End Single Product Area =================-->