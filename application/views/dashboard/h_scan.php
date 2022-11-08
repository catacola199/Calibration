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
                                        <i class="fas fa-angle-double-right"></i> Master Kalibrasi
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
                <div class="container ">
                    <div class="row">
                        <div class="col">

                            <div class="card text-white bg-secondary mb-3" style="width: 20rem;">
                                <div class="card-body">
                                    <h5 class="card-title text-white">Data Alat</h5>
                                    <hr style="height:2px; width:50%; border-width:0; color:white; background-color:white">
                                        <p class="card-text">Nama Alat :<?php echo $alat->nama_alat ?> </p>
                                        <p class="card-text">Merk Alat :<?php echo $alat->merk_alat ?> </p>
                                        <p class="card-text">Tipe Alat :<?php echo $alat->tipe_alat ?> </p>
                                        <p class="card-text">No Seri Alat :<?php echo $alat->noseri_alat ?> </p>
                                        <p class="card-text">Lokasi Alat :<?php echo $alat->lokasi_alat ?> </p>
                                        <p class="card-text">Tanggal Alat Tiba :<?php echo $alat->tglpengadaan_alat ?> </p>
                                    <hr style="height:2px; width:50%; border-width:0; color:white; background-color:white">
                                    <p class="card-text">Riwayat Kalibrasi </p>
                                    <hr style="height:2px; width:50%; border-width:0; color:white; background-color:white">
                                        <p class="card-text">Tanggal Kalibrasi :<?php echo $kalibrasi->tgl_kalibrasi ?> </p>
                                        <p class="card-text">Lampiran File :<?php echo $kalibrasi->lampiran ?> </p>
                                        <p class="card-text">Quality Pass :<?php echo $kalibrasi->quality_pass ?> </p>
                                    <hr style="height:2px; width:50%; border-width:0; color:white; background-color:white">
                                    <p class="card-text">Riwayat Pemeliharaan </p>
                                    <hr style="height:2px; width:50%; border-width:0; color:white; background-color:white">
                                        <p class="card-text">Tanggal Pemeliharaan :<?php echo $pemeliharaan->tgl_pemeliharaan ?> </p>
                                        <p class="card-text">Petugas Pemeliharaan :<?php echo $pemeliharaan->petugas ?> </p>
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

        });
    </script>