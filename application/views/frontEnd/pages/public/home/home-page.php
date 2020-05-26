<?php

$this->load->view($componentPath . "banner");


?>

<section class="best-cars pt-10 pb-10">
    <div class="container-fluid pb-10">
        <div class="row">
            <div class="col-12 font-6 mb-6 py-5 text-center"><span class="text-white font-md-9 text-secondary">Rekomendasi</span>
                <!-- <span style="font-weight: 600;" class="bg-secondary rounded-sm font-md-9 px-2 text-primary">Mobil</span> -->
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-11 col-lg-11 mx-auto">
                <div class="swiper-container slider-cars swiper position-relative mx-auto px-3 w-100">
                    <div class="swiper-wrapper py-2">
                        <?php $this->load->view($componentPath . "slider-cars", $cars); ?>
                    </div>
                </div><a href="#" class="text-secondary swiper__nav swiper__nav-prev p-1"><i class="fas fa-angle-left fa-3x"></i> </a><a href="#" class="text-secondary swiper__nav swiper__nav-next p-1"><i class="fas fa-angle-right fa-3x"></i></a>
            </div>
        </div>
    </div>
</section>


<section class="service px-md-4 bg-white">
    <div class="container-fluid pb-10 bg-secondary font-montserrat">
        <div class="row">
            <div class="col-12 my-4 pt-md-5 text-center"><span style="font-weight: 600;" class="bg-secondary-70 rounded-sm font-5 font-md-9 px-2 text-white">Layanan</span> <span class="text-white font-5 font-md-9 text-primary">Kami</span></div>
        </div>
        <div class="row pt-4 pt-md-5 px-4 d-flex">
            <div class="col-10 mx-auto col-md-6 col-lg-3 d-flex">
                <div class="card bg-transparent py-3 border-0 rounded text-primary ">
                    <div class="card-header bg-transparent border-0 text-center pt-4"><i class="fas fa-bath font-9"></i></div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-uppercase">Kebersihan</h5>
                        <p class="card-text mt-3 text-white-50">Mobil yang kami sediakan, Bersih , Nyaman, Terawat.
                            Dengan Supir Profesiona</p>
                    </div>
                </div>
            </div>
            <div class="col-10 mx-auto col-md-6 col-lg-3 d-flex">
                <div class="card bg-transparent py-3 border-0 rounded text-primary ">
                    <div class="card-header bg-transparent border-0 text-center pt-4"><i class="fas fa-tools font-9"></i></div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-uppercase">BENGKEL & UNIT PENGGANTI</h5>
                        <p class="card-text mt-3 text-white-50">Mobil yang kami sediakan, Bersih , Nyaman, Terawat.
                            Dengan Supir Profesiona</p>
                    </div>
                </div>
            </div>
            <div class="col-10 mx-auto col-md-6 col-lg-3 d-flex">
                <div class="card bg-transparent py-3 border-0 rounded text-primary ">
                    <div class="card-header bg-transparent border-0 text-center pt-4"><i class="fas fa-heartbeat font-9"></i></div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-uppercase">ASURANSI</h5>
                        <p class="card-text mt-3 text-white-50">Mobil yang disewakan telah diAsuransikan sehingga
                            menghindar resiko kerugian perusahan maupun costumer yang akan timbul terjadi kecelakaan
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-10 mx-auto col-md-6 col-lg-3 d-flex">
                <div class="card bg-transparent py-3 border-0 rounded text-primary ">
                    <div class="card-header bg-transparent border-0 text-center pt-4"><i class="fas fa-phone font-9"></i></div>
                    <div class="card-body text-center">
                        <h5 class="card-title text-uppercase">KOMUNIKASI</h5>
                        <p class="card-text mt-3 text-white-50">Costumer Serice kami siap melayani anda dalam
                            24jam/hari dalam seminggu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="free-rental">
    <div class="container-fluid pb-10 font-montserrat">
        <div class="row pb-5">
            <div class="col-12 my-4 pt-md-5 text-center"><span style="font-weight: 600;" class="bg-secondary rounded-sm font-5 font-md-9 px-2 text-primary">Bebas</span> <span class="text-white font-5 font-md-9 text-secondary">Sewa</span></div>
        </div>
        <div class="row pt-md-5 px-4 d-flex">
            <?php foreach ($free_rent as $fr) : ?>

                <div class="col free-rental-col col-sm-6 col-md-3 mb-6">
                    <div class="card free-rental__card text-center border-0">
                        <img class="img-fluid px-2" src="<?= base_url('assets/uploads/cars/') . $fr['car_photo'] ?>" alt="">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h6 class="card__brand"><?= $fr['car_brand']; ?></h6>
                            <h5 class="card__type text-center font-md-20px"><?= $fr['type_name']  ?></h5>
                            <h5 class="card__price">Rp. <?= number_format($fr['car_price'], 2, ',', '.') ?></h5>
                            <div class=" d-flex  text-warning justify-content-center  ">
                                <i class="fas fa-star "></i>
                                <i class="fas fa-star  ml-1"></i>
                                <i class="fas fa-star  ml-1"></i>
                                <i class="fas fa-star-half-alt  ml-1"></i>
                                <i class="far fa-star  ml-1"></i>
                            </div>
                            <div class="d-flex mt-2"><a href="" class="btn card__btn-sewa btn-block mr-1">Sewa</a> <a href="<?= site_url('mobil/detail/') . $fr['car_id'] ?>" class="btn card__btn-detail">Detail</a></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>


<section class="about px-md-4 mb-6">
    <div class="container-fluid pb-10 font-montserrat bg-secondary">
        <div class="row">
            <div class="col-md-6 ml-auto my-4 pt-md-5 text-center text-md-left pr-4"><span class="text-white font-6 font-md-9 text-primary">Tentang</span> <span style="font-weight: 600;" class="bg-secondary-70 rounded-sm font-5 font-md-9 px-2 text-white">Kami</span></div>
        </div>
        <div class="row pb-5 px-4 d-flex">
            <div class="col-md-6 my-auto pb-9"><img class="img-fluid" src="<?= base_url('assets/frontEnd/') ?>dist/static/svg/about-vektor.svg" alt="">
            </div>
            <div class="col-md-6 my-auto">
                <h4 class="text-primary font-55px">PrimeRental</h4>
                <p class="text-white-50 text-center text-md-left"><span class="text-light">Primerental</span> adalah
                    perusahaan penyedia jasa rental mobil terbaik di Jabodetabek.</p>
                <p class="text-white-50 text-center text-md-left">Perusahaan ini telah berdiri sejak tahun 2008 dan
                    melayani perorangan maupun perusahaan dengan komitmen untuk memberikan pelayanan terbaik,
                    berkualitas, dan berpengalaman di bidangnya..</p><a href="" class="text-primary-70 mt-3">Selengkapnya...</a>
            </div>
        </div>
    </div>
</section>
<section class="testimonial pb-6">
    <div class="container-fluid pb-10">
        <div class="row pb-5">
            <div class="col-12 my-4 pt-md-5 text-center"><span style="font-weight: 600;" class="bg-secondary rounded-sm font-5 font-md-9 px-2 text-primary">Testi</span> <span class="text-white font-5 font-md-9 text-secondary">monial</span></div>
        </div>
        <div class="row pt-md-5 px-4 d-flex testimonial__content">
            <div class="col-md-8 col-lg-6 mx-auto my-auto">
                <div class="swiper-container slider-testim">
                    <div class="swiper-wrapper pb-3 mb-4 h-100">
                        <div class="swiper-slide px-md-9 my-auto">
                            <div class="card testimonial__card px-0 pt-14" style="width: 18rem;"><img src="<?= base_url('assets/frontEnd/') ?>dist/static/img/clients/client1.jpg" class="card-img-top mx-auto" alt="...">
                                <div class="card-body bg-secondary text-center pt-12 pb-5">
                                    <h5 class="card-title text-primary font-40px font-md-30px">Carla Stevens</h5>
                                    <p class="card-text text-white-50">Lorem ipsum dolor, sit amet consectetur
                                        adipisicing elit. Quis repellat, magnam nam hic et nulla qui, similique nisi
                                        quam impedit voluptate. Alias quam earum facilis, minus rerum iste nihil
                                        quaerat, eos sed reiciendis quia dignissimos ut distinctio quae temporibus!
                                        Expedita dolorem eum dignissimos quam neque doloribus sint illo quia
                                        voluptates?</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide px-md-9 my-auto">
                            <div class="card testimonial__card px-0 pt-14" style="width: 18rem;"><img src="<?= base_url('assets/frontEnd/') ?>dist/static/img/clients/client2.png" class="card-img-top mx-auto" alt="...">
                                <div class="card-body bg-secondary text-center pt-12 pb-5">
                                    <h5 class="card-title text-primary font-40px font-md-30px">Skylar</h5>
                                    <p class="card-text text-white-50">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Ut sollicitudin fermentum dolor.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide px-md-9 my-auto">
                            <div class="card testimonial__card px-0 pt-14" style="width: 18rem;"><img src="<?= base_url('assets/frontEnd/') ?>dist/static/img/clients/client3.png" class="card-img-top mx-auto" alt="...">
                                <div class="card-body bg-secondary text-center pt-12 pb-5">
                                    <h5 class="card-title text-primary font-40px font-md-30px">John Doe</h5>
                                    <p class="card-text text-white-50">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Ut sollicitudin fermentum dolor. Nunc nec augue urna. Cras
                                        varius orci vitae lacinia efficitur.</p>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="swiper-pagination"></div>
                </div><a href="#" class="text-secondary swiper__nav swiper__nav-prev p-1"><i class="fas fa-angle-left fa-3x"></i> </a><a href="#" class="text-secondary swiper__nav swiper__nav-next p-1 mr-md-5"><i class="fas fa-angle-right fa-3x"></i></a>
            </div>
            <div class="d-none d-md-flex col-md-4 col-lg-6 my-auto"><img class="img-fluid" src="<?= base_url('assets/frontEnd/') ?>dist/static/svg/testim.svg" alt=""></div>
        </div>
    </div>
</section>