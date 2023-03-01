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
            <div class="container-fluid mt-3" style="padding: 5px">
                <div class="container ">
                    <div class="card mb-3">
                        <div class="card-body">
                            <center><h3 class="card-title">Data Alat</h3></center>
                            <hr>
                            <div class="row">
                                <div class="col-5 col-md-3">
                                    <p class="card-text text-truncate">Nama Alat</p>
                                </div>
                                <div class="col">
                                    <p class="card-text"><?php echo ": ".$alat->nama_alat ?> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 col-md-3">
                                    <p class="card-text text-truncate">Merk Alat</p>
                                </div>
                                <div class="col">
                                    <p class="card-text"><?php echo ": ".$alat->merk_alat ?> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 col-md-3">
                                    <p class="card-text text-truncate">Tipe Alat</p>
                                </div>
                                <div class="col">
                                    <p class="card-text"><?php echo ": ".$alat->tipe_alat ?> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 col-md-3">
                                    <p class="card-text text-truncate">Nomor Seri Alat</p>
                                </div>
                                <div class="col">
                                    <p class="card-text"><?php echo ": ".$alat->noseri_alat ?> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 col-md-3">
                                    <p class="card-text text-truncate">Lokasi Alat</p>
                                </div>
                                <div class="col">
                                    <p class="card-text"><?php echo ": ".$alat->lokasi_alat ?> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 col-md-3">
                                    <p class="card-text text-truncate">Tanggal Alat Tiba</p>
                                </div>
                                <div class="col">
                                    <p class="card-text"><?php echo ": ".$alat->tglpengadaan_alat ?> </p>
                                </div>
                            </div>
                            <hr>
                            <h4 class="card-title"><i class='bx bx-check'></i> Riwayat Kalibrasi </h4>
                            <hr>
                            <div class="table-responsive">
                                <table id="kalibrasi" class="table table-bordered display no-wrap" style="width:100%">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal Kalibrasi</th>
                                            <th>Lampiran</th>
                                            <th>Quality Pass</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($kalibrasi as $data) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?php echo $data->tgl_kalibrasi ?></td>
                                                <td><a href="<?php echo base_url('upload/kalibrasi/file_lampiran/' . $data->lampiran) ?>"> <?php echo $data->lampiran ?> </a></td>
                                                <td><?php echo $data->quality_pass ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table id="kalibrasi" class="table table-bordered display no-wrap" style="width:100%">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal Uji Kesesuaian</th>
                                            <th>Lampiran</th>
                                            <th>Quality Pass</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($ukes as $data) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?php echo $data->tgl_ukes ?></td>
                                                <td><a href="<?php echo base_url('upload/kalibrasi/file_lampiran/' . $data->lampiran) ?>"> <?php echo $data->lampiran ?> </a></td>
                                                <td><?php echo $data->quality_pass ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <h4 class="card-title"><i class='bx bx-check'></i> Riwayat Pemeliharaan </h4>
                            <hr>
                            <div class="table-responsive">
                                <table id="pemeliharaan" class="table table-bordered display no-wrap" style="width:100%">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal Pemeliharaan</th>
                                            <th>Petugas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($pemeliharaan as $data) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?php echo $data->tgl_pemeliharaan ?></td>
                                                <td><?php echo $data->petugas ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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