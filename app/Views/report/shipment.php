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
                    <h1>Shipment Chart</h1>
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
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Filter by :</h3>
                <br />
                <div class="row">
                    <div class="col-md-3">
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
                    <div class="col-md-3">
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
                    <div class="col-md-2 ">
                        <div class="form-group mt-3">
                            <button class="btn btn-primary" id="btnFilter"><i class="fas fa-search"> </i> Display</button>
                        </div>

                    </div>

                </div>
                <br />

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="row">
            <div class="col-md-12" id="displayChart">
                <canvas id="myChart" height="75px"></canvas>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>

<?= $this->endSection() ?>



<?= $this->section('jscustom') ?>
<!-- sweet alert 2-->
<script src="<?= base_url('assets/adminlte/plugin/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/plugin/chartjs/dist/chart.min.js') ?>"></script>
<!-- component -->
<script>
    renderChart();

    $('#btnFilter').click(function() {
        const dtFrom = document.getElementById('rcDateFrom').value;
        const dtTo = document.getElementById('rcDateTo').value;
        const divChart = document.getElementById('displayChart');
        divChart.removeChild(document.getElementById('myChart'));
        const chartELement = document.createElement('canvas');
        chartELement.setAttribute('id', 'myChart');
        chartELement.setAttribute('height', '75px');
        divChart.append(chartELement);
        renderChart(dtFrom, dtTo);
    });

    function renderChart(datefrom = '', dateto = '') {
        fetch(`${api_url}/shipment-daily/?datefrom=${datefrom}&dateto=${dateto}`, {
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
                    //console.log(result);
                    const label = [];
                    const data = [];
                    for (res of result) {
                        label.push(res.date);
                        data.push(res.total_qty);
                    }
                    //console.log(label);
                    drawChart('Shipment Chart', label, data);
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
        var ctx = document.getElementById('myChart').getContext('2d');
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
                }
            }
        });
    }
</script>
<?= $this->endSection() ?>