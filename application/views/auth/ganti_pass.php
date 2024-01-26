<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-md-6"><?php $this->view('message'); ?></div>
    </div>

    <div class="row">
        <div class="col-md-6 offset-md-3 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary font-weight-bold">Ganti Password</h4>
                </div>
                <div class="card-body">
                    <form class="forms-sample" id="form-pass" method="post" action="<?= base_url('auth/ubah_pwd') ?>">
                        <div class="form-group">
                            <label for="pwd">Password Saat Ini</label>
                            <input type="password" autocomplete="off" id="pwd" class="form-control" required name="pwd_awal">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password Baru</label>
                            <input type="password" autocomplete="off" id="pwd1" class="form-control" required name="pwd1">
                        </div>
                        <div class="form-group">
                            <label for="pwdk">Konfirmasi Password Baru</label>
                            <input type="password" id="pwdk" class="form-control" required name="pwdk">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light">Batal</button>
                            <button type="submit" class="btn btn-primary mr-2">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>