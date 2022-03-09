<?= $this->extend('layout/layout') ?>

<?= $this->section('stylecustom') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<!-- Date Range Picker -->
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/daterangepicker/daterangepicker.css') ?>" />
<!-- sweet alert 2-->
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/sweetalert2/sweetalert2.min.css') ?>" />
<style>
    .font-table {
        font-size: 12px;
    }

    .blink {
        animation: blink 2s steps(5, start) infinite;
        -webkit-animation: blink 1s steps(5, start) infinite;
    }

    @keyframes blink {
        to {
            visibility: hidden;
        }
    }

    @-webkit-keyframes blink {
        to {
            visibility: hidden;
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
                    <h1>Shipment List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shipment List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="overlay text-center" id="overlay" style="display: none;"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
            <div class="text-bold pt-2"> Loading...</div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sales Order Invoice Line</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tbSto" class="table table-hover table-striped display" style="width:100%">
                                <thead>
                                    <tr class="bg-secondary">
                                        <th width="5%">Shipment</th>
                                        <th width="3%">Status</th>
                                        <th width="13%">Plan Delivery Date</th>
                                        <th width="12%">Plan Receipt Date</th>
                                        <th width="20%">Customer</th>
                                        <th width="15%">Reference</th>
                                        <th width="15%">Customer Order</th>
                                        
                                        <th width="8%">Lead Time (days)</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($shipment as $shp) :
                                        $dif = date_diff(date_create($shp->plan_rcp_date), date_create());
                                    ?>
                                        <tr>
                                            <td>
                                                <a href="#"><?= $shp->shipment ?></a>
                                            </td>
                                            <td>
                                                <?php
                                                if ($shp->status == 10) echo 'Approved';
                                                ?>
                                            </td>
                                            <td><?= $shp->plan_dlv_date ?></td>
                                            <td><?= $shp->plan_rcp_date ?></td>
                                            <td><?= $shp->bp_name ?></td>
                                            <td><?= $shp->shpm_ref ?></td>
                                            <td><?= $shp->cst_order ?></td>
                                            
                                            <td><?= $dif->format('%a'); ?></td>
                                            <td>
                                                <?php
                                                if ($dif->format('%a') > 3) {
                                                ?>
                                                    <i class="fa fa-3x fa-exclamation-circle blink text-danger"></i>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- /.content -->
</div>

<?= $this->endSection() ?>



<?= $this->section('jscustom') ?>
<!-- sweet alert 2-->
<script src="<?= base_url('assets/adminlte/plugin/sweetalert2/sweetalert2.min.js') ?>"></script>

<script src="<?= base_url('assets/adminlte/plugin/chartjs/dist1/chart.min.js') ?>"></script>

<script src="<?= base_url('assets/adminlte/plugin/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<!-- component -->
<script>
    $('#tbSto thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#example thead');

    $("#tbSto").DataTable({
        
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
        }],
        order: [
            [7, "desc"]
        ],
        "pageLength": 25,

    });
</script>
<?= $this->endSection() ?>