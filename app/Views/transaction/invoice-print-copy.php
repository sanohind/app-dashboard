<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ERP | Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/fontawesome-free/css/all.min.css') ?>" />
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/css/adminlte.css') ?>" />
</head>

<body>
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-7">
          <h2 class="page-header">INVOICE</h2>
        </div>
        <div class="col-5">
          <h2 class="page-header">PT. Sanoh Indonesia<br /></h2>
          <small>Jl. Inti II Blok C-04 No. 10 Kawasan Industri Hyundai</small><br />
          <small>Cikarang - Bekai, 17550. Indonesia</small>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <table border="1" class="table table-border">
          <tr>
            <td width="58%" rowspan="5" class="outline">
              <h6 class="text-sub-head">Deliver to :</h6>

              <address>
                <strong>Admin, Inc.</strong><br />
                795 Folsom Ave, Suite 600<br />
                San Francisco, CA 94107<br />
                Phone: (804) 123-5432<br />
                Email: info@almasaeedstudio.com
              </address>
            </td>
            <td class="outline">
              <div class="row">
                <div class="col-md-7">
                  <h6 align="top">Invoice No :</h6>
                </div>
                <div class="col-md-5">
                  <h6 align="top">Date :</h6>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td class="outline">
              <h6>L/C No.</h6>
            </td>
          </tr>
          <tr>
            <td class="outline">
              <h6>Issuing Bank</h6>
            </td>
          </tr>
          <tr>
            <td class="outline">
              <h6>Term / Method of payment</h6>
            </td>
          </tr>
          <tr>
            <td class="outline">
              <h6>Contract No.</h6>
            </td>
          </tr>
        </table>
      </div>
      <!-- /.row -->

      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Vessel<br />
          <p></p>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Port of Loading <br />
          <p></p>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Sailing on or about <br />
          <p></p>
        </div>
        <!-- /.col -->
      </div>
      <hr />

      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Port of discharge<br />
          <p></p>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Place of delivery <br />
          <p></p>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Shipped by <br />
          <p></p>
        </div>
        <!-- /.col -->
      </div>
      <hr />

      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          PART FOR AUTOMOTIVE<br />
          COMPONENT
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col text-center">
          <p class="text-bold">CIF / FOB / EXWORKS</p> <br />
          <p></p>
        </div>
        <!-- /.col -->
      </div>
      <br />

      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>C/No</th>
                <th>Description</th>
                <th>No Of Bundles</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Amount</th>
                <th>PO Number</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i = 0; $i < 5; $i++) {
              ?>
                <tr>
                  <td>21621-3LTOA</td>
                  <td>Tube Assy Oil Cooler</td>
                  <td>40 Cartons</td>
                  <td>1440 Pcs</td>
                  <td>4,6190</td>
                  <td>6.651,3600</td>
                  <td>JKB-APT-2108-001</td>
                </tr>
              <?php
              };
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <hr />
      <!-- /.row -->

      <div class="row invoice-info">
        <div class="col-sm-6 invoice-col text-center">
          <b><u>40 Cartons</u></b>
          <br />
          <b>2 Pallets</b>
        </div>
        <!-- /.col -->
        <div class="col-sm-6 invoice-col">
          <dl class="row">
            <dd class="col-sm-4">FOB TOTAL</dt>
            <dt class="col-sm-8">6.651,36</dd>
            <dd class="col-sm-4">INSURANCE</dt>
            <dt class="col-sm-8">104.12</dd>
            <dd class="col-sm-4">FREIGHT COST</dt>
            <dt class="col-sm-8">289.97</dd>
          </dl>
        </div>
        <!-- /.col -->
      </div>
      <hr />

      <div class="row invoice-info">
        <div class="col-sm-6 invoice-col text-center">
        </div>
        <!-- /.col -->
        <div class="col-sm-6 invoice-col">
          <dl class="row">
            <dd class="col-sm-4">CIF TOTAL</dt>
            <dt class="col-sm-8">7.045.45</dd>
          </dl>
        </div>
        <!-- /.col -->
      </div>
      <hr />


      <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
          <address style="font-size: small;">
            * COMMERCIAL VALUE <br>
            * NET WEIGHT 333 KGS <br>
            * GROSS WEIGHT 370 KGS <br>
            * PACKING : 40 Cartons : 2 Pallet <br>
            * COUNTRY OF ORIGIN : INDONESIA <br>
            <u>* BANK OF PAYMENT :</u> <br>
            ACCOUNT NAME : PT. SANOH INDONESIA <br>
            ACCOUNT NUMBER (USD) : 5300-889012 <br>
            BANK NAME : MUFG BANK, Ltd <br>
            BANK BRANCH : JAKARTA <br>
            SWIFT CODE : BOTKIDJX <br>
          </address>

        </div>
        <!-- /.col -->
        <div class="col-6">
          <p class="lead" style="margin-left: 25px;">PT. Sanoh Indonesia</p>
          <br />
          <br />
          <hr style="width:40%;text-align:left;margin-left:30px">
          <p style="margin-left: 25px;">ABDUL KADIR</p>
          <p style="margin-left: 25px;">MANAGER</p>
        </div>
      </div>
      <!-- /.col -->
  </div>
  <!-- /.row -->
  </section>
  <!-- /.content -->
  </div>
  <!-- ./wrapper -->
  <!-- Page specific script -->
  <script>
    window.addEventListener("load", window.print());
  </script>
</body>

</html>