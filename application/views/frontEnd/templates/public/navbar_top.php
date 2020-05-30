<nav class="navbar navbar-expand-md navbar-dark bg-transparent px-0">
    <div class="container-fluid">
        <div class="menu-btn menu-btn-light"><span class="menu-btn__burger"></span></div><a class="navbar-brand font-lg-24px ml-md-4" href="#">PrimeRental</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto d-flex w-100 font-montserrat">
                <a class="nav-item px-lg-2 nav-link ml-auto text-primary" href="<?= site_url('beranda') ?>">Beranda </a>
                <a class="nav-item px-lg-2 nav-link text-primary" href="<?= site_url('mobil-kami') ?>">Mobil Kami</a>
                <a class="nav-item px-lg-2 nav-link text-primary" href="<?= site_url('tentang-kami') ?>">Tentang </a>
                <a class="nav-item pl-lg-2 nav-link border-left border-primary text-primary" href="#">
                    <i class="fas fa-search"></i>
                </a>

                <?php if ($this->session->userdata('primerental_user')) : ?>
                    <?php if ($user) : ?>
                        <a href="" class=" my-auto ml-lg-2">
                            <img height="40" src="<?= base_url('assets/uploads/ava/') . $user['user_photo']; ?>" alt="">
                        </a>
                    <?php endif; ?>
                <?php else :  ?>
                    <a class="nav-item ml-lg-1 nav-link text-primary  font-italic  " style="text-decoration: underline" href="<?= base_url('autentifikasi/login') ?>">Login</a>
                    <a class="nav-item ml-lg-2 px-3  btn btn-primary " href="<?= base_url('autentifikasi/login') ?>">Registrasi</a>
                <?php endif; ?>
                <!-- <a class="nav-item ml-lg-1 nav-link text-primary  font-italic  " style="text-decoration: underline" href="#">Login</a>
                <a class="nav-item ml-lg-2 btn btn-primary " href="#">Registrasi</a> -->
            </div>
        </div>
    </div>
</nav>