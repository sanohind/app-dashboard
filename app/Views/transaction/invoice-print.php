<!DOCTYPE html>
<html lang="en">

<head>
  <!-- <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ERP | Invoice Print</title> -->

  <!-- Theme style -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/css/pdf.php') ?>" />
	<!-- <link href="pdf.php" rel="stylesheet"> -->
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
                <strong><?= $invoice[0]->bp_name ?></strong><br />
                <?= $invoice[0]->inv_adr2 ?><br />
                <?= $invoice[0]->inv_adr3 ?><br />
                <?= $invoice[0]->inv_adr4 ?><br />
                <?= $invoice[0]->inv_adr5 ?>
              </address>
            </td>
            <td class="outline">
              <div class="row">
                <div class="col-md-7">
                  <h6 align="top">Invoice No :</h6>
                  <strong><?= $shipment['invNo'] ?></strong>
                </div>
                <div class="col-md-5">
                  <h6 align="top">Date :</h6>
                  <strong><?= $invoice[0]->inv_date2 ?></strong>
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
          <strong><?= $shipment['vessel'] ?></strong>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Port of Loading <br />
          <strong><?= $shipment['portLoading'] ?></strong>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Sailing on or about <br />
          <strong><?= $shipment['sailDate'] ?></strong>
        </div>
        <!-- /.col -->
      </div>
      <hr />

      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Port of discharge<br />
          <strong><?= $shipment['portDest'] ?></strong>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Place of delivery <br />
          <strong><?= $shipment['delvPlace'] ?></strong>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Shipped by <br />
         <strong><?= $shipment['shipby'] ?></strong>
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
          <p class="text-bold"><?= strtoupper($shipment['incoterm'])  ?></p> <br />
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
              
              <?php 
                $i=0;
                $packingTotal = 0;
                $amountTotal = 0;
              foreach(json_decode($invDetail) as $row) {
                $amount = $row->amount;
                $packing = $shipment['boxQty'][$i];
              ?>
                <tr>
                  <td><?= $row->item_no ?></td>
                  <td><?= $row->description ?></td>
                  <td><?= $shipment['boxQty'][$i] ." ".$shipment['box'][$i] ?></td>
                  <td><?= number_format($row->qty)  ?> Pcs</td>
                  <td><?= number_format($row->price,4)  ?></td>
                  <td><?= number_format($row->amount,2)  ?></td>
                  <td><?= $row->po_customer ?></td>
                </tr>
              <?php
                $packingTotal = $packing + $packingTotal;
                $amountTotal = $amount + $amountTotal;
              $i++;
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
          <b><u><?= $packingTotal ?> Cartons</u></b>
          <br />
          <b><?= $shipment['pallet'] ?> Pallets</b>
        </div>
        <!-- /.col -->
        <div class="col-sm-6 invoice-col">
          <dl class="row">
            <dd class="col-sm-4">FOB TOTAL</dt>
            <dt class="col-sm-8"><?= number_format($amountTotal,2) ?></dd>
            <dd class="col-sm-4">INSURANCE</dt>
            <dt class="col-sm-8"><?= number_format($shipment['insurance'],2) ?></dd>
            <dd class="col-sm-4">FREIGHT COST</dt>
            <dt class="col-sm-8"><?= number_format($shipment['frcost'],2) ?></dd>
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
            <dt class="col-sm-8"><?= number_format($amountTotal+$shipment['insurance']+$shipment['frcost'],2) ?></dd>
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
            * NET WEIGHT <?= number_format($shipment['netweight'],2) ?> KGS <br>
            * GROSS WEIGHT <?= number_format($shipment['grossweight'],2) ?> KGS <br>
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