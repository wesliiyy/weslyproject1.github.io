<?php if ($this->session->has_userdata('success')) { ?>
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            <i class="fa fa-check"></i>&ensp;<?= $this->session->flashdata('success'); ?>
        </div>
    </div>
<?php } ?>
<?php if ($this->session->has_userdata('error')) { ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            <i class="fa fa-ban"></i>&ensp;<?= $this->session->flashdata('error'); ?>
        </div>
    </div>
<?php } ?>