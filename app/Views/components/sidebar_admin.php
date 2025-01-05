<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <!-- <label>Navigation</label> -->
                </li>
                <li class="nav-item">
                    <a href="/admin" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse"><span></span></a>
        <a class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <!-- <img src="/assets/dist/assets/images/logo.png" alt="" class="logo">
                <img src="/assets/dist/assets/images/logo-icon.png" alt="" class="logo-thumb"> -->
            <h3 class="text-white">SIPIA</h3>
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown drp-user">
                    <a href="/assets/#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <!-- <img src="/assets/dist/assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image"> -->
                            <span><?= session()->get('nama'); ?> | <?= session()->get('level'); ?></span>
                        </div>
                        <ul class="pro-body">
                            <li><a href="!#" class="dropdown-item" data-toggle="modal" data-target="#modalsetprofil"><i class="feather icon-settings"></i> Ubah Profil</a></li>
                            <li><a href="/logout" class="dropdown-item"><i class="feather icon-log-out"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
<!-- [ Header ] end -->
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h3 class="m-b-10 text-white"><?= $title; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->