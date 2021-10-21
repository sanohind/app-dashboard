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
                    <h1>Sales Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sales Report</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="overlay text-center" id="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
            <div class="text-bold pt-2"> Loading...</div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Filter</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <!-- <form class="form-horizontal"> -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="invDateFrom" class="col-sm-3 col-form-label">dari tanggal</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="date" class="form-control float-right" id="invDateFrom">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="invDateTo" class="col-sm-3 col-form-label">sampai</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="date" class="form-control float-right" id="invDateTo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button class="btn btn-info" id="btnFilter"><i class="fas fa-search"> </i> Filter</button>
                    </div>
                    <!-- /.card-footer -->
                    <!-- </form> -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="card card-success">
                    <div class="card-body" id="displayChart">
                        <canvas id="myChart" height="63px"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Detail Sales Report</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tbSales" class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>Trans</td>
                                        <td>Invoice No.</td>
                                        <td>Invoice Date</td>
                                        <td>Customer</td>
                                        <td>Currency</td>
                                        <td>Payment</td>
                                        <td>PO Customer</td>
                                        <td>Part No</td>
                                        <td>Old Part No</td>
                                        <td>Description</td>
                                        <td>Qty</td>
                                        <td>Unit Price</td>
                                        <td>Amount</td>
                                        <td>Amount (IDR)</td>
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
    renderChart();

    $('#btnFilter').click(function() {
        const overlay = document.getElementById('overlay');
        overlay.setAttribute('style', 'display : block');
        $("#tbSales").DataTable().destroy();
        const dtFrom = document.getElementById('invDateFrom').value;
        const dtTo = document.getElementById('invDateTo').value;
        const divChart = document.getElementById('displayChart');
        divChart.removeChild(document.getElementById('myChart'));
        const chartELement = document.createElement('canvas');
        chartELement.setAttribute('id', 'myChart');
        chartELement.setAttribute('height', '63px');
        divChart.append(chartELement);
        renderChart(dtFrom, dtTo);
    });

    function renderChart(datefrom = '', dateto = '') {
        fetch(`${api_url}/get-sales-daily/?datefrom=${datefrom}&dateto=${dateto}`, {
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
                const resSummary = data.summary;
                const resData = data.data;
                if (Object.keys(resSummary).length > 0) {
                    console.log(resSummary);
                    const label = [];
                    const data = [];
                    for (res of resSummary) {
                        label.push(res.inv_date2);
                        data.push(res.total_amount);
                    }
                    //console.log(label);
                    drawChart('Sales Amount', label, data);
                    drawTbChart(resData);
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

    function drawTbChart(data) {
        //console.log(data)
        $("#tbSales").DataTable({
            dom: "Bfrtip",
            buttons: ["copy", "csv", "excel"],
            responsive: true,
            autoWidth: false,
            data: data,
            columnDefs: [{
                    targets: [10, 11, 12],
                    render: function(data, type, row, meta) {
                        if (type === "display") {
                            data = new Intl.NumberFormat().format(data);
                        }
                        return data;
                    },
                },
                {
                    targets: [13],
                    render: function(data, type, row, meta) {
                        if (type === "display") {
                            data = new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            }).format(data);
                        }
                        return data;
                    },
                },
            ],
            columns: [{
                    data: "trans",
                },
                {
                    data: "inv_no",
                },
                {
                    data: "inv_date2",
                },
                {
                    data: "bp_name",
                },
                {
                    data: "inv_currency",
                },
                {
                    data: "inv_payterms",
                },
                {
                    data: "po_customer",
                },
                {
                    data: "item_no",
                },
                {
                    data: "std_oldpart",
                },
                {
                    data: "description",
                },
                {
                    data: "qty",
                },
                {
                    data: "price",
                },
                {
                    data: "amount",
                },
                {
                    data: "amount_base",
                },

            ],
            order: [
                [2, "asc"]
            ],
        });
    }
</script>
<?= $this->endSection() ?>