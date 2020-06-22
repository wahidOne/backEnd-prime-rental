<nav class="navbar navbar-expand-md navbar-<?= $themeNavbar; ?> bg-transparent px-0">
    <div class="container-fluid">
        <div class="menu-btn menu-btn-<?= $themeHamburger ?>"><span class="menu-btn__burger"></span></div><a class="navbar-brand font-lg-24px ml-md-4" href="#">PrimeRental</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto d-flex w-100 font-montserrat text-primary   ">
                <a class="nav-item px-lg-2 nav-link ml-auto text-<?= $linkColor;  ?>  " href="<?= site_url('beranda') ?>">Beranda </a>
                <a class="nav-item px-lg-2 nav-link text-<?= $linkColor;  ?> " href="<?= site_url('mobil-kami') ?>">Mobil Kami</a>
                <a class="nav-item px-lg-2 nav-link text-<?= $linkColor;  ?> " href="<?= site_url('tentang-kami') ?>">Tentang </a>
                <a class="nav-item pl-lg-2 nav-link border-left border-<?= $linkColor;  ?> text-<?= $linkColor;  ?> " href="#">
                    <i class="fas fa-search"></i>
                </a>

                <?php if ($this->session->userdata('primerental_user')) : ?>
                    <?php if ($user) : ?>
                        <a href="" class=" my-auto ml-lg-2">
                            <img height="40" class="  rounded rounded-circle " src="<?= base_url('assets/uploads/ava/') . $user['user_photo']; ?>" alt="">
                        </a>
                    <?php endif; ?>
                <?php else :  ?>
                    <!-- <a class="nav-item ml-lg-1 nav-link   font-italic  " style="text-decoration: underline" href="<?= base_url('autentifikasi/login') ?>">Login</a>
                    <a class="nav-item ml-lg-2 px-3  btn btn-primary " href="<?= base_url('autentifikasi/login') ?>">Registrasi</a> -->
                    <li class="nav-item dropdown pl-2 ">
                        <a href="# " class="nav-link text-primary font-19px " data-toggle="dropdown" id="btnProfileDropDown">
                            <i class="fas fa-user "></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right bg-secondary text-primary profileDropDown ">
                            <div class=" dropdown-menu-nav nav text-primary ">
                                <a href="#" class="nav-link text-primary"> <i class=" fad fa-sign-in-alt fa-fw mr-1 ">
                                    </i>
                                    <span>Masuk</span></a>
                                <a href="#" class="nav-link text-primary">
                                    <i class="fa-fw fad fa-user-plus"></i>
                                    <span class=" ml-1 ">Registrasi</span></a>
                            </div>

                        </div>
                    </li>
                <?php endif; ?>
                <!-- <a class="nav-item ml-lg-1 nav-link text-primary  font-italic  " style="text-decoration: underline" href="#">Login</a>
                <a class="nav-item ml-lg-2 btn btn-primary " href="#">Registrasi</a> -->
            </div>
        </div>
    </div>
</nav>