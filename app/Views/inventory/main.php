<?= $this->extend('layout/layout') ?>

<?= $this->section('stylecustom') ?>
<!-- sweet alert 2-->
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/sweetalert2/sweetalert2.min.css') ?>" />
<!-- datatable -->
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
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
        <div class="col-lg-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h2 class="text-primary">Item Inventory</h2>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableInventory">
                  <thead>
                    <tr>
                      <th rowspan="2">Part No</th>
                      <th rowspan="2">Std. Old Part</th>
                      <th rowspan="2">Part Name</th>
                      <th colspan="4" class="align-middle text-center">Inventory Qty</th>
                    </tr>
                    <tr>
                      <th>On Hand</th>
                      <th>Allocated</th>
                      <th>On Order</th>
                      <th>Economic Stock</th>
                    </tr>
                  </thead>
                  <tbody>
                    <div class="overlay" id="olTable"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                      <div class="text-bold pt-2"> Loading...</div>
                    </div>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <!-- small box -->
          <div class="small-box bg-teal">
            <div class="inner">
              <h3>WHFG01 </h3>
              <!-- WHFG01	2316775,24	2588458	865238	593555,24 -->
              <!-- <p>On Hand Qty : <span class="text-right"></span> </p> -->
              <div class="row text-secondary">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <p>On Hand :</p>
                      <div class="text-center text-primary">
                        <div class="overlay" id="olfg1-1"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                          <div class="text-bold pt-2"> Loading...</div>
                        </div>
                        <h4 id="onHandWhfg01" style="display: none;">-,-</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <p>On Order :</p>
                      <div class="text-center text-primary">
                        <div class="overlay" id="olfg1-2"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                          <div class="text-bold pt-2"> Loading...</div>
                        </div>
                        <h4 id="onOrderWhfg01" style="display: none;">-,-</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <p>Allocated :</p>
                      <div class="text-center text-primary">
                        <div class="overlay" id="olfg1-3"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                          <div class="text-bold pt-2"> Loading...</div>
                        </div>
                        <h4 id="allocatedWhfg01" style="display: none;">-,-</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <p>Economic Stock :</p>
                      <div class="text-center text-primary">
                        <div class="overlay" id="olfg1-4"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                          <div class="text-bold pt-2"> Loading...</div>
                        </div>
                        <h4 id="ecoStockWhfg01" style="display: none;">-,-</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <!-- small box -->
          <div class="small-box bg-teal">
            <div class="inner">
              <h3>WHFG02 </h3>
              <!-- WHFG01	2316775,24	2588458	865238	593555,24 -->
              <!-- <p>On Hand Qty : <span class="text-right"></span> </p> -->
              <div class="row text-secondary">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <p>On Hand :</p>
                      <div class="text-center text-primary">
                        <div class="overlay" id="olfg2-1"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                          <div class="text-bold pt-2"> Loading...</div>
                        </div>
                        <h4 id="onHandWhfg02" style="display: none;">-,-</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <p>On Order :</p>
                      <div class="text-center text-primary">
                        <div class="overlay" id="olfg2-2"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                          <div class="text-bold pt-2"> Loading...</div>
                        </div>
                        <h4 id="onOrderWhfg02" style="display: none;">-,-</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <p>Allocated :</p>
                      <div class="text-center text-primary">
                        <div class="overlay" id="olfg2-3"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                          <div class="text-bold pt-2"> Loading...</div>
                        </div>
                        <h4 id="allocatedWhfg02" style="display: none;">-,-</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <p>Economic Stock :</p>
                      <div class="text-center text-primary">
                        <div class="overlay" id="olfg2-4"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                          <div class="text-bold pt-2"> Loading...</div>
                        </div>
                        <h4 id="ecoStockWhfg02" style="display: none;">-,-</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="detailTitle">--</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableInventoryDetail">
                  <thead>
                    <tr>
                      <th>Warehouse</th>
                      <th>On Hand</th>
                      <th>Allocated</th>
                      <th>On Order</th>
                      <th>Economic Stock</th>
                    </tr>
                  </thead>
                  <tbody>
                    <div class="overlay" id="olTableDetail"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                      <div class="text-bold pt-2"> Loading...</div>
                    </div>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer ">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    </div>
</div>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<!-- component -->
<script src="<?= base_url('assets/js/component/main.js') ?>"></script>

<?= $this->endSection() ?>