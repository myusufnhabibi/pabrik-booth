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
                                    <img alt="" class="img-fluid rounded" src="<?= base_url('assets/gambar/thumbnail/' . $produk['thumbnail'])?>">
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
</div>
