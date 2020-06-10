<section class="listcars-banner px-3">
    <?php
    $this->load->view($templatesPath . "navbar_top"); ?>
    <div class="col-12 pl-0 mt-4 pl-md-2">
        <h4 class="mb-n4 text-primary font-25px">Mobil</h4>
        <nav aria-label="breadcrumb px-0">
            <ol class="breadcrumb bg-transparent pl-0">
                <li class="breadcrumb-item"><a href="<?= site_url('beranda') ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mobil</li>
            </ol>
        </nav>
    </div>
    <div class="col-12 listcars-banner-content mt-md-5 ">
        <div class="row h-100 d-flex ">
            <div class="col-md-6 order-2 d-flex flex-column align-items-end justify-content-center">
                <p class="font-25px text-white mb-n1 ml-0 pl-0">Temukan</p>
                <h1 class="text-primary text-right font-md-65px font-weight-bold">Mobil <br> Terbaik Anda</h1>
            </div>
            <div class="col-md-6 order-1 my-auto d-flex align-content-center justify-content-center align-items-center flex-nowrap px-0  ">
                <img class=" w-100" src="<?= base_url('assets/frontEnd/') ?>dist/static/svg/list-cars.svg" alt=""></div>
        </div>
    </div>
</section>