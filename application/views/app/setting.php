<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Setting App</h1>
    <p class="mb-4">Setting App yang ada Web di Pabrik Booth Container</p>

    <?php $this->view('message') ?>
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary py-3">
                    <h6 class="m-0 font-weight-bold text-white">Data Setting</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('app/setting_ubah') ?>" enctype='multipart/form-data'>
                        <input type="hidden" name="setting_id" value="<?= $setting['id'] ?>">
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <input type="text" class="form-control" value="<?= $setting['nama'] ?>" name="nama" id="nama">    
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Logo Lama</label> <br>
                                    <img width="200" src="<?= base_url('assets/gambar/' . $setting['logo']) ?>" alt="">
                                    <input type="hidden" name="lama" value="<?= $setting['logo'] ?>" />
                                </div>
                                <div class="col-md-6">
                                    <label for="">Logo Baru</label> <br>
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Pilih File</label>
                                        <input type="file" name="image" id="image-upload" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nomoer Telepon (WA)</label>
                            <input type="text" class="form-control" value="<?= $setting['nomer'] ?>" name="nomer" id="nomer">
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label>Facebook</label>
                                <input type="text" name="fb" value="<?= $setting['fb'] ?>" class="form-control">
                            </div>
                            <div class="col">
                                <label>Tiktok</label>
                                <input type="text" name="tt" value="<?= $setting['tt'] ?>" class="form-control">
                            </div>
                            <div class="col">
                                <label>Instagram</label>
                                <input type="text" name="ig" value="<?= $setting['ig'] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" style="float:right" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
</div>