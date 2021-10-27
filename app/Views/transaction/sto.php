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
                    <h1>Stock Opname</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Stock Opname</li>
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
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Filter</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <!-- <form class="form-horizontal"> -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="stoYear" class="col-sm-1 col-form-label text-right">Year</label>
                            <div class="col-sm-2">
                                <select class="form-control" id="stoYear">
                                    <option value="">-- Choose --</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                </select>
                            </div>

                            <label for="stoMonth" class="col-sm-1 col-form-label text-right">Month</label>
                            <div class="col-sm-2">
                                <select class="form-control" id="stoMonth">
                                    <option value="">-- Choose --</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>

                            <label for="stoWarehouse" class="col-sm-1 col-form-label text-right">Warehouse</label>
                            <div class="col-sm-3">
                                <select class="form-control" id="stoWarehouse">
                                    <option value="">-- Choose --</option>
                                    <?php
                                    foreach ($warehouse as $wh) :
                                    ?>
                                        <option value="<?= $wh->warehouse ?>"><?= $wh->warehouse ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>

                            <div class="col-sm-2">
                                <button class="btn btn-info" id="btnFilter"><i class="fas fa-search"> </i> Display</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Stock Point Inventory</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tbSto" class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>STO Date</td>
                                        <td>Warehouse</td>
                                        <td>Part No</td>
                                        <td>Std. Old Part</td>
                                        <td>Description</td>
                                        <td>Unit</td>
                                        <td>STO Qty</td>
                                        <td>Actual</td>
                                        <td>Variance</td>
                                        <td>Remark</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
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
    //renderChart();

    $('#btnFilter').click(function() {
        const overlay = document.getElementById('overlay');
        overlay.setAttribute('style', 'display : block');
        $("#tbSto").DataTable().destroy();
        const year = document.getElementById('stoYear').value;
        const month = document.getElementById('stoMonth').value;
        const wh = document.getElementById('stoWarehouse').value;
        renderChart(year, month, wh);
    });

    function renderChart(year, month, warehouse) {
        fetch(`${api_url}/get-sto/?year=${year}&month=${month}&warehouse=${warehouse}`, {
                mode: "no-cors"
            })
            .then(response => {
                if (response.ok) {
                    return Promise.resolve(response);
                } else {
                    return Promise.reject(new Error('Failed to load'));
                }
            })
            .then(response => response.json()) // parse response as JSON
            .then(data => {
                //const resSummary = data.summary;
                const resData = data.data;
                if (Object.keys(resData).length > 0) {
                    //console.log(resData);
                    const file = `${year+''+month}_${warehouse}_STO_Template`;
                    console.log(file);
                    drawTbChart(resData,file);
                    const overlay = document.getElementById('overlay');
                    overlay.setAttribute('style', 'display : none');
                } else {
                    document.getElementById('overlay').style.display = "none";
                    //alert("No Data, please change filter");
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'No data display, please change filter..'
                    })
                }
            })
            .catch(function(error) {
                console.log(`Error: ${error.message}`);
                //alert(`Error: ${error.message}`);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: `${error.message}. Please contact administrator!!`
                })
            });
    }

    function drawTbChart(data,file) {
        //console.log(data)
        $("#tbSto").DataTable({
            dom: "Bfrtip",
            //buttons: ["copy", "csv", "excel"],
            responsive: true,
            autoWidth: true,
            data: data,
            buttons: [{
                    extend: 'excelHtml5',
                    title: file
                },
            ],
            columns: [{
                    data: "sto_date",
                },
                {
                    data: "warehouse",
                },
                {
                    data: "item",
                },
                {
                    data: "old_partno",
                },
                {
                    data: "description",
                },
                {
                    data: "unit",
                },
                {
                    data: "sto_qty",
                },
                {
                    data: "actual",
                },
                {
                    data: "variance",
                },
                {
                    data: "remark",
                },

            ],
            order: [
                [1, "asc"]
            ],
        });
    }
</script>
<?= $this->endSection() ?>