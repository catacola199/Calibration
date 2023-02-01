<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="<?= base_url('dashboard') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <!-- User Pengguna-->
                <?php if ($this->fungsi->user_login()->id_role == "3") { ?>
                    <li class="list-divider"></li>
                    <li class="nav-small-cap">
                        <span class="hide-menu">Applications</span>
                    </li>
                   
                    <li class="sidebar-item">
                        <a href="<?= base_url('user_kr') ?>" class="sidebar-link">
                            <i class='bx bx-receipt'></i> <span class="hide-menu">Perbaikan </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?= base_url('qrcode') ?>" class="sidebar-link">
                            <i class='bx bx-qr'></i> <span class="hide-menu">QRcode </span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?= base_url('scans') ?>" class="sidebar-link">
                            <i class='bx bx-qr-scan'></i> <span class="hide-menu">Scan </span>
                        </a>
                    </li>
                <?php } ?>
             


                <!-- <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="<?= base_url('profiles') ?>" aria-expanded="false">
                        <i data-feather="user" class="feather-icon"></i>
                        <span class="hide-menu"> Profile</span>
                    </a>
                </li> -->
                <!-- User SuperAdmin-->
                <?php if ($this->fungsi->user_login()->id_role == "1") { ?>
                    <li class="list-divider"></li>
                    <li class="nav-small-cap">
                        <span class="hide-menu">Admin</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow btn btn-outline-light" href="javascript:void(0)" aria-expanded="false" style="border:0; border-radius: 0 50px 50px 0;"><i data-feather="archive" class="feather-icon"></i>
                            <span class="hide-menu">Master Data</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level base-level-line">
                        
                            <li class="sidebar-item">
                                <a href="<?= base_url('users') ?>" class="sidebar-link">
                                    <i class='bx bx-user'></i> <span class="hide-menu">Pengguna </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?= base_url('alatKalibrasis') ?>" class="sidebar-link">
                                    <i class='bx bx-grid-alt'></i> <span class="hide-menu">Alat </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?= base_url('kalibrasis') ?>" class="sidebar-link">
                                    <i class='bx bx-file'></i> <span class="hide-menu">Kalibrasi </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?= base_url('pemeliharaankalibrasis') ?>" class="sidebar-link">
                                    <i class='bx bx-wrench'></i> <span class="hide-menu">Pemeliharaan </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?= base_url('perbaikans') ?>" class="sidebar-link">
                                    <i class='bx bx-receipt'></i> <span class="hide-menu">Perbaikan </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?= base_url('qrcode') ?>" class="sidebar-link">
                                    <i class='bx bx-qr'></i> <span class="hide-menu">QRcode </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?= base_url('scans') ?>" class="sidebar-link">
                                    <i class='bx bx-qr-scan'></i> <span class="hide-menu">Scan </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <!-- User Admin-->
                <?php if ($this->fungsi->user_login()->id_role == "2") { ?>
                    <li class="list-divider"></li>
                    <li class="nav-small-cap">
                        <span class="hide-menu">Admin</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow btn btn-outline-light" href="javascript:void(0)" aria-expanded="false" style="border:0; border-radius: 0 50px 50px 0;"><i data-feather="archive" class="feather-icon"></i>
                            <span class="hide-menu">Master Data</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level base-level-line">
                            <li class="sidebar-item">
                                <a href="<?= base_url('user_kr') ?>" class="sidebar-link">
                                    <i class='bx bx-receipt'></i> <span class="hide-menu">Perbaikan </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?= base_url('qrcode') ?>" class="sidebar-link">
                                    <i class='bx bx-qr'></i> <span class="hide-menu">QRcode </span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?= base_url('scans') ?>" class="sidebar-link">
                                    <i class='bx bx-qr-scan'></i> <span class="hide-menu">Scan </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>