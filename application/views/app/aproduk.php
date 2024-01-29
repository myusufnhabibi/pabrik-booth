<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p><i class="fas fa-fw fa-home"></i> <i class="fas fa-fw fa-angle-right"></i> <a href="<?= base_url('app/produk') ?>">Data Produk</a>
        <i class="fas fa-fw fa-angle-right"> </i> <b><?= $title ?></b>
    </p>
    <script type="text/javascript">
            tinymce.init({
                selector: '#isi',
                    height: 200,
                    theme: 'modern',
                menu: {
                    happy: { title: 'SC', items: 'code' }
                },
                menubar: 'happy',
                    plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                    ],
                    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
                    toolbar2: 'forecolor backcolor emoticons',
                    image_advtab: true
                });
    </script>
    <?php $this->view('message') ?>
    <div class="row justify-content-md-center mb-4">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header font-16 mt-0">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="font-weight-bold text-primary"><?= $title ?></h6>
                        <a href="<?= base_url('app/produk') ?>" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($this->uri->segment(3)) { ?>
                        <form action="<?= base_url('app/produk_ubah') ?>" enctype='multipart/form-data' method="post">
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Nama Produk</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="hidden" value="<?= $produk['produk_id'] ?>" id="produk_id" name="produk_id" class="form-control">
                                    <input type="text" value="<?= $produk['nama'] ?>" autocomplete="off" id="judul" name="judul" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Harga</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" value="<?= $produk['harga'] ?>" id="harga" name="harga" class="form-control">
                                </div>
                            </div>  

                            <?php 
                                // $pecah = explode($produk['ukuran'], ' ');
                                // $p = substr($pecah[0], 1);
                               $p = substr($produk['ukuran'], strpos($produk['ukuran'], 'P') + 1, strpos($produk['ukuran'], ' '));
                               $l = substr($produk['ukuran'], strpos($produk['ukuran'], 'L') + 1, strpos($produk['ukuran'], ' ', 3));
                               $t = substr($produk['ukuran'], strpos($produk['ukuran'], 'T') + 1, strpos($produk['ukuran'], ' '));
                            ?>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <?=  strpos($produk['ukuran'], 'X', 2) ?>
                                    <label for="">Ukuran</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="row g-3">
                                        <div class="col-sm">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">P</div>
                                                </div>
                                                <input type="number" class="form-control" value="<?= (int)$p ?>" name="panjang" id="panjang" placeholder="Panjang">
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">L</div>
                                                </div>
                                                <input type="number" class="form-control" value="<?= (int)$l ?>" name="lebar" id="lebar" placeholder="Lebar">
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">T</div>
                                                </div>
                                                <input type="number" class="form-control" value="<?= (int)$t ?>" name="tinggi" id="tinggi" placeholder="Tinggi">
                                            </div>
                                        </div>
                                        <!-- <input type="text" autocomplete="off" id="ukuran" name="ukuran" class="form-control"> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Keterangan</label>
                                </div>
                                <div class="col-md-9">
                                    <!-- id="exampleTextarea" -->
                                    <textarea style="height:300px;" class="form-control" id="isi" name='isi' placeholder="Isi produk"><?= $produk['keterangan'] ?></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Thumbnail</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Thumbnail Lama</label> <br>
                                            <img width="200" src="<?= base_url('assets/gambar/thumbnail/' . $produk['thumbnail']) ?>" alt="">
                                            <input type="hidden" name="lama" value="<?= $produk['thumbnail'] ?>" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Thumbnail Baru</label> <br>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Pilih File</label>
                                                <input type="file" name="image" id="image-upload" />
                                            </div>
                                        </div>
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
                        <form id="btnsubmit2" enctype='multipart/form-data'>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Nama produk</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="hidden" value="<?= $this->fungsi->kode_otomatis('PBC'); ?>" id="produk_id3" name="produk_id" class="form-control">
                                    <input type="hidden" value="produk" id="param" class="form-control">
                                    <input type="text" autocomplete="off" id="nama" name="nama" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Harga</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" id="harga" name="harga" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Ukuran</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="row g-3">
                                        <div class="col-sm">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">P</div>
                                                </div>
                                                <input type="number" class="form-control" name="panjang" id="panjang" placeholder="Panjang">
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">L</div>
                                                </div>
                                                <input type="number" class="form-control" name="lebar" id="lebar" placeholder="Lebar">
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">T</div>
                                                </div>
                                                <input type="number" class="form-control" name="tinggi" id="tinggi" placeholder="Tinggi">
                                            </div>
                                        </div>
                                        <!-- <input type="text" autocomplete="off" id="ukuran" name="ukuran" class="form-control"> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Keterangan</label>
                                </div>
                                <div class="col-md-9">
                                    <!-- id="exampleTextarea" -->
                                    <textarea style="height:300px;" class="form-control" id="isi" name='isi' placeholder="Isi produk"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Publish</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Published</option>
                                        <option value="0">Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <label for="">Thumbnail</label>
                                </div>
                                <div class="col-md-9">
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Pilih File</label>
                                        <input type="file" name="image" id="image-upload" />
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <button name="simpan" id="simpanK" type="submit" style="float: right;" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </form>
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label for="">Foto</label>
                            </div>
                            <div class="col-md-9">
                                <form id="frmproduk" action="#" class="dropzone">
                                </form>
                                <span class="text-danger">Ekstensi: jpg, png, jpeg. Max-size: 1 MB. Max-upload: 5 File</span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <button disabled name="simpan" type="button" id="btnSubmit3" style="float: right;" class="btn btn-primary">Upload</button>
                            </div>
                        </div>
                </div>

            <?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".dz-hidden-input").prop("disabled", true);

        $("#harga").mask("000.000.000", {
                reverse: true
            }, {
                removeMaskOnSubmit: true
            });

    })
</script>