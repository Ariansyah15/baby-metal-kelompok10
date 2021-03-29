<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand --> 
    <?php 
        $role = $this->session->userdata('role_id'); 

        if ($role == 1){
            echo "<a class='sidebar-brand d-flex align-items-center justify-content-center' href='".base_url('admin')."'>
            <div class='sidebar-brand-icon rotate-n-15'> <i class='babymetal.png'></i> </div>
            <div class='sidebar-brand-text mx-3'>Toko Babymetal</div>
        </a> <!-- Divider -->";
        } else {
            echo "<a class='sidebar-brand d-flex align-items-center justify-content-center' href='".base_url('user')."'>
            <div class='sidebar-brand-icon rotate-n-15'> <i class='fas fa-apple-alt'></i> </div>
            <div class='sidebar-brand-text mx-3'>Toko Babymetal</div>
        </a> <!-- Divider -->";
        }
    ?>
    <hr class="sidebar-divider"> <!-- Looping Menu-->
    <!-- Heading -->
    <?php 
        $role = $this->session->userdata('role_id');

        if ($role == 1){
            echo "<div class='sidebar-heading'> Master Data </div> <!-- Nav Item - Dashboard -->
            <li class='nav-item active'>
                <!-- Nav Item - Dashboard -->
            <li class='nav-item'> <a class='nav-link pb-0' href='" . base_url('product')."'> <i class='fa fa-fw fa book'></i> <span>Data Product</span></a> </li>
            <li class='nav-item'> <a class='nav-link pb-0' href='".base_url('user/anggota')."'> <i class='fa fa-fw fa book'></i> <span>Daftar Anggota</span></a> </li>
            </li> <!-- Divider -->
            <hr class='sidebar-divider'> <!-- Looping Menu-->
            <div class='sidebar-heading'> Transaksi </div> <!-- Nav Item - Dashboard -->
            <li class='nav-item active'>
                <!-- Nav Item - Dashboard -->
            <li class='nav-item'> <a class='nav-link pb-0' href='".base_url('transaksi')."'> <i class='fa fa-fw fa book'></i> <span>List Transaksi</span></a> </li>
            </li> <!-- Divider -->";
        } else {
            echo "<div class='sidebar-heading'> Transaksi </div> <!-- Nav Item - Dashboard -->
            <li class='nav-item active'>
                <!-- Nav Item - Dashboard -->
            <li class='nav-item'> <a class='nav-link pb-0' href='".base_url('transaksi')."'> <i class='fa fa-fw fa book'></i> <span>List Transaksi</span></a> </li>
            </li> <!-- Divider -->";
        }
    ?>
    <hr class="sidebar-divider mt-3"> <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline"> <button class="rounded-circle border-0" id="sidebarToggle"></button> </div>
</ul> <!-- End of Sidebar -- >