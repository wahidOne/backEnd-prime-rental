<aside class="sidebar">
    <div class="container px-4 pt-3">
        <div class="menu-btn menu-btn-light ml-auto"><span class="menu-btn__burger"></span></div>
        <div class="row pt-3">
            <?php if ($this->session->userdata('primerental_user')) : ?>
                <?php if ($user) : ?>
                    <div class="col px-0">
                        <img class="img-fluid rounded-circle shadow-sm" src="<?= base_url('assets/uploads/ava/') . $user['user_photo'] ?>" alt=""></div>
                    <div class="col my-auto">
                        <h4 class="font-weight-bold text-light"><?= $user['user_name']; ?></h4><small class="text-primary-50"><?= $user['user_email']; ?></small>
                    </div>
                <?php endif; ?>
            <?php else :  ?>
                <div class="col d-flex justify-content-center">
                    <a href="<?= base_url('autentifikasi/registrasi') ?>" class="btn btn-sm  btn-primary  ">Registrasi</a>
                    <a href="<?= base_url('autentifikasi/login') ?>" class="btn btn-sm btn-outline-primary ml-2">Login</a>
                </div>

            <?php endif; ?>
        </div>

        <nav class="nav d-flex flex-column px-0 mt-2 mb-3">
            <?php if ($this->session->userdata('primerental_user')) : ?>
                <?php if ($user) : ?>
                    <hr class="w-100 bg-secondary-70">
                    <a class="flex-sm-fill nav-link" href="<?= site_url('profile') ?>"><i class="fal fa-user mr-1 fa-fw"></i><span>Akun
                            Saya</span></a>
                    <a class="flex-sm-fill nav-link" href="#"><i class="fal fa-handshake mr-1 fa-fw"></i><span>Transaksi</span></a>
                <?php endif; ?>
            <?php endif; ?>

            <!-- </nav>
        <hr class="w-100 bg-secondary-70">
        <nav class="nav d-flex flex-column px-0 mt-2 mb-3"> -->
            <hr class="w-100 bg-secondary-70">
            <?php if ($this->uri->segment(1) == "autentifikasi") : ?>
                <a class="flex-sm-fill nav-link" href="<?= base_url('beranda') ?>">
                    <i class="fal fa-fw mr-1 fa-home "></i>
                    <span>Beranda</span>
                </a>
            <?php endif; ?>
            <a class="flex-sm-fill nav-link" href="#">
                <i class="fal fa-fw mr-1 fa-info-square "></i>
                <span>Syarat & Ketentuan</span>
            </a>
            <a class="flex-sm-fill nav-link" href="#">
                <i class="fal fa-cash-register mr-1 fa-fw"></i>
                <span>Sewa &
                    Pembayaran</span>
            </a>
            <a class="flex-sm-fill nav-link" href="<?= site_url('layanan') ?>">
                <i class="fal fa-tools  mr-1 fa-fw"></i>
                <span>Layanan Kami</span>
            </a>
            <a class="flex-sm-fill nav-link" href="<?= site_url('kontak') ?>"><i class="fab fa-teamspeak mr-1 fa-fw"></i>
                <span>Kontak</span>
            </a>

            <?php if ($this->session->userdata('primerental_user')) : ?>
                <?php if ($user) : ?>
                    <hr class="w-100 bg-secondary-70">

                    <a class="flex-sm-fill nav-link" href="<?= base_url('autentifikasi/logout') ?>"><i class="fad fa-fw  mr-1 fa-sign-out-alt "></i>
                        <span>Logout</span>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        </nav>

    </div>
</aside>