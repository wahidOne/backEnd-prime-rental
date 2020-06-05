<div class="detail-content px-sm-4 pb-6">
    <?php $this->load->view($templatesPath . "navbar_top"); ?>
    <div class="container-fluid">
        <div class="row pt-4">
            <div class="col-md-7 py-4 my-auto"><img class="img-fluid w-100  py-4" src="<?= base_url('assets/uploads/cars/') . $car['car_photo'] ?>" alt="">
                <div class="d-flex align-content-between nav-social"><a href="#" class="btn btn-secondary text-primary"><i class="fab fa-2x fa-facebook-f"></i></a> <a href="#" class="btn btn-secondary text-primary ml-2"><i class="fab fa-2x fa-instagram"></i></a> <a href="#" class="btn btn-secondary text-primary ml-2"><i class="fab fa-2x fa-twitter"></i></a> <a href="#" class="btn btn-secondary text-primary ml-2"><i class="fal fa-2x fa-envelope"></i></a></div>
            </div>
            <div class="col-md-5">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb bg-transparent pl-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('beranda') ?>">Home</a></li>
                        <li class="breadcrumb-item text-primary-70">Detail</li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $car['car_brand']; ?></li>
                    </ol>
                </nav>
                <h1 class="font-md-8 text-primary"><?= $car['car_brand']  ?></h1>
                <div class="d-flex font-26px text-warning mt-2">
                    <i class="fas fa-star fa-fw"></i>
                    <i class="fas fa-star fa-fw ml-1"></i>
                    <i class="fas fa-star fa-fw ml-1"></i>
                    <i class="fas fa-star-half-alt fa-fw ml-1"></i>
                    <i class="far fa-star fa-fw ml-1"></i>
                </div>
                <h5 class="font-25px mt-2 text-white font-italic"><?= $car['type_name']  ?></h5>
                <h5 class="font-25px mt-2 text-primary">Rp <?= number_format($car['car_price'], 2, ',', '.') ?>/ hari</h5>
                <p class="mt-md-2 text-white-50"><?= $car['car_desc']; ?></p>
                <div class="d-flex mt-2"><span class="badge badge-pill badge-primary font-18px text-secondary shadow-sm"><?= $car['car_capacity']; ?> Kursi</span>
                    <span class="badge badge-pill badge-primary font-18px text-secondary shadow-sm ml-2">
                        <?= $car['car_transmission']; ?>
                    </span>
                    <span class="badge badge-pill badge-primary font-18px text-secondary shadow-sm ml-2"><?= $car['car_fuel']; ?></span>
                </div>
                <?php if ($car['car_status'] == 0) : ?>
                    <a href="#" class="btn btn-outline-primary mt-3 font-18px rounded-pill py-1 px-3">Sewa
                        sekarang</a>
                <?php else :  ?>
                    <span style="cursor: default" class="btn btn-outline-primary mt-3 font-18px rounded-pill py-1 px-3">Tersewa
                    </span>
                <?php endif;  ?>

            </div>
        </div>
    </div>
</div>



<section class="similar-car pt-5">
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-12 ml-auto my-4 pt-md-5 text-center text-md-left pr-4"><span class="text-white font-5 font-md-6 text-secondary">MOBIL YANG</span> <span style="font-weight: 600;" class="bg-secondary-70 rounded-sm font-5 font-md-6 px-2 text-primary">SERUPA</span></div>
        </div>
        <div class="row justify-content-center align-items-center align-content-center">

            <div class="col-11 mx-auto my-auto">

                <?php
                if ($cars->num_rows() <= 2) : ?>

                    <h2 class="  text-black-50 text-center mt-3 ">Data Tidak ditemukan</h2>

                <?php else : ?>
                    <?php if ($cars->num_rows() <= 5) : ?>
                        <div class="row d-none d-md-flex  ">
                            <div class="col-sm-3">

                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="swiper-container swiper-similar-cars position-relative mx-auto px-3 w-100">
                        <div class="swiper-wrapper d-flex align-items-stretch">
                            <?php foreach ($cars->result_array() as $c) :  ?>
                                <?php if ($car['car_id'] != $c['car_id']) : ?>
                                    <div class="swiper-slide pt-2 card-stretch ">
                                        <div class="card swiper--card">
                                            <div class="d-flex flex-column mt-auto">
                                                <div class="swiper-img">
                                                    <img height="150" src="<?= base_url('assets/uploads/cars/') . $c['car_photo'] ?>" alt=""></div>
                                                <div class="card-body d-flex flex-column justify-content-center align-content-end mt-auto">
                                                    <h6 class="card__brand"><?= $c['car_brand']; ?></h6>
                                                    <h5 class="card__type font-md-20px"><?= $c['type_name'] ?></h5>
                                                    <h5 class="card__price">Rp. <?= number_format($c['car_price'], 2, ',', '.') ?>/hari</h5>
                                                    <div class="d-flex justify-content-center  text-warning ">
                                                        <i class="fas fa-star fa-fw"></i>
                                                        <i class="fas fa-star fa-fw ml-1"></i>
                                                        <i class="fas fa-star fa-fw ml-1"></i>
                                                        <i class="fas fa-star-half-alt fa-fw ml-1"></i>
                                                        <i class="far fa-star fa-fw ml-1"></i>
                                                    </div>
                                                    <div class="d-flex justify-content-around">
                                                        <?php if ($c['car_status'] == 0) : ?>
                                                            <a href="<?= site_url('sewa/') . $c['car_id'] ?>" class="btn btn-block card__btn mt-2">Sewa</a>
                                                        <?php else :  ?>
                                                            <span style="cursor: default" class="btn font-italic  btn-block card__btn mt-2 ">Di sewa</span>
                                                        <?php endif; ?>

                                                        <a href="<?= site_url('mobil/detail/') . $c['car_id'] ?>" class="btn card__btn ml-1 mt-2"><i class="fas fa-eye"></i></a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </div>
                    </div>
                    <a href="#" class="text-secondary swiper__nav swiper__nav-prev p-1"><i class="fas fa-angle-left fa-3x"></i> </a><a href="#" class="text-secondary swiper__nav swiper__nav-next p-1"><i class="fas fa-angle-right fa-3x"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>