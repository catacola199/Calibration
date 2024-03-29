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
                                        <i class="fas fa-angle-double-right"></i> Master Alat
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daftar Alat</h4>
                                <hr>
                                <h6 class="card-subtitle">
                                    <div class="btn-list">
                                        <a href="#" id="refresh_tabel" class="btn btn-outline-primary float-right"><i class="fas fa-redo-alt" data-toggle="tooltip" data-placement="bottom" title="refresh"></i> </a>
                                        <button class="btn btn-outline-success float-right" data-toggle="modal" data-target="#success-header-modal"><i class="fas fa-user-plus" data-toggle="tooltip" data-placement="bottom" title="Add"></i></button>
                                    </div>
                                </h6>
                                <div class="table-responsive">
                                    <table id="alat_kali" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Merk</th>
                                                <th>Tipe</th>
                                                <th>No Seri</th>
                                                <th>Lokasi</th>
                                                <th>Tanggal Pengadaan</th>
                                                <th>Tanggal Kalibrasi</th>
                                                <th>lampiran</th>
                                                <th>Quality Pass</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($alat as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?php echo $data->nama_alat ?></td>
                                                    <td><?php echo $data->merk_alat ?></td>
                                                    <td><?php echo $data->tipe_alat ?></td>
                                                    <td><?php echo $data->noseri_alat ?></td>
                                                    <td><?php echo $data->lokasi_alat ?></td>
                                                    <td><?php echo $data->tglpengadaan_alat ?></td>
                                                    <td><?php if (null == $data->tanggal) : ?>
                                                           
                                                        <?php else : ?>
                                                            <?php $date = date_create($data->tanggal); echo date_format($date, "d/m/Y"); ?>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                    <?php if (null == $data->lampiran) : ?>
                                                           
                                                           <?php else : ?>
                                                            <a class="btn btn-sm btn-outline-primary" href="<?php echo base_url('upload/kalibrasi/file_lampiran/' . $data->lampiran) ?>"> Download Lampiran </a>
                                                           <?php endif; ?>
                                                    </td>
                                                    <td><?php echo $data->quality_pass ?></td>
                                                    <td>
                                                        <a href="#!" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#edit-<?= $data->id_alat ?>">
                                                            <i class="fas fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></i>
                                                        </a>
                                                        <a onclick="deleteConfirm('<?php echo site_url('AlatKalibrasi/delete_alatkalibrasi/' . $data->id_alat) ?>')" href="#!" class="btn btn-sm btn-outline-danger">
                                                            <i class="icon-trash" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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

    <!-- Form Add Modal -->
    <div id="success-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="success-header-modalLabel">Form Tambah Alat
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form action="<?php echo base_url('AlatKalibrasi/save_alatkalibrasi') ?>" method="post" enctype="multipart/form-data" role="form" class="pl-3 pr-3">

                        <div class="form-group">
                            <label for="nama_alat"><strong>Nama Alat</strong></label>
                            <input type="text" class="form-control form-control-user" name="nama_alat" id="nama_alat" placeholder="Nama Alat" required>
                        </div>
                        <div class="form-group">
                            <label for="merk_alat"><strong>Merk Alat</strong></label>
                            <input type="text" class="form-control form-control-user" name="merk_alat" id="merk_alat" placeholder="Merk Alat" required>
                        </div>
                        <div class="form-group">
                            <label for="tipe_alat"><strong>Tipe Alat</strong></label>
                            <input type="text" class="form-control form-control-user" name="tipe_alat" id="tipe_alat" placeholder="Tipe Alat" required>
                        </div>
                        <div class="form-group">
                            <label for="noseri_alat"><strong>No Seri Alat</strong></label>
                            <input type="text" class="form-control form-control-user" name="noseri_alat" id="noseri_alat" placeholder="No Seri Alat" required>
                        </div>
                        <div class="form-group">
                            <label for="lokasi_alat"><strong>Lokasi</strong></label>
                            <input type="text" class="form-control form-control-user" name="lokasi_alat" id="lokasi_alat" placeholder="Lokasi Alat" required>
                        </div>

                        <label for="lokasi_alat"><strong>Tanggal Pengadaan</strong></label>
                        <div class="input-group date" id="pengadaan_alat">
                            <input type="text" class="form-control" name="tglpengadaan_alat" id="tglpengadaan_alat" />
                            <span class="input-group-append">
                                <span class="input-group-text bg-light d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                        <!-- End Form -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal Edit -->
    <?php foreach ($alat_kalibrasi as $data) : ?>
        <div class="modal fade" id="edit-<?= $data->id_alat ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Alat</h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="<?php echo base_url('AlatKalibrasi/update_alatkalibrasi') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3">

                            <input type="text" hidden name="id_alat" id="id_alat" value="<?= $data->id_alat ?>">

                            <div class="form-group">
                                <label for="nama_alat"><strong>Nama Alat</strong></label>
                                <input type="text" class="form-control form-control-user" name="nama_alat" id="nama_alat" placeholder="Nama Alat" required value="<?= $data->nama_alat ?>">
                            </div>
                            <div class="form-group">
                                <label for="merk_alat"><strong>Merk Alat</strong></label>
                                <input type="text" class="form-control form-control-user" name="merk_alat" id="merk_alat" placeholder="Merk Alat" required value="<?= $data->merk_alat ?>">
                            </div>
                            <div class="form-group">
                                <label for="tipe_alat"><strong>Tipe Alat</strong></label>
                                <input type="text" class="form-control form-control-user" name="tipe_alat" id="tipe_alat" placeholder="Tipe Alat" required value="<?= $data->tipe_alat ?>">
                            </div>
                            <div class="form-group">
                                <label for="noseri_alat"><strong>No Seri Alat</strong></label>
                                <input type="text" class="form-control form-control-user" name="noseri_alat" id="noseri_alat" placeholder="No Seri Alat" required value="<?= $data->noseri_alat ?>">
                            </div>
                            <div class="form-group">
                                <label for="lokasi_alat"><strong>Lokasi</strong></label>
                                <input type="text" class="form-control form-control-user" name="lokasi_alat" id="lokasi_alat" placeholder="Lokasi Alat" required value="<?= $data->lokasi_alat ?>">
                            </div>

                            <label for="lokasi_alat"><strong>Tanggal Pengadaan</strong></label>
                            <div class="input-group date" id="pengadaan_alat">
                                <input type="text" class="form-control" name="tglpengadaan_alat" id="tglpengadaan_alat" value="<?= $data->tglpengadaan_alat ?>" />
                                <span class="input-group-append">
                                    <span class="input-group-text bg-light d-block">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo site_url('alatKalibrasis') ?>" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Modal Edit End -->

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
        
    </script>