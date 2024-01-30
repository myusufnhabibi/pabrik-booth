<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Produk</h1>
    <p class="mb-4">Data Produk yang ada Web di Pabrik Booth Container</p>


    <?php $this->view('message') ?>
    <div class="card shadow mb-4">
        <div class="card-header bg-primary py-3">
            <h6 class="m-0 font-weight-bold text-white">Data Produk</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <a href="<?= base_url('app/aproduk') ?>" class="btn btn-info btn-sm">Tambah Data Produk</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px">No</th>
                            <th>Thumbnail</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Ukuran</th>
                            <!-- <th>Keterangan</th> -->
                            <th>Status</th>
                            <th width="120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($produks as $produk) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <img width="100" src="<?= base_url('assets/gambar/thumbnail/' . $produk['thumbnail']) ?>" class="img-fluid" alt="">
                                </td>
                                <td>
                                    <?php echo $produk['nama'] ?> <br>
                                    <?php if ($produk['diskon'] == '0') { ?>
                                         <span class="badge badge-danger">Tidak ada diskon</span>
                                    <?php } else { 
                                            $d = $produk['diskon'];
                                            $nd = $produk['nominal_diskon']; ?>
                                        <span class="badge badge-success">Diskon : <?= $d == '1' ? $nd . '%' : 'Rp.' . number_format($nd) ?> </span>
                                    <?php } ?>
                                </td>
                                <td><?php echo "Rp. " .  number_format($produk['harga']) ?></td>
                                <td><?php echo $produk['ukuran'] ?></td>
                                <!-- <td><?php 
                                    echo html_entity_decode($produk['keterangan'])?>
                                </td> -->
                                <?php if ($produk['status'] == '0') { ?>
                                    <td><span class="badge badge-danger">Draft</span></td>
                                <?php } else { ?>
                                    <td><span class="badge badge-success">Published</span></td>
                                <?php } ?>
                                <td>
                                    <?php if ($produk['status'] == '0') { ?>
                                        <a href="<?= base_url('app/set_status/' . $produk['produk_id'] . '/' . $produk['status']) ?>" onclick="return confirm('Yakin ingin mempublish?')" class="btn btn-sm btn-info mb-1">Publish</a>
                                    <?php } else { ?>
                                        <a href="<?= base_url('app/set_status/' . $produk['produk_id'] . '/' . $produk['status']) ?>" class="btn btn-sm btn-primary mb-1">Draft</a>
                                    <?php } ?>
                                    <a href="<?= base_url('app/dproduk/' . $produk['produk_id']) ?>" class="btn btn-sm btn-success mb-1">Detail</a>
                                    <a href="<?= base_url('app/aproduk/' . $produk['produk_id']) ?>" class="btn btn-sm btn-warning mb-1">Edit</a>
                                    <a href="<?= base_url('app/eproduk/' . $produk['produk_id']) ?>" class="btn btn-sm btn-secondary mb-1">Edit Foto</a>
                                    <a href="<?= base_url('app/del_produk/' . $produk['produk_id']) ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger mb-1">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>