<?php if ($this->session->has_userdata('pesan')) { ?>
    <div class="alert alert-danger alertku">
        <?= "<i class='fa fa-exclamation-triangle'></i>" . " " . $this->session->flashdata('pesan'); ?>
    </div>

<?php } else if ($this->session->has_userdata('berhasil')) { ?>
    <div class="alert alert-success alertku">
        <i class="fa fa-check-circle"></i>
        <?= $this->session->flashdata('berhasil'); ?>
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>

<?php } else if ($this->session->has_userdata('gagal')) { ?>
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="alert alert-danger alert-dismissible show fade">
                <i class="fa fa-exclamation-triangle"></i>
                <?= $this->session->flashdata('gagal'); ?>
                <button class="close" data-dismiss="alert">
                    <div>&times;</div>
                </button>
            </div>
        </div>
    </div>

<?php } else if ($this->session->has_userdata('warning')) { ?>
    <span class="col-md-offset-1 col-md-10">
        <div class="alert alert-warning alert-dismissible show fade">
            <i class="fa fa-exclamation-triangle"></i>
            <?= $this->session->flashdata('warning'); ?>
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    </span>

<?php } ?>

