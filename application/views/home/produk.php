<div role="main" class="main">
    <section class="page-header page-header-modern bg-color-grey page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 class="text-color-dark font-weight-bold">Produk</h1>
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-flex justify-content-md-end text-3-5">
                        <li><a href="<?= base_url('beranda') ?>" class="text-color-default text-color-hover-primary text-decoration-none">BERANDA</a></li>
                        <li class="active">PRODUK</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="shop container py-4 my-5">
        <div class="products row row-gutter-sm mb-4">
        <?php foreach($produks as $produk) : ?>
                <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="product mb-0">
                        <div class="product-thumb-info border-0 mb-3">
                            <?php if($produk['diskon'] != '0') { ?>
                                <div class="product-thumb-info-badges-wrapper">
                                    <span class="badge badge-ecommerce text-bg-danger">
                                        <?php if ($produk['diskon'] == '1') {
                                            echo 'Diskon : ' . $produk['nominal_diskon'] . '%';
                                        } else {
                                            echo 'Diskon : ' . round($produk['nominal_diskon'] / $produk['harga'] * 100) . '%';
                                        }
                                        ?>
                                    </span>
                                </div>
                            <?php } ?>
                            <a href="<?= base_url('home/produk_modal/' . $produk['produk_id']) ?>" class="quick-view text-uppercase font-weight-semibold text-2">
                                LIHAT DETAIL
                            </a>
                            <a href="shop-product-sidebar-left.html">
                                <div class="product-thumb-info-image bg-light">
                                    <style>
                                        .setterlaris {
                                            height : 320px !important;
                                        }
                                    </style>
                                    <img alt="" class="img-fluid rounded setterlaris" src="<?= base_url('assets/gambar/thumbnail/' . $produk['thumbnail'])?>">
                                </div>
                            </a>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">BOOTH</a>
                                <h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="#" class="text-color-dark text-color-hover-primary"><?= $produk['nama'] ?></a></h3>
                            </div>
                        </div>
                        <div title="Rated 5 out of 5">
                            <input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
                        </div>
                        <p class="price text-5 mb-3">
                            
                            <?php if($produk['diskon'] != '0') { ?>
                                <span class="sale text-color-dark font-weight-medium">
                                    <?php if ($produk['diskon'] == '1') {
                                        echo 'Rp. ' . number_format($produk['harga'] - ($produk['nominal_diskon']/100 * $produk['harga']));
                                    } else {
                                        echo 'Rp. '. number_format((int)$produk['harga'] - (int)$produk['nominal_diskon']);
                                    }
                                    ?>
                                </span>
                                <span class="amount"><?= 'Rp. ' . number_format($produk['harga']) ?></span>
                            <?php } else { ?>
                                <span class="sale text-color-dark font-weight-medium"><?= 'Rp. ' . number_format($produk['harga']) ?></span>
                            <?php } ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
        </div>
    </div>

    <!-- Terlaris -->
    <section class="section bg-transparent position-relative border-0 z-index-1 m-0 p-0">
        <div class="container py-4">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-9 col-xl-8 text-center">
                    <div class="overflow-hidden">
                        <h2 class="font-weight-bold text-color-dark line-height-1 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="250">Produk Terlaris</h2>
                    </div>
                    <div class="d-inline-block custom-divider divider divider-primary divider-small my-3">
                        <hr class="my-0 appear-animation" data-appear-animation="customLineProgressAnim" data-appear-animation-delay="600">
                    </div>
                </div>
            </div>
            <div class="row row-gutter-sm mb-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750">
                <?php foreach($produks as $tr) : ?>
                    <div class="col-sm-6 col-lg-3 text-center mb-4 mb-lg-0">
                        <a href="demo-auto-services-services-detail.html" class="text-decoration-none">
                            <div class="custom-thumb-info-style-1 thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-lighten">
                                <div class="thumb-info-wrapper">
                                    <img src="<?= base_url('assets/gambar/thumbnail/' . $tr['thumbnail']) ?>" class="img-fluid setterlaris" alt="">
                                </div>
                                <h3 class="text-transform-none font-weight-bold text-5 mt-2 mb-0"><?= $tr['nama'] ?></h3>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <svg class="custom-svg-3" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 193 495">
            <path fill="#1C5FA8" d="M193,25.73L18.95,247.93c-13.62,17.39-10.57,42.54,6.82,56.16L193,435.09V25.73z" />
            <path fill="none" stroke="#FFF" stroke-width="1.5" stroke-miterlimit="10" d="M196,53.54L22.68,297.08c-12.81,18-8.6,42.98,9.4,55.79L196,469.53V53.54z" />
        </svg>
    </section>
</div>
