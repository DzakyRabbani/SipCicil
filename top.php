<div class="navbar-inner">
    <div class="container-fluid">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <a class="brand" href="index.php?modul=home"> <img src="img/CBR150R.jpg" /> <span>SISTEM PENJUALAN MOTOR<br/> PENJUALAN MASAKAN </span></a>

        <!-- theme selector ends -->

        <!-- user dropdown starts -->
        <div class="btn-group pull-right" >
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="icon-user"></i><span class="hidden-phone"><?php echo ucfirst($_SESSION['hak_akses']);?></span>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Profile</a></li>
                <li class="divider"></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <!-- user dropdown ends -->
    </div>
</div>
