<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p><i class="fas fa-fw fa-home"></i> <i class="fas fa-fw fa-angle-right"></i> <a href="<?= base_url('app/kontak') ?>">Data Kontak</a>
        <i class="fas fa-fw fa-angle-right"> </i> <b><?= $title ?></b>
    </p>

    <div class="row justify-content-md-center mb-4">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header font-16 mt-0">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="font-weight-bold text-primary"><?= $title ?></h6>
                        <a href="<?= base_url('app/kontak') ?>" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($this->uri->segment(3)) { ?>
                        <form method="POST" action="<?= base_url('app/kontak_ubah') ?>" id="formTambahKontak">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Nama Kontak</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="hidden" value="<?= $kontak['kontak_id'] ?>" name="id" class="form-control" required>
                                    <input type="text" autocomplete="off" value="<?= $kontak['nama_kontak'] ?>" name="nama" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Nomer Kontak</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" value="<?= $kontak['nomer_kontak'] ?>" name="nomer" class="form-control" required>
                                </div>
                            </div>
                            <!-- <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Jabatan</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="jabatan" required id="" class="form-control">
                                        <option value="Ketua KLB" <?= $kontak['jabatan'] == 'Ketua KLB' ? 'selected' : null ?>>Ketua KLB</option>
                                        <option value="Admin KLB" <?= $kontak['jabatan'] == 'Admin KLB' ? 'selected' : null ?>>Admin KLB</option>
                                        <option value="Ketua KLBK" <?= $kontak['jabatan'] == 'Ketua KLBK' ? 'selected' : null ?>>Ketua KLBK</option>
                                        <option value="Ketua ILD" <?= $kontak['jabatan'] == 'Ketua ILD' ? 'selected' : null ?>>Ketua ILD</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button name="simpan" type="submit" style="float: right;" class="btn btn-primary">Ubah</button>
                                </div>
                            </div>
                        </form>
                    <?php } else { ?>
                        <form method="POST" id="formTambahKontak" action="<?= base_url('app/kontak_tambah') ?>">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Nama Kontak</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" name="nama" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Nomer Kontak</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" name="nomer" class="form-control" required>
                                </div>
                            </div>
                           <!--  <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Jabatan</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="jabatan" required id="" class="form-control">
                                        <option value="Ketua KLB">Ketua KLB</option>
                                        <option value="Admin KLB">Admin KLB</option>
                                        <option value="Ketua KLBK">Ketua KLBK</option>
                                        <option value="Ketua ILD">Ketua ILD</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button name="simpan" type="submit" style="float: right;" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>