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
</style>
<?= $this->endSection() ?>



<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Purchase Dashboard </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Purchase Dashboard</li>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Filter by :</h3>
                            <br />
                            <br />
                            <form class="form-horizontal" method="GET" action="">
                                <div class="form-group row">
                                    <label for="period" class="col-sm-1 col-form-label text-right">Tanggal</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" name="datefrom" value="<?php if (isset($dtfrom)) {
                                                                                                            echo $dtfrom;
                                                                                                        } ?>">
                                    </div>
                                    <label for="period" class="col-sm-1 col-form-label text-right">Sampai</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" name="dateto" value="<?php if (isset($dtto)) {
                                                                                                            echo $dtto;
                                                                                                        } ?>">
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
            </div>
            <h5 class="mb-2">Purchase Requisition Summary <small class="text-primary"><i><?= "periode tanggal PR " . $period ?></i></small></h5>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-8 col-sm-4 col-md-2">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-sync-alt"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text text-lg">Created</span>
                                            <span class="info-box-number text-md">
                                                <?= number_format($purchase->pr_created) ?>
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <div class="col-8 col-sm-4 col-md-2">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-sync-alt"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text text-md">Pending Approved</span>
                                            <span class="info-box-number text-md">
                                                <?= number_format($purchase->pr_pending) ?>
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-8 col-sm-4 col-md-2">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-spinner"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text text-lg">Approved</span>
                                            <span class="info-box-number text-md">
                                                <?= number_format($purchase->pr_approved) ?>
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->

                                <!-- fix for small devices only -->
                                <div class="clearfix hidden-md-up"></div>

                                <div class="col-8 col-sm-4 col-md-2">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-white elevation-1"><i class="fas fa-times-circle"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text text-lg">Rejected</span>
                                            <span class="info-box-number text-md">
                                                <?= number_format($purchase->pr_rejected) ?>
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-8 col-sm-4 col-md-2">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-check-circle"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text text-lg">Process</span>
                                            <span class="info-box-number text-md">
                                                <?= number_format($purchase->pr_processed) ?>
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-8 col-sm-4 col-md-2">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text text-lg">In Process</span>
                                            <span class="info-box-number text-md">
                                                <?= number_format($purchase->pr_inprocess) ?>
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover display" id="tbRequest" style="border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>PR No.</th>
                                            <th>PR Date</th>
                                            <th>Item</th>
                                            <th>Description</th>
                                            <th>Qty</th>
                                            <th>Unit</th>
                                            <th>Request Date</th>
                                            <th>Reference</th>
                                            <th>Dept.</th>
                                            <th>Status</th>
                                            <th>PO Number </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($purchase->data_pr as $pr) :
                                        ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $pr->pr_no ?></td>
                                                <td><?= $pr->pr_date ?></td>
                                                <td><?= $pr->item ?></td>
                                                <td><?= $pr->desc ?></td>
                                                <td><?= number_format($pr->qty) ?></td>
                                                <td><?= $pr->unit ?></td>
                                                <td><?= $pr->req_date ?></td>
                                                <td><?= $pr->reference ?></td>
                                                <td><?= $pr->requester_name ?></td>
                                                <td>
                                                    <?php
                                                    switch ($pr->status) {
                                                        case 1:
                                                            echo "Created";
                                                            break;
                                                        case 2:
                                                            echo "Pending Approval";
                                                            break;
                                                        case 3:
                                                            echo "Approved";
                                                            break;
                                                        case 4:
                                                            echo "Rejected";
                                                            break;
                                                        case 5:
                                                            echo "Modified";
                                                            break;
                                                        case 6:
                                                            echo "Canceled";
                                                            break;
                                                        case 7:
                                                            echo "Processed";
                                                            break;
                                                        case 8:
                                                            echo "Deleted";
                                                            break;
                                                        case 9:
                                                            echo "In Process";
                                                            break;
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $pr->po_no . " - " . $pr->po_line ?></td>
                                            </tr>
                                        <?php
                                            $no++;
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <h5 class="mb-2">Purchase Order Summary <small class="text-primary"><i><?= "periode tanggal PO " . $period ?></i></small></h5>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-8 col-sm-4 col-md-2">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-sync-alt"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text text-lg">Created</span>
                                            <span class="info-box-number text-md">
                                                <?= number_format($purchase->po_created) ?>
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <div class="col-8 col-sm-4 col-md-2">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-sync-alt"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text text-lg">Sent</span>
                                            <span class="info-box-number text-md">
                                                <?= number_format($purchase->po_sent) ?>
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-8 col-sm-4 col-md-2">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-spinner"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text text-lg">In Process</span>
                                            <span class="info-box-number text-md">
                                                <?= number_format($purchase->po_inprocess) ?>
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->

                                <!-- fix for small devices only -->
                                <div class="clearfix hidden-md-up"></div>

                                <div class="col-8 col-sm-4 col-md-2">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-white elevation-1"><i class="fas fa-times-circle"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text text-lg">Modified</span>
                                            <span class="info-box-number text-md">
                                                <?= number_format($purchase->po_modified) ?>
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-8 col-sm-4 col-md-2">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-check-circle"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text text-lg">Closed</span>
                                            <span class="info-box-number text-md">
                                                <?= number_format($purchase->po_closed) ?>
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-8 col-sm-4 col-md-2">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times-circle"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text text-lg">Cancelled</span>
                                            <span class="info-box-number text-md">
                                                <?= number_format($purchase->po_cancelled) ?>
                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover display" id="tbPO" style="border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th>PO No.</th>
                                            <th>PO Date</th>
                                            <th>Supplier</th>
                                            <th>PO Status</th>
                                            <th>Item</th>
                                            <th>Description</th>
                                            <th>Qty</th>
                                            <th>Receipt Qty</th>
                                            <th>Unit</th>
                                            <th>Receipt Date</th>
                                            <th>Receipt Status</th>
                                            <th>Buyer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($purchase->po_receipt as $prc) :
                                        ?>
                                            <tr>
                                                <td><?= $prc->po_no ?></td>
                                                <td><?= $prc->po_date ?></td>
                                                <td><?= $prc->bp_name ?></td>
                                                <td><?= $prc->status ?></td>
                                                <td><?= $prc->item ?></td>
                                                <td><?= $prc->desc ?></td>
                                                <td class="text-right"><?= number_format($prc->order_qty) ?></td>
                                                <td class="text-right"><?= number_format($prc->receipt_qty) ?></td>
                                                <td><?= $prc->unit ?></td>
                                                <td><?= $prc->receipt_date ?></td>
                                                <td>
                                                    <?php
                                                    if ($prc->receipt_qty == 0) {
                                                        echo "Not Received yet";
                                                    } elseif ($prc->receipt_qty == $prc->order_qty) {
                                                        echo "Receipt Completed";
                                                    } elseif ($prc->receipt_qty < $prc->order_qty) {
                                                        echo "Receipt Partial";
                                                    } else {
                                                        echo "Receipt Over";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $prc->buyer ?></td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <h5 class="mb-2">Purchase Invoice Summary <small class="text-primary"><i><?= "periode tanggal PO " . $period ?></i></small></h5>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-warning">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover display" id="tbPOMatch" style="border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th colspan="6" class="text-center">Order Detail</th>
                                            <th colspan="2" class="text-center">Order</th>
                                            <th colspan="2" class="text-center">Receipt</th>
                                            <th colspan="2" class="text-center">Invoice</th>
                                            <th colspan="2" class="text-center">Outstanding</th>
                                        </tr>
                                        <tr>
                                            <th>PO No.</th>
                                            <th>PO Date</th>
                                            <th>Supplier</th>
                                            <th>Item</th>
                                            <th>Description</th>
                                            <th>Unit</th>
                                            <th>PO Qty</th>
                                            <th>PO Amount</th>
                                            <th>Receipt Qty</th>
                                            <th>Receipt Amount</th>
                                            <th>Invoice Qty</th>
                                            <th>Invoice Amount</th>
                                            <th>Qty</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total_amount_po = 0;
                                        $total_amount_receipt = 0;
                                        $total_amount_match = 0;
                                        $total_amount_os = 0;
                                        foreach ($purchase->po_matched as $pmt) :
                                        ?>
                                            <tr>
                                                <td><?= $pmt->po_no ?></td>
                                                <td><?= $pmt->po_date ?></td>
                                                <td><?= $pmt->bp_name ?></td>
                                                <td><?= $pmt->partno ?></td>
                                                <td><?= $pmt->description ?></td>
                                                <td><?= $pmt->unit ?></td>
                                                <td class="text-right"><?= number_format($pmt->order_qty) ?></td>
                                                <td class="text-right"><?= "Rp. " . number_format($pmt->order_amount, 2, ',', '.') ?></td>
                                                <td class="text-right"><?= number_format($pmt->receipt_qty) ?></td>
                                                <td class="text-right"><?= "Rp. " . number_format($pmt->receipt_amount, 2, ',', '.') ?></td>
                                                <td class="text-right"><?= number_format($pmt->invoice_qty) ?></td>
                                                <td class="text-right"><?= "Rp. " . number_format($pmt->invoice_amount, 2, ',', '.') ?></td>
                                                <td class="text-right"><?= number_format($pmt->not_match_qty) ?></td>
                                                <td class="text-right"><?= "Rp. " . number_format($pmt->not_match_amount, 2, ',', '.') ?></td>
                                            </tr>
                                        <?php
                                            $total_amount_po = $total_amount_po + $pmt->order_amount;
                                            $total_amount_receipt = $total_amount_receipt + $pmt->receipt_amount;
                                            $total_amount_match = $total_amount_match + $pmt->invoice_amount;
                                            $total_amount_os = $total_amount_os + $pmt->not_match_amount;
                                        endforeach;
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <div class="row">
                                            <div class="col-lg-3 col-6">
                                                <!-- small card -->
                                                <div class="small-box bg-primary">
                                                    <div class="inner">
                                                        <h3 class="text-right"><?= "Rp. ". number_format($total_amount_po) ?></h3>
                                                        <p>Total Amount PO</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-6">
                                                <!-- small card -->
                                                <div class="small-box bg-info">
                                                    <div class="inner">
                                                        <h3 class="text-right"><?= "Rp. ". number_format($total_amount_receipt) ?></h3>
                                                        <p>Total Amount Receipt</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-check-circle"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-6">
                                                <!-- small card -->
                                                <div class="small-box bg-success">
                                                    <div class="inner">
                                                        <h3 class="text-right"><?= "Rp. ". number_format($total_amount_match) ?></h3>
                                                        <p>Total Amount Invoice Supplier</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-sync-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-6">
                                                <!-- small card -->
                                                <div class="small-box bg-warning">
                                                    <div class="inner">
                                                        <h3 class="text-right"><?= "Rp. ". number_format($total_amount_os) ?></h3>
                                                        <p>Total Amount Outstanding</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-times-circle"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tfoot>
                                </table>
                            </div>
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
<script type="text/javascript">
    var label = '';
    var data = '';

    $('#tbRequest').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
        }],
        order: [
            [1, "asc"]
        ],
        scrollY: 300,
        scrollX: true,
        scrollCollapse: true,
        paging: false,
        fixedHeader: {
            header: true,
            footer: true
        }
    });

    $('#tbPO').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
        }],
        order: [
            [1, "asc"],
            [0, "asc"]
        ],
        scrollY: 300,
        scrollX: true,
        scrollCollapse: true,
        paging: false,
        fixedHeader: {
            header: true,
            footer: true
        }
    });

    $('#tbPOMatch').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
        }],
        order: [
            [1, "asc"]
        ],
        scrollY: 300,
        scrollX: true,
        scrollCollapse: true,
        paging: false,
        fixedHeader: {
            header: true,
            footer: true
        }
    });
</script>
<?= $this->endSection() ?>