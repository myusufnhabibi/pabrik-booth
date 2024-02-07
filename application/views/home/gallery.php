<div role="main" class="main">
    <section class="page-header page-header-modern bg-color-grey page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 class="text-color-dark font-weight-bold">Gallery</h1>
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-flex justify-content-md-end text-3-5">
                        <li><a href="<?= base_url('beranda') ?>" class="text-color-default text-color-hover-primary text-decoration-none">BERANDA</a></li>
                        <li class="active">GALLERY</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="lightbox mb-5" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}, 'mainClass': 'mfp-with-zoom', 'zoom': {'enabled': true, 'duration': 300}}">
        <div class="container-fluid">
            <div class="row">
                <?php foreach($gallerys as $gallery) : ?>
                    <div class="col-6 col-md-3 px-0">
                        <a class="d-inline-block custom-img-thumbnail-style-1 img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon rounded-0" href="<?= base_url('assets/gambar/gallery/' . $gallery['foto']) ?>">
                            <style>
                                .setukur{
                                    /* height : 450px !important;
                                    object-fit: cover !important */
                                }
                            </style>
                            <img class="img-fluid rounded-0 setukur" src="<?= base_url('assets/gambar/gallery/' . $gallery['foto']) ?>" alt="" />
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>
