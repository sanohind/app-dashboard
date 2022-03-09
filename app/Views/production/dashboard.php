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
                    <h1>Production Dashboard <small id="prodDiv"><?= $div ?></small></h1>
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
        <div class="container-fluid">
            <h5 class="mb-2">Production Plan & Achievment</h5>
            <div class="row">
                <div class="col-lg-4 col-8">
                    <!-- small card -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Total Plan ( period : <?= date('M') . " " . date('Y') ?> )</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-8">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>120</h3>
                            <p>Total Result ( base on scan period : <?= date('M') . " " . date('Y') ?> )</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-8">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>30</h3>
                            <p>Total Outstanding ( period : <?= date('M') . " " . date('Y') ?> )</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <h5 class="mb-2">Production Status</h5>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-sync-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text text-lg">Release</span>
                            <span class="info-box-number text-md">
                                10
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-spinner"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text text-lg">Active</span>
                            <span class="info-box-number text-md">16</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-times-circle"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text text-lg">Completed</span>
                            <span class="info-box-number text-md">16</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-check-circle"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text text-lg">Closed</span>
                            <span class="info-box-number text-md">16</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>

            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Daily Result <small><i>Base on Actual Scan</i></small></h5>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <!-- Sales Chart Canvas -->
                                <canvas id="prodChart" height="60px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card card-info border">
                        <div class="card-header">
                            <h5 class="card-title">Sticker Generate <br> <small><i>period : <?= date('M') . " " . date('Y') ?></i></small></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="info-box">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-md">Release</span>
                                            <span class="info-box-number text-md text-center text-info">
                                                500
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="info-box">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-md">Use Scan</span>
                                            <span class="info-box-number text-md text-center text-info">
                                                485
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

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
    renderChart();

    function renderChart(datefrom = '2022-02-01', dateto = '2022-02-25') {
        fetch(`https://localhost/slim-rest/public/shipment-daily/?datefrom=${datefrom}&dateto=${dateto}`, {
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
                const result = data.data;
                if (Object.keys(result).length > 0) {
                    console.log(result);
                    const label = [];
                    const data = [];
                    for (res of result) {
                        label.push(res.date);
                        data.push(res.total_qty);
                    }
                    //console.log(label);
                    drawChart('Production Chart', label, data);
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

    function drawChart(title, label, data) {
        var ctx = document.getElementById('prodChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: label,
                datasets: [{
                    label: title,
                    data: data,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: 'rgb(255, 99, 132)'
                        }
                    }
                }
            }
        });
    }
</script>
<?= $this->endSection() ?>