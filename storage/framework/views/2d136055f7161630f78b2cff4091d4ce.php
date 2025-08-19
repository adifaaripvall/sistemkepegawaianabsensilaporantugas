<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/backoffice/dashboard" class="brand-link">
        <img src="<?php echo e(asset('images/tekmt.png')); ?>"
                alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3"
                style="opacity: .8">
        <span class="brand-text" style="text-transform: uppercase">
            <b>Absensi</b>
        </span>
    </a>
        
            
            
        

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 mb-3 text-center">

            <div class="info">
                <p style="text-transform: uppercase">
                    <b><?php echo e(auth()->user()->role->name); ?></b>
                </p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                
                <?php if(auth()->user()->role_id == 1): ?>
                
                    <li class="nav-item">
                        <a href="/backoffice/dashboard"
                            class="nav-link <?php echo e(request()->is('backoffice/dashboard', 'backoffice/dashboard/*') ? 'active' : ''); ?>">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                Beranda
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/office"
                            class="nav-link <?php echo e(request()->is('backoffice/office', 'backoffice/office/*') ? 'active' : ''); ?>">
                            <i class="nav-icon fa fa-building"></i>
                            <p>
                                Kantor
                            </p>
                        </a>
                    </li>
                    
                    

                    <!-- <li class="nav-item">
                        <a href="/backoffice/absent"
                            class="nav-link <?php echo e(request()->is('backoffice/absent', 'backoffice/absent/*') ? 'active' : ''); ?>">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                Absensi
                            </p>
                        </a>
                    </li> -->

                    <li class="nav-item">
                        <a href="/backoffice/leave-quota"
                            class="nav-link <?php echo e(request()->is('backoffice/leave-quota', 'backoffice/leave-quota/*') ? 'active' : ''); ?>">
                            <i class="nav-icon fa fa-calendar-check"></i>
                            <p>
                                Jatah Cuti
                            </p>
                        </a>
                    </li>

                    <!-- Menu Rekapitulasi Absensi -->
                    <!-- <li class="nav-item has-treeview <?php echo e(request()->is('attendance/summary*') ? 'menu-open' : ''); ?>">
                        <a href="#" class="nav-link <?php echo e(request()->is('attendance/summary*') ? 'active' : ''); ?>">
                            <i class="nav-icon fas fa-chart-bar"></i>
                            <p>
                                Rekapitulasi Absensi
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('attendance.summary.index')); ?>"
                                    class="nav-link <?php echo e(request()->is('attendance/summary') ? 'active' : ''); ?>">
                                    <i class="fa fa-circle fa-regular nav-icon"></i>
                                    <p>Data Rekapitulasi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('attendance.summary.report')); ?>"
                                    class="nav-link <?php echo e(request()->is('attendance/summary/report') ? 'active' : ''); ?>">
                                    <i class="fa fa-circle fa-regular nav-icon"></i>
                                    <p>Laporan</p>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="nav-item">
                        <a href="<?php echo e(route('attendance.summary.index')); ?>"
                            class="nav-link <?php echo e(request()->is('backoffice/attendance/summary','backoffice/attendance/summary/report') ? 'active' : ''); ?>

">
                            <!-- <i class="nav-icon fa fa-calendar-check"></i> -->
                            <i class="nav-icon fas fa-chart-bar"></i>

                            <p>
                            Rekapitulasi Absensi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/user-data/user"
                            class="nav-link <?php echo e(request()->is('backoffice/user-data/user', 'backoffice/user-data/user/*') ? 'active' : ''); ?>

">
                            <!-- <i class="nav-icon fa fa-calendar-check"></i> -->
                            <i class="nav-icon fas fa-chalkboard-user"></i>

                            <p>
                            Data Pengguna
                            </p>
                        </a>
                    </li>
                    <!-- <li class="nav-item has-treeview <?php echo e(request()->is('backoffice/user-data/*') ? 'menu-open' : ''); ?>">
                        <a href="#" class="nav-link <?php echo e(request()->is('backoffice/user-data/*') ? 'active' : ''); ?>">
                            <i class="nav-icon fas fa-chalkboard-user"></i>
                            <p>
                                Data Pengguna
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/backoffice/user-data/role"
                                    class="nav-link <?php echo e(request()->is('backoffice/user-data/role', 'backoffice/user-data/role/*') ? 'active' : ''); ?>">
                                    <i class="fa fa-circle fa-regular nav-icon"></i>
                                    <p>Peran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/backoffice/user-data/user"
                                    class="nav-link <?php echo e(request()->is('backoffice/user-data/user', 'backoffice/user-data/user/*') ? 'active' : ''); ?>">
                                    <i class="fa fa-circle fa-regular nav-icon"></i>
                                    <p>Pengguna</p>
                                </a>
                            </li>
                            
                        </ul>
                    </li> -->

                    

                    
                    
                <?php endif; ?>

                <?php if(auth()->user()->role_id == 2): ?>
                    <li class="nav-item">
                        <a href="/backoffice/absen/create"
                            class="nav-link <?php echo e(request()->is('backoffice/absen/create') ? 'active' : ''); ?>">
                            <i class="nav-icon fa fa-file-signature"></i>
                            <p>
                                Absen
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/absent/self"
                            class="nav-link <?php echo e(request()->is('backoffice/absent/self', 'backoffice/absent/*') ? 'active' : ''); ?>">
                            <i class="nav-icon fa fa-tasks"></i>
                            <p>
                                Absensi Saya
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="nav-item has-treeview <?php echo e(request()->is('backoffice/submission/*') ? 'menu-open' : ''); ?>">
                    <a href="#" class="nav-link <?php echo e(request()->is('backoffice/submission/*') ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Pengajuan Absensi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/backoffice/submission/cuti"
                                class="nav-link <?php echo e(request()->is('backoffice/submission/cuti', 'backoffice/submission/cuti/*') ? 'active' : ''); ?>">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>Cuti</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/backoffice/submission/izin-sakit"
                                class="nav-link <?php echo e(request()->is('backoffice/submission/izin-sakit', 'backoffice/submission/izin-sakit/*') ? 'active' : ''); ?>">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>Izin / Sakit</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/backoffice/task"
                        class="nav-link <?php echo e(request()->is('backoffice/task') ? 'active' : ''); ?>">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>
                            Task Tugas
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/backoffice/meet"
                        class="nav-link <?php echo e(request()->is('backoffice/meet', 'backoffice/meet/*') ? 'active' : ''); ?>">
                        <i class="nav-icon fa-brands fa-meetup"></i>
                        <p>
                            Jadwal Meeting
                        </p>
                    </a>
                </li>

                

            </ul>
        </nav>
        
    </div>
    
</aside>
<?php /**PATH D:\PROYEK AKHIR\PA-Adigra\resources\views/backoffice/layout/sidebar.blade.php ENDPATH**/ ?>