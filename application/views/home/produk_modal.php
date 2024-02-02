<div class="shop dialog dialog-lg fadeIn animated" style="animation-duration: 300ms;">
	<div class="row">
		<div class="col-lg-6">

			<div class="thumb-gallery-wrapper">
				<div class="thumb-gallery-detail owl-carousel owl-theme manual nav-inside nav-style-1 nav-dark mb-3">
					<div>
						<img alt="" class="img-fluid" src="<?= base_url('assets/gambar/thumbnail/' . $produk['thumbnail']) ?>">
					</div>
					<?php foreach($foto_produk as $fp) : ?>
						<div>
							<img alt="" class="img-fluid" src="<?= base_url('assets/gambar/produk/' . $fp['foto']) ?>">
						</div>
					<?php endforeach; ?>
					
				</div>
				<div class="thumb-gallery-thumbs owl-carousel owl-theme manual thumb-gallery-thumbs">
					<div>
						<img alt="" class="img-fluid" src="<?= base_url('assets/gambar/thumbnail/' . $produk['thumbnail']) ?>">
					</div>
					<?php foreach($foto_produk as $fp) : ?>
						<div class="cur-pointer">
							<img alt="" class="img-fluid" src="<?= base_url('assets/gambar/produk/' . $fp['foto']) ?>">
						</div>
					<?php endforeach; ?>
				</div>
			</div>

		</div>

		<div class="col-lg-6">
			<div class="summary entry-summary position-relative">
				<h1 class="font-weight-bold text-7 mb-0"><a href="shop-product-full-width.html" class="text-decoration-none text-color-dark text-color-hover-primary"><?= $produk['nama'] ?></a></h1>
				<div class="pb-0 clearfix d-flex align-items-center">
					<div title="Rated 3 out of 5" class="float-start">
						<input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
					</div>
					<div class="review-num">
						<span class="count" itemprop="ratingCount">
					</div>
				</div>
				<div class="divider divider-small">
					<hr class="bg-color-grey-400">
				</div>
				<p class="price mb-3">
					<?php if($produk['diskon'] != '0') { ?>
						<span class="sale text-color-dark">
							<?php if ($produk['diskon'] == '1') {
								echo 'Rp. ' . number_format($produk['harga'] - ($produk['nominal_diskon']/100 * $produk['harga']));
							} else {
								echo 'Rp. '. number_format((int)$produk['harga'] - (int)$produk['nominal_diskon']);
							}
							?>
						</span>
						<span class="amount"><?= 'Rp. ' . number_format($produk['harga']) ?></span>
					<?php } else { ?>
						<span class="sale text-color-dark"><?= 'Rp. ' . number_format($produk['harga']) ?></span>
					<?php } ?>
				</p>
				<ul class="list list-unstyled text-2">
					<li class="mb-0">UKURAN: <strong class="text-color-dark">
						<?= $produk['ukuran'] ?? '-' ?>
					</strong></li>
				</ul>
				<p class="text-3-5 mb-3">
					<?= html_entity_decode($produk['keterangan']) ?>
				</p>
				<form enctype="multipart/form-data" method="post" class="cart">
					<hr>
					<?php
						$replace = str_replace(' ', '%20', $produk['nama']);
						$wa = "https://wa.me/" . $this->fungsi->setting_app()->nomer . '?text=Saya ingin pesan : ' . $replace;

					?>
					<a href="<?= $wa ?>" target='_blank' class="btn btn-dark btn-modern text-uppercase bg-color-hover-primary border-color-hover-primary">Pesan Booth Ini</a>
					<hr>
				</form>

				<div class="d-flex align-items-center">
					<ul class="social-icons social-icons-medium social-icons-clean-with-border social-icons-clean-with-border-border-grey social-icons-clean-with-border-icon-dark me-3 mb-0">
						<!-- Facebook -->
						<li class="social-icons-facebook">
							<a href="http://www.facebook.com/sharer.php?u=https://www.okler.net" target="_blank" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="Share On Facebook">
								<i class="fab fa-facebook-f"></i>
							</a>
						</li>
						<!-- Google+ -->
						<li class="social-icons-googleplus">
							<a href="https://plus.google.com/share?url=https://www.okler.net" target="_blank" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="Share On Google+">
								<i class="fab fa-google-plus-g"></i>
							</a>
						</li>
						<!-- Twitter -->
						<li class="social-icons-twitter">
							<a href="https://twitter.com/share?url=https://www.okler.net&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="Share On Twitter">
								<i class="fab fa-twitter"></i>
							</a>
						</li>
						<!-- Email -->
						<li class="social-icons-email">
							<a href="mailto:?Subject=Share This Page&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 https://www.okler.net" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="Share By Email">
								<i class="far fa-envelope"></i>
							</a>
						</li>
					</ul>
				</div>

			</div>


		</div>
	</div>
</div>