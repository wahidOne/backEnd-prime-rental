<nav class="navbar navbar-expand-md navbar-<?= $themeNavbar; ?> bg-transparent px-0">
    <div class="container-fluid">
        <div class="menu-btn menu-btn-<?= $themeHamburger ?>"><span class="menu-btn__burger"></span></div><a class="navbar-brand font-lg-24px ml-md-4" href="#">PrimeRental</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto d-flex w-100 font-montserrat text-primary   ">
                <a class="nav-item px-lg-2 nav-link ml-auto text-<?= $linkColor; ?>   " href="<?= site_url('beranda') ?>">Beranda </a>
                <a class="nav-item px-lg-2 nav-link text-<?= $linkColor;  ?> <?= $this->uri->segment(1) == 'mobil-kami' ? 'active border-bottom border-primary ' : ''  ?>  " href="<?= site_url('mobil-kami') ?>">Mobil Kami</a>
                <a class="nav-item px-lg-2 mr-2 nav-link text-<?= $linkColor;  ?> <?= $this->uri->segment(1) == 'tentang-kami' ? 'active  border-bottom border-primary ' : ''  ?> " href="<?= site_url('tentang-kami') ?>">Tentang </a>
                <a class="nav-item pl-lg-2 nav-link border-left text-<?= $linkColor;  ?> " href="#">
                    <i class="fas fa-search"></i>
                </a>

                <?php if ($this->session->userdata('primerental_user')) : ?>
                    <?php if ($user) : ?>
                        <a href="<?= site_url('profile') ?>" class=" my-auto ml-lg-2">
                            <img height="40" class="  rounded rounded-circle " src="<?= base_url('assets/uploads/ava/') . $user['user_photo']; ?>" alt="">
                        </a>
                    <?php endif; ?>
                <?php else :  ?>
                    <li class="nav-item dropdown my-auto ml-2 ">
                        <a href="# " class="profile--toggle" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user "></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu dropdown-menu-right bg-secondary profileDropDown text-primary" aria-labelledby="profileDropdown">
                            <div class=" dropdown-menu-nav nav text-primary ">
                                <a href="<?= base_url('autentifikasi/login') ?>" class="text-primary nav-link ">
                                    <i class=" fad fa-sign-in-alt fa-fw mr-1 ">
                                    </i>
                                    <span>Masuk</span>
                                </a>
                                <a href="<?= base_url('autentifikasi/registrasi') ?>" class="nav-link text-primary">
                                    <i class="fa-fw fad fa-user-plus"></i>
                                    <span class=" ml-1 ">Registrasi</span></a>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>

            </div>
        </div>
    </div>
</nav>