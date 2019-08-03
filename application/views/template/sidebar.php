<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('AdminControl/dashboard'); ?>">
                <div class="sidebar-brand-icon">
                        <!-- <img class="img-profile rounded-circle " src="<?= base_url('assets/img/profile/') . $user['image']; ?>"> -->
                        <i class="fas fa-fw fa-city"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PDAM Kota Palembang</div>
        </a>
        <?php if ($session['role_id'] == 1) { ?>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Nav Item - Dashboard -->
                <div class="sidebar-heading">
                        Admin
                </div>
                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('AdminControl/dashboard'); ?>">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Dashboard</span></a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('AdminControl/form_tagihan'); ?>">
                                <i class="fas fa-fw fa-envelope"></i>
                                <span>Form Tagihan Pelanggan</span></a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('AdminControl/form_himbauan'); ?>">
                                <i class="fas fa-fw fa-envelope"></i>
                                <span>Form Himbauan Pelanggan</span></a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('AdminControl/keluhan_pelanggan'); ?>">
                                <i class="fas fa-fw fa-envelope"></i>
                                <span>Keluhan Pelanggan</span></a>
                </li>

        <?php } else { ?>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                        User
                </div>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('MemberControl/dashboard'); ?>">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Dashboard</span></a>
                </li>

                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('MemberControl/myprofile'); ?>">
                                <i class="fas fa-fw fa-user"></i>
                                <span>Profile Pelanggan</span>
                        </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('MemberControl/pengaduan_keluhan'); ?>">
                                <i class="fas fa-fw fa-edit"></i>
                                <span>Pengaduan Keluhan</span>
                        </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('MemberControl/rekap_keluhan'); ?>">
                                <i class="fas fa-fw fa-edit"></i>
                                <span>Rekap Keluhan</span>
                        </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('MemberControl/info_tagihan'); ?>">
                                <i class="fas fa-fw fa-edit"></i>
                                <span>Info Tagihan Anda</span>
                        </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('MemberControl/info_himbauan'); ?>">
                                <i class="fas fa-fw fa-bullhorn"></i>
                                <span>Info Himbauan</span>
                        </a>
                </li>

        <?php  } ?>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
                <a class="nav-link" href="<?= base_url('MainControl/logout'); ?>">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Log Out</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
</ul>
<!-- End of Sidebar -->