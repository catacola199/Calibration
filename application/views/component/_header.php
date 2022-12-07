<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
                <!-- Logo icon -->
                <a href="<?= base_url('dashboard') ?>">
                    <b class="logo-icon">
                        <!-- Dark Logo icon -->
                        <img src="<?= base_url('src') ?>/assets/images/sidic2.png" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="<?= base_url('src') ?>/assets/images/sidic2.png" alt="homepage" class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                        <!-- dark Logo text -->
                        <img src="<?= base_url('src') ?>/assets/images/sidic1.png" alt="homepage" class="dark-logo" />
                        <!-- Light Logo text -->
                        <img src="<?= base_url('src') ?>/assets/images/sidic1.png" class="light-logo" alt="homepage" />
                    </span>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav float-right ml-auto">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->

                <li class="nav-item d-none d-md-block" id="fullscreen">
                    <a class="nav-link" href="javascript:void(0)" onclick="document.documentElement.requestFullscreen()">
                        <span><i data-feather="maximize" class="feather-icon"></i></span>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block" id="exit-fullscreen">
                    <a class="nav-link" href="javascript:void(0)" onclick="document.exitFullscreen()" style="display:none;">
                        <span><i data-feather="minimize" class="feather-icon"></i></span>
                    </a>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <?php
                $query = $this->db->query("SELECT alat_kalibrasi.nama_alat,t_kalibrasi.tgl_kalibrasi FROM alat_kalibrasi LEFT JOIN t_kalibrasi ON alat_kalibrasi.id_alat = t_kalibrasi.id_alat WHERE 
                MONTH(DATE_SUB(DATE_ADD(STR_TO_DATE(`tgl_kalibrasi`,'%d/%m/%Y'),INTERVAL 1 YEAR), INTERVAL 1 MONTH)) = MONTH(CURRENT_DATE()) AND 
                YEAR(DATE_SUB(DATE_ADD(STR_TO_DATE(`tgl_kalibrasi`,'%d/%m/%Y'),INTERVAL 1 YEAR), INTERVAL 1 MONTH)) = YEAR(CURRENT_DATE())"); //month(CURRENT_DATE())
                // $rw = $query->result()->num_row();
                ?>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle position-relative" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!-- <button type="button" class="btn position-relative"> -->
                        <i data-feather="bell" class="feather-icon"></i>
                        <span class="position-absolute translate-middle badge rounded-pill bg-danger" style="top:25px; right:-20px">
                            <?= $query->num_rows(); ?>
                        <span class="visually-hidden">unread messages</span>
                        </span>
                    <!-- </button>     -->
                    <!-- <i class="fas fa-bell fa-fw text-light"></i>
                        <span class="badge badge-danger"><?= $query->num_rows(); ?></span> -->
                    </a>
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in " aria-labelledby="messagesDropdown" style="width: 400px;">
                        <h6 class="dropdown-header">
                            Notification Center
                        </h6>

                        <?php foreach ($query->result() as $row) : ?>
                            <a class="dropdown-item align-items-center" href="#">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="<?= base_url("assets/sidic2.png")?>" alt=".." class="img-fluid">
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate"><?= $row->nama_alat ?></div>
                                        <div class="small text-black-50">Kalibrasi kembali pada tanggal <?= $row->tgl_kalibrasi ?></div>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                        <a class="dropdown-item text-center small text-black-50" href="#">Read More Notification</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php if (file_exists(FCPATH . 'upload/pengguna/' . $this->fungsi->user_login()->foto_pengguna) != 1) {
                                        echo base_url('upload/pengguna/default.png');
                                    } else {
                                        echo base_url('upload/pengguna/') . $this->fungsi->user_login()->foto_pengguna;
                                    } ?>" alt="user" class="rounded-circle pp" alt="Foto" width="45" height="45">
                        <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark"><?= $this->fungsi->user_login()->nama_pengguna ?></span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="<?= base_url('profiles') ?>"><i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                            My Profile</a>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item" href="<?= base_url('login/logout') ?>"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                            Logout</a>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>