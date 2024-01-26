<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p><i class="fas fa-fw fa-home"></i> <i class="fas fa-fw fa-angle-right"></i> <a href="<?= base_url('app/produk') ?>">Data Produk</a>
        <i class="fas fa-fw fa-angle-right"> </i> <b><?= $title ?></b>
    </p>

    <div class="row justify-content-md-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <img width="auto" height="auto" src="<?= base_url('assets/gambar/thumbnail/' . $produk['thumbnail']) ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h4 class="font-weight-bold card-title text-info"><?= ucfirst($produk['nama']) ?></h4>
                            <table>
                                <tr>
                                    <td><h6 class="font-weight-bold text-info">Harga</h6></td>
                                    <td><h6>:</h6></td>
                                    <td><h6><?= "Rp. " . number_format($produk['harga']) ?></h6></td>
                                </tr>
                                <tr>
                                    <td width="100px"><h6 class="font-weight-bold text-info">Ukuran</h6></td>
                                    <td width="10px"><h6>:</h6></td>
                                    <td><h6><?= ucfirst($produk['ukuran']) ?></h6></td>
                                </tr>
                                <tr>
                                    <td><h6 class="font-weight-bold text-info">Keterangan</h6></td>
                                    <td><h6>:</h6></td>
                                    <td><h6><?= html_entity_decode($produk['keterangan']) ?></h6></td>
                                </tr>
                            </table>
                            
                            <h5 class="font-weight-bold mt-2 text-info">Foto</h5>
                            <?php if ($cek > 0) { ?>
                                <div class="row">
                                    <?php foreach ($fotos as $foto) : ?>
                                        <div class="column">
                                            <img src="<?= base_url('assets/gambar/produk/' . $foto['foto']) ?>" width="180" class="img-fluid rounded" alt="">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php } else { ?>
                                <span class="badge badge-danger">Tidak ada foto!</span>
                            <?php } ?>
                            <a href="<?= base_url('app/produk') ?>" style="float:right" class="btn btn-sm btn-primary mt-2">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>