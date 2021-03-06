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

    <!-- Default box -->
    <div class="card" id="nonPrrint">
      <div class="card-header">
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#collapseFilter" title="Collapse">
          <i class="fas fa-search"></i>
          Filter Data
        </button>
      </div>
      <div class="card-body collapse" id="collapseFilter">
        <h3 class="card-title">Select Data :</h3>
        <br />
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Transaction Type :</label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-file"></i>
                  </span>
                </div>
                <!-- <input type="date" class="form-control float-right" id="rcDateFrom"> -->
                <select class="form-control">
                  <option value="SIE">SIE</option>
                </select>
              </div>
              <!-- /.input group -->
            </div>
          </div>
          <div class="col-md-4">

            <div class="form-group">
              <label> Invoice No : </label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-file"></i>
                  </span>
                </div>
                <input type="text" class="form-control float-right" id="po_no">
              </div>
              <!-- /.input group -->
            </div>
          </div>
        </div>
        <button class="btn btn-primary" id="btnDisplay"><i class="fas fa-search"> </i> Display</button>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <div class="card card-primary">
      <div class="card-body">
        <div class="table-responsive">
          <table id="tbInvoice" class="table table-striped">
            <thead>
              <tr>
                <th>Trans.</th>
                <th>Invoice No</th>
                <th>Invoice Batch No</th>
                <th>Date</th>
                <th>Customer Name</th>
                <th>Amount</th>
                <th>Currency</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($invoice == null) {
              ?>
                <tr class="text-center">
                  <td colspan="8">"No data found..."</td>
                </tr>
                <?php
              } else {
                foreach ($invoice as $row) {
                ?>
                  <tr>
                    <td><?= $row->trans ?></td>
                    <td><?= $row->inv_no ?></td>
                    <td><?= $row->inv_batchno ?></td>
                    <td><?= date('Y-m-d', strtotime($row->inv_date,)) ?></td>
                    <td><?= $row->bp_name ?></td>
                    <td class="text-right"><?= number_format($row->inv_amount, 2) ?></td>
                    <td><?= $row->inv_currency ?></td>
                    <td>
                      <a href="<?= site_url("/invoice-set/$row->trans/$row->inv_no") ?>" class="btn btn-small btn-info">Detail</a>
                    </td>
                  </tr>
              <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
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