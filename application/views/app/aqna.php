<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p><i class="fas fa-fw fa-home"></i> <i class="fas fa-fw fa-angle-right"></i> <a href="<?= base_url('app/qna') ?>">Data QnA</a>
        <i class="fas fa-fw fa-angle-right"> </i> <b><?= $title ?></b>
    </p>

    <div class="row justify-content-md-center mb-4">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header font-16 mt-0">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="font-weight-bold text-primary"><?= $title ?></h6>
                        <a href="<?= base_url('app/qna') ?>" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($this->uri->segment(3)) { ?>
                        <form method="POST" action="<?= base_url('app/qna_ubah') ?>" id="formTambahQna">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Pertanyaan</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="hidden" value="<?= $qna['qna_id'] ?>" name="id" class="form-control" required>
                                    <input type="text" autocomplete="off" value="<?= $qna['pertanyaan'] ?>" name="pertanyaan" class="form-control" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Jawaban</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea name="jawaban" autocomplete="off" required class="form-control" id="" cols="30" rows="10"><?= $qna['jawaban'] ?></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button name="simpan" type="submit" style="float: right;" class="btn btn-success">Ubah</button>
                                </div>
                            </div>
                        </form>
                    <?php } else { ?>
                        <form method="POST" id="formTambahQna" action="<?= base_url('app/qna_tambah') ?>">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Pertanyaan</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" autocomplete="off" name="pertanyaan" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Jawaban</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea required autocomplete="off" name="jawaban" class="form-control" id="" cols="30" rows="10"></textarea>
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