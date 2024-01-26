<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data QnA</h1>
    <p class="mb-4">Data Pertanyaan dan jawaban yang ada Web di Karya Logam Bersatu Indonesia</p>


    <?php $this->view('message') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data QnA</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <a href="<?= base_url('app/aqna') ?>" class="btn btn-primary btn-sm">Tambah Data QnA</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px">No</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th width="120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($qnas as $qna) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $qna['pertanyaan'] ?>
                                </td>
                                <td>
                                    <?php echo $qna['jawaban'] ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('app/aqna/' . $qna['qna_id']) ?>" class="btn btn-warning mb-1">Edit</a>
                                    <a href="<?= base_url('app/del_qna/' . $qna['qna_id']) ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger">Hapus</a>
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