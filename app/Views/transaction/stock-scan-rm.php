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
                    <h1>Stock Opname Scan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Stock Opname Scan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <!-- <div class="overlay text-center" id="overlay" style="display: none;"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
            <div class="text-bold pt-2"> Loading...</div>
        </div> -->
        <div class="row">
            <div class="col-md-9">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Scan Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <!-- <form class="form-horizontal"> -->
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="qrScan" class="col-sm-1 col-form-label text-right">Group</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" id="grScan" name="grScan" value="RM" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nikScan" class="col-sm-1 col-form-label text-right">NIK</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" id="nikScan" name="whScan" placeholder="Masukkan NIK Anda">
                            </div>

                            <label for="whScan" class="col-sm-1 col-form-label text-right">Warehouse</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" id="whScan" name="whScan" placeholder="Masukkan WH">
                            </div>

                            <label for="whScan" class="col-sm-1 col-form-label text-right">Period</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" id="periodScan" name="periodScan" value="<?= date('Ym') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="qrScan" class="col-sm-1 col-form-label text-right">Label</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="qrScan" name="qrScan" placeholder="scan here...">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Stock Opname Data</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tbSto" class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>STO Date</td>
                                        <td>Warehouse</td>
                                        <td>Part No</td>
                                        <td>Qty</td>
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
    //$("#qrScan").focus();
    $(document).ready(function() {
        $("#nikScan").focus();

        var tbScan = $('#tbSto').DataTable({
            dom: "Bfrtip",
            "ajax": "<?= base_url("/data-scan") ?>/" + $("#periodScan").val() + "/" + $("#whScan").val(),
            "dataSrc": "data",
            buttons: [{
                extend: 'excelHtml5',
                title: `STO_File_`
            }, ],
            stateSave: true,
            columns: [{
                    data: "datescan",
                },
                {
                    data: "part",
                },
                {
                    data: "qty",
                },
                {
                    data: "lot",
                },
                {
                    data: "customer",
                },
                {
                    data: "prod",
                },

            ],
            order: [
                [0, "desc"],
            ],
        });

        $("#qrScan").blur(function() {
            var grp = $('#grScan').val();
            var nik = $("#nikScan").val();
            var wh = $("#whScan").val();
            var period = $("#periodScan").val();
            var data = $("#qrScan").val();
            //console.log(data);
            if (data == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please Scan Label!'
                });
            }

            $.ajax({
                url: '<?= base_url('/scan-proses-rm') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    group: grp,
                    nik: nik,
                    wh: wh,
                    period: period,
                    label: data
                },
                success: function(response) {
                    $("#qrScan").val("");
                    if (response.success == false) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.msg
                        });
                    } else {
                        tbScan.ajax.reload(null, false);
                        $("#qrScan").focus();
                    }
                }
            })
        });
    });
</script>
<?= $this->endSection() ?>