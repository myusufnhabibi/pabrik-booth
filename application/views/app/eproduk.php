<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p><i class="fas fa-fw fa-home"></i> <i class="fas fa-fw fa-angle-right"></i> <a href="<?= base_url('app/produk') ?>">Data Produk</a>
        <i class="fas fa-fw fa-angle-right"> </i> <b><?= $title ?></b>
    </p>
    <?php $this->view('message') ?>
    <div class="row justify-content-md-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-16 mt-0">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="font-weight-bold text-primary"><?= $title ?></h6>
                        <a href="<?= base_url('app/produk') ?>" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Foto Lama</label>
                        <div class="row">
                            <?php if ($cek > 0) {
                                foreach ($foto_lama as $fl) { ?>
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <!-- Simple card -->
                                        <div class="card m-b-30">
                                            <img class="card-img-top img-fluid" width="100px;" height="100px;" src="<?= base_url('assets/gambar/produk/' . $fl['foto']) ?>" alt="Card image cap">
                                            <div class="card-body">
                                                <!-- <span class="badge badge-danger ref">Hapus</span><br> -->
                                                <a type="button" href="<?= base_url('app/del_fk/' . $fl['id']) . '/' . $fl['produk_id'] ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger m-t-5 waves-effect btn-block waves-light set_slider">Hapus</a>
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                <?php }
                            } else { ?>
                                <div class="col-md-12">
                                    <h3 class="badge badge-danger">Foto Produk tidak ada</h3>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="<?= $produk['produk_id'] ?>" id="produk_id3" name="produk_id" class="form-control">
                        <label for="">Foto Baru</label>
                        <form id="frmproduk" action="#" class="dropzone">
                        </form>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <button name="simpan" type="button" id="btnSubmit3" style="float: right;" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card m-b-20 text-white bg-info">
                <div class="card-body">
                    <blockquote class="card-blockquote mb-0">
                        <p><b>Info Foto Lama!</b></p>
                        <footer class="blockquote-footer text-white font-12">
                            Jika Klik Hapus akan menghapus foto produk walau tidak jadi diubah
                        </footer>
                        <footer class="blockquote-footer text-white font-12">
                            Jika terlanjur terhapus silahkan upload ulang di foto baru
                        </footer>
                        <br>
                        <p><b>Info Foto Baru!</b></p>
                        <footer class="blockquote-footer text-white font-12">
                            File harus berekstensi .jpg, .jpeg, .png
                        </footer>
                        <footer class="blockquote-footer text-white font-12">
                            Maksimal file upload 1 MB
                        </footer>
                        <footer class="blockquote-footer text-white font-12">
                            Maksimal multipel upload 5 file
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>