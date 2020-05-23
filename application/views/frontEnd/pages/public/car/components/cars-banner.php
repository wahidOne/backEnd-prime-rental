<section class="listcars-banner px-3">
    <?php $this->load->view($templatesPath . "navbar_top"); ?>
    <div class="col-12 pl-0 mt-4 pl-md-2">
        <h4 class="mb-n4 text-primary font-25px">Mobil</h4>
        <nav aria-label="breadcrumb px-0">
            <ol class="breadcrumb bg-transparent pl-0">
                <li class="breadcrumb-item"><a href="<?= site_url('beranda') ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mobil</li>
            </ol>
        </nav>
    </div>
    <div class="col-12 listcars-banner-content pl-0 pl-md-2">
        <div class="row h-100">
            <div class="col-md-7 d-flex align-content-center flex-column justify-content-center">
                <p class="font-25px text-white mb-n1 ml-0 pl-0">Temukan</p>
                <h1 class="text-primary font-md-65px font-weight-bold ml-0 pl-0">Mobil Terbaik Anda</h1>
            </div>
            <div class="col-md-5 my-auto mt-3"><img class="img-fluid" src="<?= base_url('assets/frontEnd/') ?>dist/static/svg/list-cars.svg" alt=""></div>
        </div>
    </div>
</section>