<div class="listcars-content">
    <?php
    $this->load->view($componentPath . "cars-banner");
    ?>
    <section class="listcars-main bg-light">
        <div class="container-fluid px-5 listcars-container bg-light">
            <div class="row">
                <div class="col-md-3 pt-2 listcars-sidenav d-none d-md-block  px-lg-5 bg-light">
                    <h3>Filter</h3>
                    <ul class="nav flex-column nav-filter">
                        <li class="nav-item"><a class="nav-link" id="listcars-navlink" href="#" data-status="false" data-collapse="#cars"><span>Tipe </span><i class="fas fa-chevron-down"></i></a>
                            <div class="collapse nav-collapse pl-2" id="cars">
                                <nav class="nav d-flex pt-1 flex-column">
                                    <a class="nav-link" href="#">
                                        <span>All Type
                                        </span>
                                    </a>
                                    <?php foreach ($car_type as $ct) :  ?>
                                        <a class="nav-link" href="<?= $ct['type_id'] ?>"><span><?= $ct['type_name']; ?></span></a>
                                    <?php endforeach; ?>
                                </nav><br>
                            </div>
                            <hr>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="listcars-navlink" href="#" data-status="false" data-collapse="#chair"><span>Kursi </span><i class="fas fa-chevron-down"></i></a>
                            <div class="collapse nav-collapse pl-2" id="chair">
                                <nav class="nav d-flex pt-1 flex-column">
                                    <a class="nav-link" href="#"><span>All
                                        </span></a><a class="nav-link" href="#"><span>5 kursi </span>
                                    </a>
                                    <a class="nav-link" href="#"><span>6 kursi </span></a>
                                    <a class="nav-link" href="#"><span>> 7 kursi</span></a></nav><br>
                            </div>
                            <hr>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="listcars-navlink" href="#" data-status="false" data-collapse="#price"><span>Price </span><i class="fas fa-chevron-down"></i></a>
                            <div class="collapse nav-collapse pl-2" id="price">
                                <nav class="nav d-flex pt-1 flex-column">
                                    <a class="nav-link" href="#"><span>All Price
                                        </span></a><a class="nav-link" href="#"><span> Rp. 300.000 < </span> </a> <a class="nav-link" href="#"><span> Rp. 500.000 < </span> </a> <a class="nav-link" href="#"><span> > Rp. 1.000.000</span></a></nav><br>
                            </div>
                            <hr>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="listcars-navlink" href="#" data-status="false" data-collapse="#transmission"><span>Transmisi </span><i class="fas fa-chevron-down"></i></a>
                            <div class="collapse nav-collapse pl-2" id="transmission">
                                <nav class="nav d-flex pt-1 flex-column">

                                    <a class="nav-link" href="#"><span>Otomatis </span></a>
                                    <a class="nav-link" href="#"><span>Manual</span></a>
                                </nav><br>
                            </div>
                            <hr>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 pt-2 px-lg-5">
                    <div class="row">
                        <div class="form-group col-12 col-md-12 row px-0">
                            <h3 class="col-6 col-md-7">Search</h3>
                            <div class="input-group listcars-search col-6 col-md-5">
                                <input class="form-control bg-transparent listcars-input-search border-0" placeholder="Search">
                                <div class="input-group-prepend mr-n1 my-auto">
                                    <a href="#" class=" badge btn-search"><i class="fas text-secondary fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class=" text-muted "><?= $count; ?> Car found</h5>
                        </div>

                    </div>
                    <div class="row mt-4">
                        <?php foreach ($cars as $c) : ?>
                            <div class="col-12 mt-3">
                                <div class="card bg-light px-2 pb-0 border-0 car-card">
                                    <div class="row no-gutters pb-0">
                                        <div class="col-md-4 my-auto"><img src="<?= base_url('assets/uploads/cars/') . $c['car_photo'] ?>" class="card-img" alt="..."></div>
                                        <div class="col-md-8">
                                            <div class="card-body pr-2 pl-5">
                                                <h3 class="card-title font-weight-bold text-secondary"><?= $c['car_brand'] ?></h3>
                                                <hr class="car-devider">
                                                <div class="row mt-2 no-gutters pb-0">
                                                    <div class="col-md-6 pb-0 mb-3 mb-md-0">
                                                        <div class="row pb-0">
                                                            <p class="col-6 col-md-12 d-flex flex-grow-1 justify-content-start align-content-center">
                                                                <i class="fad fa-ruler-horizontal font-18px fa-fw"></i>
                                                                <span class="my-auto ml-1"><?= $c['car_no_police']  ?></span></p>
                                                            <p class="col-6 col-md-12 d-flex justify-content-start align-content-center text-secondary">
                                                                <i class="fad fa-gas-pump fa-fw font-18px"></i> <span class="my-auto ml-1"><?= $c['car_fuel']; ?></span></p>
                                                            <p class="col-6 col-md-12 d-flex justify-content-start align-content-center text-secondary">
                                                                <i class="fad fa-chair-office fa-fw font-18px"></i>
                                                                <span class="my-auto ml-1"><?= $c['car_capacity']; ?> Kursi </span></p>
                                                            <p class="col-6 col-md-12 d-flex justify-content-start align-content-center text-secondary">
                                                                <i class="fab fa-whmcs fa-fw font-18px"></i> <span class="my-auto ml-1"><?= $c['car_transmission']; ?></span></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <h4 class="text-muted"><?= $c['type_name']  ?></h4>
                                                        <h3 class="font-weight-bold text-dark">Rp. <?= number_format($c['car_price'], 2, ',', '.') ?></h3>
                                                        <?php

                                                        echo $c['car_status'] == 0 ?  '<span class="badge badge-primary text-white">Bebas</span>' : '<span class=" badge badge-secondary text-white">Sedang Di sewa</span>';

                                                        ?>


                                                        <div class="d-flex mt-2 justify-content-end"><a href="<?= site_url('mobil/detail/') . $c['car_id'] ?>" class="btn btn-primary">Detail</a>
                                                            <?php if ($c['car_status'] == 0) : ?>
                                                                <a href="#" class="btn ml-2 btn-secondary">Sewa</a>
                                                            <?php else :  ?>
                                                                <a href="#" style="cursor: default" class="btn font-italic btn-secondary ml-2   disabled" tabindex="-1" role="button" aria-disabled="true">Di Sewa</a>
                                                            <?php endif; ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>