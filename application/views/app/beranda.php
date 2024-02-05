<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 font-weight-bold text-gray-800">Dashboard</h1>
    </div>

    <div class="row ">
        <div class="col-md-10">
            <div class="card card-waves mb-4 px-3">
                <div class="card-body p-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col">
                            <h2 class="text-primary">Selamat Datang di Dashboard <b> <?= $this->fungsi->user_login()->nama ?></b></h2>
                            <p class="text-gray-700">Anda dapat mengelola Web Utama Pabrik Booth Container.</p>
                            <!-- <a class="btn btn-primary p-3" href="#!">
                            Get Started
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right ms-1">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a> -->
                        </div>
                        <div class="col d-none d-lg-block mt-xxl-n4"><img class="img-fluid px-xl-5 mt-xxl-n5" src="<?= base_url() ?>assets/img/statistics.svg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->
    <?php if($cek_promo > 0) {?>
        <div class="row">
            <div class="col-6">
                <div class="alert alert-warning">
                    <i class="fa fa-info-circle"></i>
                    <b>Ada Promo Aktif!!</b> <br> <?= $promo['judul'] ?>
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php } ?>
    
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-success text-uppercase mb-1">
                                Gallery</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $gallery; ?></div>
                            <div class="text-sm text-black mt-2">Info Lebih lanjut <a href="<?= base_url('app/gallery') ?>" class="ml-2 badge badge-success">klik </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-images fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-warning text-uppercase mb-1">
                                Testimoni</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $testimoni; ?></div>
                            <div class="text-sm text-black mt-2">Info Lebih lanjut <a href="<?= base_url('app/testimoni') ?>" class="ml-2 badge badge-info">klik </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-info text-uppercase mb-1">
                                Produk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $produk; ?></div>
                            <div class="text-sm text-black mt-2">Info Lebih lanjut <a href="<?= base_url('app/produk') ?>" class="ml-2 badge badge-info">klik </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dumpster-fire fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">
                                Pesan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pesan; ?></div>
                            <div class="text-sm text-black mt-2">Info Lebih lanjut <a href="<?= base_url('app/pesan') ?>" class="ml-2 badge badge-danger">klik </a></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comment fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>