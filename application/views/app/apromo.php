<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p><i class="fas fa-fw fa-home"></i> <i class="fas fa-fw fa-angle-right"></i> <a href="<?= base_url('app/promo') ?>">Data promo</a>
        <i class="fas fa-fw fa-angle-right"> </i> <b><?= $title ?></b>
    </p>

    <div class="row justify-content-md-center mb-4">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-primary font-16 mt-0">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="font-weight-bold text-white"><?= $title ?></h6>
                        <a href="<?= base_url('app/promo') ?>" class="btn btn-info btn-sm" style="float: right;">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($this->uri->segment(3)) { ?>
                        <form method="POST" action="<?= base_url('app/promo_ubah') ?>" id="formTambahpromo">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Judul</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="hidden" value="<?= $promo['id'] ?>" name="id" class="form-control" required>
                                    <input type="text" autocomplete="off" value="<?= $promo['judul'] ?>" name="judul" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Keterangan</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea name="keterangan" autocomplete="off" required class="form-control" id="" cols="30" rows="10"><?= $promo['value'] ?></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Status</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" <?= $promo['status'] == '1' ? 'checked' : '' ?> name="status" id="ya" value="1" checked>
                                        <label class="form-check-label" for="ya">
                                            Masih Berlaku
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"  <?= $promo['status'] == '0' ? 'checked' : '' ?> name="status" id="tdk" value="0">
                                        <label class="form-check-label" for="tdk">
                                            Tidak Berlaku
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button name="simpan" type="submit" style="float: right;" class="btn btn-success">Ubah</button>
                                </div>
                            </div>
                        </form>
                    <?php } else { ?>
                        <form method="POST" id="formTambahPromo" action="<?= base_url('app/promo_tambah') ?>">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Judul</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" autocomplete="off" name="judul" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Keterangan</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea required autocomplete="off" name="keterangan" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Keterangan</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="ya" value="1" checked>
                                        <label class="form-check-label" for="ya">
                                            Masih Berlaku
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="tdk" value="0">
                                        <label class="form-check-label" for="tdk">
                                            Tidak Berlaku
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button name="simpan" type="submit" style="float: right;" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>