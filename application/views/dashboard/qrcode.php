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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daftar QR Code</h4>
                                <hr>
                                <h6 class="card-subtitle">
                                    <div class="btn-list">
                                        <a href="#" id="refresh_tabel" class="btn btn-outline-primary float-right"><i class="fas fa-redo-alt" data-toggle="tooltip" data-placement="bottom" title="refresh"></i> </a>
                                        <button class="btn btn-outline-success float-right" data-toggle="modal" data-target="#success-header-modal"><i class="fas fa-user-plus" data-toggle="tooltip" data-placement="bottom" title="Add"></i></button>
                                    </div>
                                </h6>
                                <div class="table-responsive">
                                    <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Alat</th>
                                                <th>Tanggal Pengadaan</th>
                                                <th>Qrcode</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($qr as $data) : ?>
                                                <tr style="text-align:center;">
                                                    <td><?= $i++ ?></td>
                                                    <td><?php echo $data->nama_alat ?></td>
                                                    <td><?php echo $data->tgl_buat ?></td>
                                                    <td><img src="<?php echo base_url($data->file_qr) ?>" alt="Foto" width="50" /></td>

                                                    <td>
                                                        <a href="<?php echo site_url('C_Qrcode/download_qrcode/' . $data->id_qr) ?>" class="btn btn-small btn-success" data-toggle="tooltip" data-placement="bottom" title="Download">
                                                            <i class="feather-icon" data-feather="download"></i>
                                                        </a>
                                                        <a onclick="deleteConfirm('<?php echo site_url('C_Qrcode/delete_Qrcode/' . $data->id_qr) ?>')" href="#!" class="btn btn-sm btn-outline-danger">
                                                            <i class="feather-icon" data-feather="trash" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i>
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
                    <h4 class="modal-title" id="success-header-modalLabel">Form QRcode
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form action="<?php echo base_url('C_Qrcode/simpan_Qrcode') ?>" method="post" enctype="multipart/form-data" role="form" class="pl-3 pr-3">
                        <div class="form-group">
                            <label for="nama_alat"><strong>Lokasi Alat</strong></label>
                            <select class="form-control" name="lokasi_alat" id="lokasi_alat">
                                <option selected disabled value="">Choose...</option>
                                <?php foreach ($lokasi as $l) { ?>
                                    <option value="<?php echo $l['lokasi_alat']; ?>"><?php echo $l['lokasi_alat']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nama_alat"><strong>Nama Alat</strong></label>
                            <select class="form-control" name="id_alat" id="id_alat">
                                <option selected disabled value="">Choose...</option>
                                <?php foreach ($alat as $l) { ?>
                                    <!-- <option value="<?php echo $l['id_alat']; ?>"><?php echo $l['nama_alat'] . " - " . $l['noseri_alat'] . " - " . $l['lokasi_alat']; ?> </option> -->
                                <?php } ?>
                            </select>
                        </div>
                        <!-- End Form -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Generate</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
        $(document).ready(function() {

            $('#lokasi_alat').change(function() {
                var id = $(this).val();
                console.log(id);
                $.ajax({
                    url: "<?php echo site_url('C_Qrcode/nama_alat'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id_alat + '>' + data[i].nama_alat + ' - ' + data[i].noseri_alat + ' - ' + data[i].lokasi_alat + '</option>';
                        }
                        $('#id_alat').html(html);

                    }
                });
                return false;
            });

        });
    </script>