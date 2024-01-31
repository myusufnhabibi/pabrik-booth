<!-- ========== Left Sidebar Start ========== -->
<?php $pg = $this->uri->segment(2);
$pg2 = $this->uri->segment(3); ?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/gambar/' . $this->fungsi->setting_app()->logo ) ?>" width="50" class="rounded" alt="">
            <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-text mx-2"><?= $this->fungsi->setting_app()->nama ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->

    <li class="nav-item <?= $pg == '' || $pg == 'beranda' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('app/beranda') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Kelola Menu
    </div>

    <li class="nav-item <?= $pg == 'promo' || $pg == 'apromo' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('app/promo') ?>">
            <i class="fas fa-fw fa-question-circle"></i>
            <span>Data Promo</span></a>
    </li>

    <li class="nav-item <?= $pg == 'gallery' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('app/gallery') ?>">
            <i class="fas fa-fw fa-images"></i>
            <span>Data Gallery</span></a>
    </li>

    <li class="nav-item <?= $pg == 'testimoni' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('app/testimoni') ?>">
            <i class="fas fa-fw fa-images"></i>
            <span>Data Testimoni</span></a>
    </li>

    <li class="nav-item <?= ($pg == 'produk' || $pg == 'aproduk' || $pg == 'eproduk' || $pg == 'dproduk' ? 'active' : '') ?>">
        <a class="nav-link" href="<?= base_url('app/produk') ?>">
            <i class="fas fa-fw fa-people-carry"></i>
            <span>Data Produk</span></a>
    </li>

    <li class="nav-item <?= $pg == 'setting' || $pg == 'asetting' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('app/setting') ?>">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Setting App</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>">
            <i class="fas fa-fw fa-arrow-left"></i>
            <span>Web Utama</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- Left Sidebar End -->