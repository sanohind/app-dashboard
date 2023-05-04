<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= APP_NAME . " | " . APP_COMPANY ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/fontawesome-free/css/all.min.css') ?>" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/css/adminlte.css') ?>" />
    <style>
        body {
            font-size: small;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
        }

        .blink {
            animation: blink 1s steps(1, end) infinite;
            font-size: 32px;
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
    <!-- datatable -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugin/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<?= base_url('assets/img/sanoh1.jpg') ?>" alt="Sanoh Logo" height="200" width="150">
            <br />
            <div class="overlay text-center" id="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"> </i>
                <div class="text-bold pt-2"> Mohon tunggu, selagi kami persiapkan datanya... Terima kasih..</div>
            </div>
        </div>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-dark navbar-inverse">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <img src="<?= base_url('assets/img/sanoh1-2.jpg') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light text-primary"><?= APP_NAME ?></span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link text-primary" href="<?= site_url('login') ?>">
                            <i class="fas fa-sign-in-alt"></i> Login

                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> FINISH GOODS <small>CONTROL BOARD</SMALL></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="#">PLANT 2</a></li> -->
                                <li class="breadcrumb-item h4"><a href="#"><?= date('d F Y', strtotime(date('Y-m-d'))); ?></a></li>
                                <li class="breadcrumb-item"><span class="h6" id="timer"></span></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table width="auto" class="table table-bordered table-striped" id="tableStock">
                            <thead>
                                <tr class="bg-info text-center h5">
                                    <th>Part No</th>
                                    <th>Part Name</th>
                                    <th>Model</th>
                                    <th>Customer</th>
                                    <th>On Hand</th>
                                    <!-- <th>Safety Stock</th> -->
                                    <th>Min. Stock</th>
                                    <th>Max. Stock</th>
                                    <th>Shipment Plan</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($stock as $stk) {
                                ?>
                                    <tr>
                                        <td><?= $stk->partno . "<br/> <small>" . $stk->oldpartno . "</small>" ?></td>
                                        <td><?= $stk->partname ?></td>
                                        <td><?= $stk->model ?></td>
                                        <td><?= $stk->customer ?></td>
                                        <td><?= $stk->onhand ?></td>
                                        
                                        <td><?= $stk->min_stock ?></td>
                                        <td><?= $stk->max_stock ?></td>
                                        <td><?= $stk->total_planned ?></td>
                                        <td>
                                            <?php
                                            if ($stk->total_planned != 0) {
                                                $after = $stk->onhand - $stk->total_planned;
                                                if ($after < $stk->min_stock) {
                                                    echo "<i class='fas fa-exclamation-circle text-danger blink'></i>";
                                                }
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; <?= date('Y') ?> <a href="http://www.sanohindonesia.co.id/">PT. Sanoh Indonesia</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/adminlte/plugin/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/adminlte/plugin/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/adminlte/js/adminlte.min.js') ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
    <script type="text/javascript">
        $(document).ready(function() {
            var minutes, seconds, count, counter, timer;
            count = 1200; //seconds
            counter = setInterval(timer, 1000);

            function checklength(i) {
                "use strict";
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }

            function timer() {
                "use strict";
                count = count - 1;
                minutes = checklength(Math.floor(count / 60));
                seconds = checklength(count - minutes * 60);
                if (count < 0) {
                    clearInterval(counter);
                    return;
                }
                document.getElementById("timer").innerHTML =
                    "Refresh in " + minutes + ":" + seconds + " ";
                if (count === 0) {
                    location.reload();
                }
            }

            $("#tableStock").DataTable({
                dom: "Bfrtip",
                buttons: ["csv", "excel"],
                responsive: true,
                autoWidth: false,
                scrollY: "67vh",
                scrollCollapse: true,
                paging: false,
                columnDefs: [{
                    targets: [4, 5, 6, 7],
                    className: "dt-body-right text-right",
                    render: function(data, type, row, meta) {
                        if (type === "display") {
                            data = new Intl.NumberFormat().format(data);
                        }
                        return data;
                    },
                }, ],
                order: [
                    [8, "desc"],
                    [7, "desc"]
                ],
            });
        })
    </script>
</body>

</html>