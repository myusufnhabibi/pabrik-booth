<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Gallery</h1>
    <p class="mb-4">Gallery berisi gambar yang ada Web di Karya Logam Bersatu Indonesia</p>
    <!-- end row -->
    <?php $this->view('message') ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Multiple Upload</h4>
                    <div class="mb-3">
                        <form id="frmdropzone" action="#" class="dropzone">
                            <!-- <div class="fallback">
                            <input name="file" type="file" multiple="multiple">
                        </div> -->
                        </form>
                    </div>

                    <div class="text-center m-t-15">
                        <button type="button" id="btnsubmit" class="btn btn-primary waves-effect waves-light">Upload</button>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
        <div class="col-md-4">
            <div class="card shadow mb-3 text-white bg-info">
                <div class="card-body">
                    <blockquote class="card-blockquote mb-0">
                        <p><b>Info Maseh!</b></p>
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

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="font-weight-bold">Data <?= $title ?></h6>
                </div>
            </div>

            <div class="row">
                <?php if ($cek > 0) {
                    foreach ($gallerys as $gallery) { ?>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <!-- Simple card -->
                            <div class="card m-b-30">
                                <img class="card-img-top img-fluid" width="100" height="100" src="<?= base_url('assets/gambar/gallery/' . $gallery['foto']) ?>" alt="Card image cap">
                                <div class="card-body">
                                    <!-- <span class="badge badge-danger ref">Hapus</span><br> -->
                                    <a type="button" href="<?= base_url('app/del_gallery/' . $gallery['galery_id']) ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger m-t-5 waves-effect btn-block waves-light set_slider">Hapus</a>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div><!-- end col -->
                    <?php }
                } else { ?>
                    <div class="col-md-12">
                        <h3 class="badge badge-danger">Data Gallery tidak ada</h3>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col">
                    <?= $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>