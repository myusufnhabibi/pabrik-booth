<header id="header" data-plugin-options="{'stickyEnabled': false, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 54, 'stickySetTop': '-54px', 'stickyChangeLogo': false}">
	<div class="header-body header-body-bottom-border-fixed box-shadow-none border-top-0">

		<div class="header-container container">
			<div class="header-row">
				<div class="header-column w-100">
					<div class="header-row justify-content-between">
						<div class="header-logo z-index-2 col-lg-2 px-0">
							<a href="<?= base_url('beranda') ?>">
								<img alt="Porto" class="mt-4" width="200" height="100" data-sticky-width="82" data-sticky-height="40" data-sticky-top="84" src="<?= base_url('assets/gambar/' . $this->fungsi->setting_app()->logo) ?>">
							</a>
						</div>
						<div class="header-nav header-nav-links justify-content-end pe-lg-4 me-lg-3">
							<div class="header-nav-main header-nav-main-arrows header-nav-main-dropdown-no-borders header-nav-main-effect-3 header-nav-main-sub-effect-1">
								<nav class="collapse">
									<ul class="nav nav-pills" id="mainNav">
										<li><a href="<?= base_url('beranda') ?>" class="nav-link active">Beranda</a></li>
										<li><a href="<?= base_url('tentang-kami') ?>" class="nav-link">Tentang Kami</a></li>
										<li><a href="<?= base_url('produk') ?>" class="nav-link">Produk</a></li>
										<li><a href="<?= base_url('cara-order') ?>" class="nav-link">Cara Order</a></li>
										<li><a href="<?= base_url('kontak') ?>" class="nav-link">Kontak</a></li>
									</ul>
								</nav>
							</div>
						</div>
						<ul class="header-extra-info custom-left-border-1 d-none d-xl-block">
							<li class="d-none d-sm-inline-flex ms-0">
								<div class="header-extra-info-icon">
									<i class="icons icon-phone text-3 text-color-dark position-relative top-3"></i>
								</div>
								<div class="header-extra-info-text line-height-2">
									<span class="text-1 font-weight-semibold text-color-default">HUBUNGI KAMI</span>
									<strong class="text-4"><a href="<?= 'https://wa.me/' . $this->fungsi->setting_app()->nomer; ?>" target="_blank" class="text-color-hover-primary text-decoration-none"><?= $this->fungsi->setting_app()->nomer; ?></a></strong>
								</div>
							</li>
						</ul>
						<button class="btn header-btn-collapse-nav ms-4" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
							<i class="fas fa-bars"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>