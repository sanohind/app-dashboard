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
          <h1>Receipt Report</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card" id="nonPrrint">
      <div class="card-body">
        <h3 class="card-title">Filter by :</h3>
        <br />
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Date Receipt From:</label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                <input type="date" class="form-control float-right" id="rcDateFrom">
              </div>
              <!-- /.input group -->
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>To:</label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                <input type="date" class="form-control float-right" id="rcDateTo">
              </div>
              <!-- /.input group -->
            </div>
          </div>
          <div class="col-md-4">
            <h3 class="card-title">Or by &nbsp; </h3>
            <div class="form-group">
              <label> Nomor PO : </label>

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

      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button class="btn btn-primary" id="btnDisplay"><i class="fas fa-file"> </i> Display</button>
        <button class="btn btn-secondary" id="btnPrint" onclick="printDiv('displayElement')"><i class="fas fa-print"> </i> Print</button>
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->


    <div id="overlay" class="overlay text-center" style="display: none;"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
      <div class="text-bold pt-2">Loading...</div>
    </div>

    <div id="displayElement" class="invoice p-3 mb-3 text-small">

      <!-- <div class="row invoice-info">
        <div class="col-sm-6 invoice-col">
          <span class="text-info">PO Information.</span>
          <address>
            PO Number : <br>
            PO Date : <br>
            Supplier : <br>
          </address>
        </div>

        <div class="col-sm-6 invoice-col">
          Receipt Information.
          <address>
            Receipt No : <br>
            Receipt Date : <br>
            Packing Slip No :<br>
          </address>
        </div>
        <br>

        <table class="table table-striped" id="tbDisplay">
          <thead>
            <tr>
              <th>Item No</th>
              <th>Description</th>
              <th>Std. Old Part</th>
              <th>PO Qty</th>
              <th>Unit Price</th>
              <th>Receipt Qty</th>
              <th>Unit</th>
              <th>Extended Cost</th>
              <th>Inv. Doc. No</th>
              <th>Approve Date.</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <hr />
      <br> -->

    </div>

  </section>
  <!-- /.content -->
</div>

<?= $this->endSection() ?>

<?= $this->section('jscustom') ?>
<!-- sweet alert 2-->
<script src="<?= base_url('assets/adminlte/plugin/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- datatable -->
<script src="<?= base_url('assets/adminlte/plugin/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<!-- InputMask -->
<script src="<?= base_url('assets/adminlte/plugin/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/inputmask/jquery.inputmask.min.js') ?>"></script>
<!-- date-range-picker -->
<script src="<?= base_url('assets/adminlte/plugin/daterangepicker/daterangepicker.js') ?>"></script>
<!-- component -->
<script src="<?= base_url('assets/js/component/receipt.js') ?>"></script>
<?= $this->endSection() ?>