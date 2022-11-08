<!-- Head -->
<?php $this->load->view('component/_head') ?>
<!-- Head -->

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <span class="loader"></span>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->


        <!-- ****** Top Header -->
        <?php $this->load->view('component/_header') ?>
        <!-- ****** Top Header -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <?php $this->load->view('component/_sidebar') ?>
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <!-- <h6 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome Jason!</h6> -->
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a>
                                        <i class="fas fa-angle-double-right"></i> Master QR Code
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <div class="container text-center" id="QR-Code ">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="navbar-form navbar-left">
                                <h4>Arahkan QR Code ke kamera</h4>
                            </div>
                            <div class="navbar-form navbar-center">
                                <select class="form-control" id="camera-select"></select>
                            </div>
                        </div>
                        <div class="panel-body text-center">
                            <div class="col-md-11 ">
                                <div class="well" style="position: middle;">
                                    <canvas width="400" height="400" id="webcodecam-canvas"></canvas>
                                    <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                                    <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                                    <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                                    <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>


            <!-- ============================================================== -->
            <!-- End Row -->
            <!-- End Location and Earnings Charts Section -->

            <!-- Start Top Leader Table -->
            <!-- <?php //$this->load->view('component/_table') 
                    ?> -->
            <!-- End Top Leader Table -->
        </div>

        <!-- End Container fluid  -->

        <!-- footer -->
        <?php $this->load->view('component/_footer') ?>
        <!-- End footer -->

    </div>
    <!-- End Page wrapper  -->

    </div>
    <!-- End Wrapper -->

    <!-- Jquery -->
    <?php $this->load->view('component/_jquery') ?>
    <!-- End JQuery -->

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $('#kartu').hide();
        });
    </script>