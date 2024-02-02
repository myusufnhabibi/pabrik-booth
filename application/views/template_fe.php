<!DOCTYPE html>
<html lang="en" data-style-switcher-options="{'showBordersStyle': true, 'showLayoutStyle': false, 'showBackgroundColor': false, 'changeLogo': false, 'colorPrimary': '#1c5fa8', 'colorSecondary': '#e36159', 'colorTertiary': '#2baab1', 'colorQuaternary': '#383f48'}">

<!-- Mirrored from www.okler.net/previews/porto/10.1.0/demo-auto-services.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jan 2024 04:03:33 GMT -->

<head>

	<!-- Basic -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?= $this->fungsi->setting_app()->nama ?></title>

	<meta name="keywords" content="WebSite Template" />
	<meta name="description" content="Porto - Multipurpose Website Template">
	<meta name="author" content="okler.net">

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?= base_url('assets/template/') ?>img/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="<?= base_url('assets/template/') ?>img/apple-touch-icon.png">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

	<!-- Web Fonts  -->
	<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&amp;display=swap" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>vendor/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>vendor/animate/animate.compat.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>vendor/simple-line-icons/css/simple-line-icons.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>vendor/owl.carousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>vendor/owl.carousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>vendor/magnific-popup/magnific-popup.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>vendor/bootstrap-star-rating/css/star-rating.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>css/theme.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>css/theme-elements.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>css/theme-blog.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>css/theme-shop.css">

	<!-- Demo CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>css/demos/demo-auto-services.css">

	<!-- Skin CSS -->
	<link id="skinCSS" rel="stylesheet" href="<?= base_url('assets/template/') ?>css/skins/skin-auto-services.css">

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>css/custom.css">


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-42715764-11"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-42715764-11');
	</script>

</head>

<body>
	<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
	<div class="body">
		<div class="notice-top-bar bg-primary" data-sticky-start-at="100">
			<button class="hamburguer-btn hamburguer-btn-light notice-top-bar-close m-0 active" data-set-active="false">
				<span class="close">
					<span></span>
					<span></span>
				</span>
			</button>
			<div class="container">
				<div class="row justify-content-center py-2">
					<div class="col-9 col-md-12 text-center">
						<p class="text-color-light mb-0"><strong>DEAL OF THE WEEK</strong> - Free Diagnosis & Break Checks - <strong><a href="#" class="text-color-light text-decoration-none custom-text-underline-1">Make an Appointment</a></strong></p>
					</div>
				</div>
			</div>
		</div>
		<?php 
			$nomer = $this->fungsi->setting_app()->nomer;
			function set_wa($param) {
				$nomer = $this->fungsi->setting_app()->nomer;
				$promo = $promo['judul'];
				if ($param == 'biasa') {
					$wa = 'https://wa.me/' .$nomer;
				} else if ($param == 'promo') {
					$wa = 'https://wa.me/' .$nomer . '?text=Saya Mau Pesan dengan' . $promo;
				}

				return $wa;
			}
		?>
		<!-- Header -->
		<?php include "home/header.php" ?>
		<!-- End of Header -->


		<!-- Main -->
		<?= $contents; ?>
		<!-- End of Main -->

		<!-- footer -->
		<?php include "home/footer.php" ?>
		<!-- End of footer -->

	</div>

	<a class="style-switcher-open-loader" href="#" data-base-path="" data-skin-src="master/less/skin-auto-services.less" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="right" title="Style Switcher" aria-label="Style Switcher"><i class="fas fa-cogs"></i>
		<div class="style-switcher-tooltip"><strong>Style Switcher</strong>
			<p>Check out different color options and styles.</p>
		</div>
	</a>

	<a class="envato-buy-redirect" href="https://themeforest.net/checkout/from_item/4106987?license=regular&amp;support=bundle_6month&amp;ref=Okler" target="_blank" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="right" title="Buy Porto"><i class="fas fa-shopping-cart"></i></a>
	<a class="demos-redirect" href="index.html#demos" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="right" title="Demos"><img alt="Demos" src="img/icons/demos-redirect.png" class="img-fluid" /></a>


	<!-- Vendor -->
	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>vendor/plugins/js/plugins.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>vendor/bootstrap-star-rating/js/star-rating.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="<?= base_url('assets/template/') ?>js/theme.js"></script>

	<!-- Current Page Vendor and Views -->
	<script src="<?= base_url('assets/template/') ?>js/views/view.contact.js"></script>
	<script src="<?= base_url('assets/template/') ?>js/views/view.shop.js"></script>

	<!-- Demo -->
	<script src="<?= base_url('assets/template/') ?>js/demos/demo-auto-services.js"></script>

	<!-- Theme Initialization Files -->
	<script src="<?= base_url('assets/template/') ?>js/theme.init.js"></script>

</body>

<!-- Mirrored from www.okler.net/previews/porto/10.1.0/demo-auto-services.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jan 2024 04:04:06 GMT -->

</html>