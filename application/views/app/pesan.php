<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Pesan</h1>
    <p class="mb-4">Data Pesan yang ada Web di <?= $this->fungsi->setting_app()->nama ?></p>

    <?php $this->view('message') ?>
    
    <div class="card shadow mb-4">
        <div class="card-header bg-primary py-3">
            <h6 class="m-0 font-weight-bold text-white">Data Pesan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px">No</th>
                            <th>Nama</th>
                            <th>Nomer WA</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                            <th width="120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pesans as $pesan) {
                            $ganti = substr($pesan['nomer'], 1);
                            $wa = "https://wa.me/62" . $ganti;
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $pesan['nama'] ?>
                                </td>
                                <td>
                                    <?php echo $pesan['nomer'] ?>
                                </td>
                                <td>
                                    <?php echo $pesan['pesan'] ?>
                                </td>
                                <td>
                                    <?php echo $pesan['created_at'] ?>
                                </td>
                                <td>
                                    <a href="<?= $wa ?>" target="_blank" class="btn btn-sm btn-warning">Balas</a>
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

