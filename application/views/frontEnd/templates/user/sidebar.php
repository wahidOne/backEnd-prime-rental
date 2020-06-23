<div class="dashboard--sidebar pt-2 pb-3">
    <a class="sidebar--toggle mb-2 " href="javascript:void(0)">
        <i class="fad  fa-toggle-on "></i>
    </a>
    <div class="sidebar--account mx-auto px-3">
        <div class="sidebar--ava my-auto"><img class="" src="<?= base_url('assets/uploads/ava/') . $user['user_photo']; ?>" alt=""></div>
        <div class="sidebar--account--text my-auto">
            <p class="font-weight-bold font-montserrat font-18px text-dark"><?= $user['user_name'] ?></p>
            <p class="font-13px text-black-50"><?= $user['user_email'] ?></p>
        </div>
    </div><br>
    <ul class="nav sidebar--nav flex-column mt-4 px-2">
        <li class="nav-item"><a class="nav-link  " href="<?= site_url('beranda') ?>">
                <i class="fad fa-fw fa-home-alt  "></i> <span class="ml-md-1">Beranda</span></a></li>
        <li class="nav-item"><a class="nav-link <?= $this->uri->segment(1) == 'profile' ? "active" : '' ?> " href=""><i class="fad fa-fw fa-id-card-alt"></i> <span class="ml-md-1">Profil</span></a></li>
        <li class="nav-item"><a class="nav-link <?= $this->uri->segment(1) == 'transaksi' ? "active" : '' ?> " href="list-transactions.html"><i class="fad fa-fw fa-handshake"></i> <span class="ml-md-1">Transaksi</span></a></li>
        <hr class="sidebar--devider mt-2 mb-1">
        <li class="nav-item"><a class="nav-link" href="<?= site_url('autentifikasi/logout') ?>"><i class="fad fa-fw fa-sign-out"></i> <span class="ml-md-1">Logout</span></a></li>
    </ul>
    <div class="sidebar--logo pl-3"><a class="text-decoration-none font-30px" href="<?= site_url('beranda') ?>">PrimeRental</a></div>
</div>