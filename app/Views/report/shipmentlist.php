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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Filter by :</h3>
                        <br />
                        <br />
                        <form class="form-horizontal" method="GET" action="">
                            <div class="form-group row">
                                <label for="bpCode" class="col-sm-1 col-form-label text-right">Customer</label>
                                <div class="col-sm-6">
                                    <select class="form-control select2" id="bpCode" name="bpcode">
                                        <option value="">-- Pilih --</option>
                                        <?php
                                        foreach ($customer as $cst) :
                                        ?>
                                            <option value="<?= $cst->bp_code ?>" <?php
                                                                                    if (isset($param)) {
                                                                                        if ($cst->bp_code == $param['bp']) {
                                                                                            echo "selected";
                                                                                        }
                                                                                    } ?>><?= $cst->bp_name ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="period" class="col-sm-1 col-form-label text-right">Periode</label>
                                <div class="col-sm-2">
                                    <select class="form-control select2" id="periodyear" name="periodyear">
                                        <option value="">-- Tahun --</option>
                                        <?php
                                        for ($y = 2020; $y <= date('Y');) :
                                        ?>
                                            <option value="<?= $y ?>" <?php
                                                                                    if (isset($param)) {
                                                                                        if ($y == $param['year']) {
                                                                                            echo "selected";
                                                                                        }
                                                                                    } ?>><?= $y ?></option>
                                        <?php
                                            $y++;
                                        endfor;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control" name="periodmonth" id="periodMonth">
                                        <option value="">-- Bulan --</option>
                                        <option value="01" <?php if (isset($param)) { if ($param['month'] == '01') { echo "selected";}} ?>>January</option>
                                        <option value="02" <?php if (isset($param)) { if ($param['month'] == '02') { echo "selected";}} ?>>February</option>
                                        <option value="03" <?php if (isset($param)) { if ($param['month'] == '03') { echo "selected";}} ?>>March</option>
                                        <option value="04" <?php if (isset($param)) { if ($param['month'] == '04') { echo "selected";}} ?>>April</option>
                                        <option value="05" <?php if (isset($param)) { if ($param['month'] == '05') { echo "selected";}} ?>>May</option>
                                        <option value="06" <?php if (isset($param)) { if ($param['month'] == '06') { echo "selected";}} ?>>June</option>
                                        <option value="07" <?php if (isset($param)) { if ($param['month'] == '07') { echo "selected";}} ?>>July</option>
                                        <option value="08" <?php if (isset($param)) { if ($param['month'] == '08') { echo "selected";}} ?>>August</option>
                                        <option value="09" <?php if (isset($param)) { if ($param['month'] == '09') { echo "selected";}} ?>>September</option>
                                        <option value="10" <?php if (isset($param)) { if ($param['month'] == '10') { echo "selected";}} ?>>October</option>
                                        <option value="11" <?php if (isset($param)) { if ($param['month'] == '11') { echo "selected";}} ?>>November</option>
                                        <option value="12" <?php if (isset($param)) { if ($param['month'] == '12') { echo "selected";}} ?>>December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="period" class="col-sm-1 col-form-label text-right">Status</label>
                                <div class="col-sm-2">
                                    <select class="form-control" name="status" id="status">
                                        <option value="">-- Status --</option>
                                        <option value="5" <?php if (isset($param)) { if ($param['status'] == '5') { echo "selected";}} ?>>Free</option>
                                        <option value="15" <?php if (isset($param)) { if ($param['status'] == '15') { echo "selected";}} ?>>Released</option>
                                        <option value="20" <?php if (isset($param)) { if ($param['status'] == '20') { echo "selected";}} ?>>Invoiced</option>
                                        <option value="25" <?php if (isset($param)) { if ($param['status'] == '25') { echo "selected";}} ?>>Processed</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" name="submit" class="btn btn-sm btn-success form-control">Display</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
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
                                                switch ($shp->status) {
                                                    case '5':
                                                        $status = 'Free';
                                                        break;
                                                    case '15':
                                                        $status = 'Released';
                                                        break;
                                                    case '20':
                                                        $status = 'Invoiced';
                                                        break;
                                                    case '25':
                                                        $status = 'Processed';
                                                        break;
                                                    default:
                                                        $status = 'Approved';
                                                }
                                                echo $status;
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
        scrollY: '500px',
        scrollCollapse: true,
        paging: false,

    });
</script>
<?= $this->endSection() ?>