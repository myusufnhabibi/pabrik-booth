<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Promo</h1>
    <p class="mb-4">Data Pertanyaan dan jawaban yang ada Web di Karya Logam Bersatu Indonesia</p>

    <?php $this->view('message') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Promo</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <a href="<?= base_url('app/apromo') ?>" class="btn btn-primary btn-sm">Tambah Data Promo</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px">No</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th width="120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($promos as $promo) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $promo['judul'] ?>
                                </td>
                                <td>
                                    <?php echo $promo['value'] ?>
                                </td>
                                <?php if ($promo['status'] == '0') { ?>
                                    <td><span class="badge badge-danger">Tidak Berlaku</span></td>
                                <?php } else { ?>
                                    <td><span class="badge badge-success">Masih Berlaku</span></td>
                                <?php } ?>
                                <td>
                                    <a href="<?= base_url('app/apromo/' . $promo['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= base_url('app/del_promo/' . $promo['id']) ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</a>
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