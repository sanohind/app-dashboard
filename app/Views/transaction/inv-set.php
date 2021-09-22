<?php

use PhpParser\Node\Expr\AssignOp\Concat;
?>
<?= $this->extend('layout/layout') ?>

<?= $this->section('stylecustom') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<!-- Date Range Picker -->
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/daterangepicker/daterangepicker.css') ?>" />
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
                    <h1>Invoice - Print Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Print Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Deliver to :</h5><br />
                            <p>
                            <address>
                                <strong><?= $invoice[0]->inv_adr1 ?></strong><br />
                                <?= $invoice[0]->inv_adr2 ?><br />
                                <?= $invoice[0]->inv_adr3 ?><br />
                                <?= $invoice[0]->inv_adr4 ?><br />
                                <?= $invoice[0]->inv_adr5 ?>
                            </address>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p></p>
                            <p></p>
                            Invoice No : <strong><?= $invoice[0]->trans . $invoice[0]->inv_no ?></strong><br />
                            Invoice Data : <strong><?= date("M-d, Y", strtotime($invoice[0]->inv_date)) ?></strong><br />
                            Payment terms : <strong><?= $invoice[0]->inv_payterm_desc ?></strong><br />
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" action="<?= base_url('/invoice-print') ?>" target="_blank">
                <div class="card card-success card-outline">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputBorder">Vessel</label>
                                    <input type="text" name="vessel" class="form-control form-control-border" placeholder="vessel name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBorder">Port of Discharge</label>
                                    <input type="text" name="portDest" class="form-control form-control-border" placeholder="port of discharge" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputBorder">Port of Loading</label>
                                    <input type="text" name="portLoading" class="form-control form-control-border" placeholder="port of loading" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBorder">Place of deliver</label>
                                    <input type="text" name="delvPlace" class="form-control form-control-border" placeholder="vessel name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputBorder">Sailing on or about</label>
                                    <input type="date" name="sailDate" class="form-control form-control-border" placeholder="vessel name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBorder">Shipped by</label>
                                    <!-- <input type="text" name="shipBy" class="form-control form-control-border" placeholder="vessel name"> -->
                                    <select name="shipby" class="form-control form-control-border" required>
                                        <option value="sea">SEA Shipment</option>
                                        <option value="air">AIR Shipment</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBorder">Incoterms</label>
                                    <select name="incoterm" class="form-control form-control-border" required>
                                        <option value="cif">CIF</option>
                                        <option value="fob">FOB</option>
                                        <option value="exw">Ex Works</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">Line</th>
                                    <th>C/No</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th colspan="2" class="text-center">No of Bundle</th>
                                    <th>Unit Price</th>
                                    <th>Amount</th>
                                    <th>PO Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach (json_decode($invDetail)  as $rowData) {
                                    $i = 0;
                                ?>
                                    <tr>
                                        <td><input type="text" name="invLine[]" class="form-control form-control-border" value="<?= $rowData->line ?>" readonly></td>
                                        <td><?= $rowData->item_no ?></td>
                                        <td><?= $rowData->description ?></td>
                                        <td><?= $rowData->qty ?></td>
                                        <td width="10%">
                                            <input type="number" name="boxQty[]" class="form-control form-control-border" required>
                                        </td>
                                        <td width="15%">
                                            <select name="box[]" class="form-control form-control-border" required>
                                                <option value="Cartons">Cartons</option>
                                                <option value="Box">Box</option>
                                            </select>
                                        </td>
                                        <td class="text-right"><?= number_format($rowData->price, 4, ",", ".") ?></td>
                                        <td class="text-right"><?= number_format($rowData->amount, 4, ",", ".")  ?></td>
                                        <td><?= $rowData->po_customer ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card card-warning card-outline">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputBorder">Pallets</label>
                                    <input type="number" name="pallet" class="form-control form-control-border">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputBorder">Net Weight</label>
                                    <input type="number" name="netweight" class="form-control form-control-border">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBorder">Gross Weight</label>
                                    <input type="number" name="grossweight" class="form-control form-control-border">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputBorder">FOB Total</label>
                                    <input type="text" name="fobTotal" class="form-control form-control-border" value="<?= number_format($invoice[0]->inv_amount, 4, ".", ",") ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBorder">Insurance</label>
                                    <input type="number" name="insurance" class="form-control form-control-border">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputBorder">Freight Cost</label>
                                    <input type="number" name="frcost" class="form-control form-control-border">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="invNo" value="<?= $invoice[0]->trans . $invoice[0]->inv_no ?>">
                <button type="submit" name="process" class="btn btn-small btn-success"><i class="fas fa-print"></i> Print Invoice</button>
                <p></p>
            </form>

        </div>

    </section>
    <!-- /.content -->
</div>

<?= $this->endSection() ?>

<?= $this->section('jscustom') ?>
<script src="<?= base_url('assets/adminlte/plugin/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script>
    $('#tbInvoice').DataTable({
        "order": [
            [2, "asc"]
        ]
    });
</script>
<?= $this->endSection() ?>