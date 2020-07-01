<header class="dashboard--topbar pb-0">
    <nav class="navbar pt-2 h-100">
        <a class="ml-2 sidebar--toggle d-md-none" href="javascript:void(0)">
            <i class="fad fa-2x text-secondary fa-toggle-on"> </i>
        </a>

        <div class="dropdown ml-auto pr-md-2">
            <a class="dashboard-profile--toggle nav-link text-secondary" id="dashboard--profile--toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="javascript:void(0)">
                <i class=" fa fa-user fa-fw "></i>
                <span class=" font-18px  "><?= $user['user_name'] ?></span>
            </a>

            <div aria-labelledby="dashboard--profile--toggle" class="dropdown-menu dropdown-menu-right text-secondary navbar-dropdownProfile border-0 shadow-sm ">
                <div class=" dropdown-menu-nav nav text-primary d-flex justify-content-center ">
                    <div class="d-flex flex-column pt-2 px-2 justify-content-center ">
                        <img width="80" height="80" class=" mx-auto rounded-circle " style="object-fit:cover !important; object-position: center;" src="<?= base_url('assets/uploads/ava/') . $user['user_photo']; ?>" alt="">
                        <div class="pt-2">
                            <p class="text-center  text-black-50 mb-0 "><?= $user['user_email']; ?></p>
                            <p class="text-center font-20px text-dark text-capitalize  "><?= $user['user_name']; ?></p>
                        </div>
                    </div>
                    <div class="dropdown-divider border border-top w-100 "></div>
                    <div class="nav ">
                        <a class="dropdown-item text-secondary " href="test.html">
                            <i class="fa-fa fad fa-user"></i>
                            <span class="ml-1">Profil</span></a>
                        <a class="dropdown-item text-secondary " href="#">
                            <i class="fa-fa fad fa-lock-open "></i>
                            <span class="ml-1">Ubah Password</span>
                        </a>
                        <div class="dropdown-divider border border-top w-100 "></div>
                        <a class="dropdown-item text-secondary" href="<?= site_url('autentifikasi/logout') ?>">
                            <i class="fa-fa fad fa-sign-out-alt "></i>
                            <span class="ml-1">Logout</span></a>
                    </div>
                </div>
            </div>

        </div>
    </nav>
</header>