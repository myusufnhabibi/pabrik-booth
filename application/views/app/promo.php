<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Setting App</h1>
    <p class="mb-4">Setting App yang ada Web di Pabrik Booth Container</p>

    <?php $this->view('message') ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Setting</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                   <a href="<?= base_url('app/asetting') ?>" class="btn btn-primary btn-sm">Tambah Data Setting</a> 
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20px">No</th>
                            <th>Tag</th>
                            <th>Value</th>
                            <th width="120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($settings as $setting) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $setting['tag'] ?>
                                </td>
                                <td>
                                    <?php echo $setting['value'] ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('app/asetting/' . $setting['setting_id']) ?>" class="btn btn-warning mb-1">Edit</a>
                                 <a href="<?= base_url('app/del_setting/' . $setting['setting_id']) ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger">Hapus</a>
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