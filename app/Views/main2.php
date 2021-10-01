<?= $this->extend('layout/layout') ?>

<?= $this->section('stylecustom') ?>
<!-- sweet alert 2-->
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/sweetalert2/sweetalert2.min.css') ?>" />
<!-- datatable -->
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<style>
    /* hide-scrollbar::-webkit-scrollbar {
     display: none;
    } */

    .data-list {
        height: 750px;
        overflow-y: hidden;

    }

    .blink {
        animation: blink 1s steps(1, end) infinite;
    }

    @keyframes blink {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-11">
                    <div class="card">
                        <div class="card-header border-1">
                            <h3 class="card-title">Inventory Status</h3>
                            <div class="card-tools">
                                <a href="<?= site_url('/inventory') ?>" class="btn btn-tool btn-sm text-success"> Details
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                            </div>

                        </div>
                        <div class="card-body p-0" data-autoscroll>
                            <div id="listPart" class="products-list product-list-in-card pl-2 pr-2 data-list " data-autoscroll>
                                <?php foreach ($fg as $row) { ?>
                                    <div class="item" id="li">
                                        <div class="product-info">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <a href="javascript:void(0)" class="product-title">
                                                        <h4><?= $row->oldpartno ?></h4>
                                                    </a>
                                                    <span class="product-description">
                                                        <?= $row->partname . " - " . $row->partno ?>
                                                    </span>
                                                </div>
                                                <div class="col-md-3">
                                                    <p class="h6">On Hand : <span class="<?= $row->onhand <= 0 ? 'strong text-danger' : 'strong text-primary' ?>"><?= number_format($row->onhand) ?></span></p>
                                                    <p class="h6">Allocated : <span class="strong text-primary"><?= number_format($row->allocated) ?></span></p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p class="h6">On Order : <span class="strong text-primary"><?= number_format($row->onorder) ?></span></p>
                                                    <p class="h6">Economic : <span class="<?= $row->economicstock <= 0 ? 'strong text-danger' : 'strong text-primary' ?>"><?= number_format($row->economicstock) ?></span></p>
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="text-center text-warning blink"><i style="font-size: 30px;" class="fas fa-exclamation-circle"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-lg-1">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h4 class="card-title">Next Refresh in :</h3>
                        </div> -->
                        <div class="card-body text-center text-primary h3">
                            <span id="timer"></span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- /.content -->
</div>

<?= $this->endSection() ?>

<?= $this->section('jscustom') ?>
<!-- autoscroll -->
<script src="<?= base_url('assets/js/jquery.autoscroll.js') ?>"></script>
<!-- sweet alert 2-->
<script src="<?= base_url('assets/adminlte/plugin/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- datatable -->
<script src="<?= base_url('assets/adminlte/plugin/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<!-- component -->
<script src="<?= base_url('assets/js/component/main2-1.js') ?>"></script>
<script>
    var minutes, seconds, count, counter, timer;
    count = 180; //seconds
    counter = setInterval(timer, 1000);

    function checklength(i) {
        "use strict";
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function timer() {
        "use strict";
        count = count - 1;
        minutes = checklength(Math.floor(count / 60));
        seconds = checklength(count - minutes * 60);
        if (count < 0) {
            clearInterval(counter);
            return;
        }
        document.getElementById("timer").innerHTML =
            "Refresh in " + minutes + ":" + seconds + " ";
        if (count === 0) {
            location.reload();
        }
    }
</script>

<?= $this->endSection() ?>