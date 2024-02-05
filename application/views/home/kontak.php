<div role="main" class="main">
				
    <section class="page-header page-header-modern bg-color-grey page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 class="text-color-dark font-weight-bold">Kontak</h1>
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-flex justify-content-md-end text-3-5">
                        <li><a href="<?= base_url('beranda') ?>" class="text-color-default text-color-hover-primary text-decoration-none">BERANDA</a></li>
                        <li class="active">KONTAK</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4 my-5">
        <div class="row align-items-center">
            <div class="col-lg-5 col-xl-4 offset-xl-1 mb-5 mb-lg-0">
                <div class="overflow-hidden">
                    <h2 class="text-color-dark font-weight-bold line-height-3 text-5-5 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="250"><?= $this->fungsi->setting_app()->alamat ?></h2>
                </div>
                <div class="overflow-hidden">
                    <a href="#get-direction" data-hash data-hash-offset="0" data-hash-offset-lg="100" class="d-inline-block custom-text-underline-1 font-weight-bold border-color-primary text-decoration-none text-3-5 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">LIHAT MAPS</a>
                </div>
                <ul class="list list-unstyled text-color-dark font-weight-bold text-4 py-2 my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750">
                    <li class="d-flex align-items-center mb-2">
                        <i class="icons icon-envelope text-color-dark me-2"></i>
                        Email: <a href="mailto:<?= $this->fungsi->setting_app()->email ?>" class="text-color-dark text-color-hover-primary text-decoration-none ms-1"><span class="__cf_email__" data-cfemail="e5958a97918aa5818a88848c8bcb868a88"><?= $this->fungsi->setting_app()->email ?></span></a>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="icons icon-phone text-color-dark me-2"></i>
                        Phone: <a href="tel:<?= $this->fungsi->setting_app()->nomer ?>" class="text-color-dark text-color-hover-primary text-decoration-none ms-1"> <?= $this->fungsi->setting_app()->nomer ?></a>
                    </li>
                    <li class="d-flex align-items-center mb-0">
                        <i class="icons icon-screen-smartphone text-color-dark me-2"></i>
                        Whatsapp: <a href="https://wa.me/<?= $this->fungsi->setting_app()->nomer ?>" target="_blank" class="text-color-dark text-color-hover-primary text-decoration-none ms-1"> <?= $this->fungsi->setting_app()->nomer ?></a>
                    </li>
                </ul>
                <p class="mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">Kami siap membantu kebutuhan bisnis Anda dari mulai <b> Booth Container, Gerobak Makan Minuman, Pembuatan Booth Waralaba, Franchise </b>. Masuklah, hubungi kami atau kirimkan pesan kepada kami. Kami akan menghubungi Anda sesegera mungkin selama jam kerja reguler.</p>
            </div>
            <div class="col-lg-6 col-xl-5 offset-lg-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1250">
                <form class="contact-form custom-form-style-1" action="<?= base_url('home/kontak_tambah') ?>" method="POST">
                <div class="contact-form-success alert alert-success d-none mt-4">
                                    <strong>Success!</strong> Your message has been sent to us.
                                </div>

                                <div class="contact-form-error alert alert-danger d-none mt-4">
                                    <strong>Error!</strong> There was an error sending your message.
                                    <span class="mail-error-message text-1 d-block"></span>
                                </div>
                    
                    <div class="row row-gutter-sm">
                        <div class="form-group col mb-3">
                            <input type="text" value="" data-msg-required="Nama tidak boleh kosong." maxlength="100" class="form-control" name="nama" id="nama" required placeholder="Nama">
                        </div>
                    </div>
                    <div class="row row-gutter-sm">
                        <div class="form-group col mb-3">
                            <input type="number" value="" data-msg-required="Nomer WA tidak boleh kosong." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="nomer" id="nomer" required placeholder="No WA Anda">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col mb-3">
                            <textarea maxlength="5000" data-msg-required="Pesan tidak boleh kosong." rows="4" class="form-control" name="pesan" id="pesan" required placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="row appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="1500">
                        <div class="form-group col mb-0">
                            <button type="submit" class="btn btn-primary btn-modern font-weight-bold custom-btn-border-radius custom-btn-arrow-effect-1 text-3 px-5 py-3" data-loading-text="Loading...">
                                SUBMIT
                                <svg class="ms-2" version="1.1" viewBox="0 0 15.698 8.706" width="17" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <polygon stroke="#FFF" stroke-width="0.1" fill="#FFF" points="11.354,0 10.646,0.706 13.786,3.853 0,3.853 0,4.853 13.786,4.853 10.646,8 11.354,8.706 15.698,4.353 "/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="get-direction" class="position-relative appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="750">
        <div class="custom-directions-panel position-absolute top-0 left-0 w-100pct w-md-50pct w-lg-25pct h-100 mh-100 overflow-auto z-index-1"></div>
        <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15848.801208081799!2d110.8281836!3d-6.7454071!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x81430e3347f3f338!2sToko%20Karya%20Logam%20Bersatu!5e0!3m2!1sid!2sid!4v1650532508447!5m2!1sid!2sid" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen=""></iframe>
        </div>
    </div>

</div>
