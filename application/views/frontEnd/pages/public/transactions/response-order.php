<div class="main-content receipt-content bg-white">
    <section class="px-3">
        <?php
        $this->load->view($templatesPath . "navbar_top"); ?>
        <div class="col-12 pl-0 mt-4 pl-md-2">
            <h4 class="mb-n4 text-secondary font-25px">Pesanan berhasil</h4>
            <nav aria-label="breadcrumb px-0">
                <ol class="breadcrumb bg-transparent pl-0">
                    <li class="breadcrumb-item"><a class="text-muted" href="#">Home</a></li>
                    <li class="breadcrumb-item">Transaksi</li>
                    <li class="breadcrumb-item active" aria-current="page">Pesanan Berhasil</li>
                </ol>
            </nav>
        </div>
        <div class="container-fluid px-0">
            <div class="row mt-5 mb-5 px-0">
                <div class="col-lg-9 mx-auto">

                    <div class="card py-3 border-0 shadow rounded pt-6 pb-6 ">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-md-5 col-8 mx-auto">
                                    <img class="img-fluid" src="<?= base_url('assets/frontEnd/') ?>dist/static/svg/order_respon.svg" alt="">
                                </div>
                                <div class="col-12 mx-auto mt-3 text-center">
                                    <p class=" font-md-40px font-22px   font-arial text-secondary text-capitalize  "> Pesanan anda berhasil !</p>
                                </div>
                            </div>
                            <div class="row mt-5">

                                <div class="col-md-10 mx-auto card-body  d-flex justify-content-center flex-column align-items-center ">
                                    <p class=" font-19px text-center mb-2 font-md-5 text-uppercase text-secondary font-w-600 "> <span class=" font-12px font-md-15px text-capitalize text-secondary-50 ">No Transaksi : </span> <?= $rental['rent_id']; ?> </p>
                                    <img src="<?= base_url('assets/uploads/cars/') . $rental['car_photo']  ?>" class="img-fluid mx-auto " alt="">
                                    <p class="font-16px font-md-25px ml-auto text-black mb-0">
                                        <span class=" font-12px font-md-15px text-capitalize text-black-50 ">No Polisi : </span> <?= $rental['car_no_police']; ?>
                                    </p>
                                    <p class="font-19px font-md-35px text-center text-secondary-50 mb-0"><?= $rental['car_brand']; ?></p>

                                    <p class="font-19px font-md-5 text-center text-dark font-w-600 ">Rp. <?= number_format($rental['car_price'], 0, ',', '.'); ?> / Hari</p>
                                </div>
                                <div class="col-md-10 card-body mx-auto mb-2">
                                    <p class="mb-0  ">Hay, <span class="font-w-600"><?= $client['client_fullname']; ?></span></p>
                                    <p class=" font-18px"> Untuk langkah selanjutnya silahkan lakukan pembayaran dan upload bukti pembayaran anda untuk mendapatkan konfirmasi dari kami. </p>
                                </div>
                                <div class="col-md-10 mx-auto">
                                    <div class="row">
                                        <div class="col-md-4 ">
                                            <h5 class=" text-black-50  ">Metode Bayar </h5>
                                            <h3 class="text-dark">
                                                <?= $rental['payment_method']; ?> <span class=" font-15px ">
                                            </h3>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class=" text-black-50  ">Bank Transfer </h5>
                                            <h3 class="text-dark">
                                                <?= $bank['bank_name']; ?> <span class=" font-15px text-secondary-50 "> <?= $bank['bank_number']; ?></span>
                                            </h3>
                                        </div>
                                        <div class="col-md-4 text-nowrap">
                                            <h5 class=" text-black-50  ">Tipe Layanan</h5>
                                            <h4 class="text-dark">
                                                <?php if ($rental['rent_service'] == "1") : ?>
                                                    <span>Self Driver</span>
                                                <?php elseif ($rental['rent_service'] == "2") : ?>
                                                    <span>With Driver</span>
                                                <?php elseif ($rental['rent_service'] == "3") : ?>
                                                    <span>All In</span>
                                                <?php endif; ?>
                                                <!-- <?= date("l, d.m.Y ", strtotime($rental['rent_date'])); ?> -->
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-10 mx-auto mt-3">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="card border-0 shadow-sm card-body bg-secondary  ">
                                                <div class=" text-nowrap card-title text-primary-70  font-17px font-md-22px mb-0  ">Tgl Mulai <i class=" fas font-15px fa-fw fa-calendar-star mb-2 "></i></div>
                                                <span class=" text-nowrap font-md-26px font-w-600 text-primary  "><?= date('d-m-Y', strtotime($rental['rent_date_start'])); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-2 my-auto mx-auto text-center">
                                            <button class=" btn btn-secondary rounded-circle  ">
                                                <i class="fas fa-arrow-right text-primary "></i>
                                            </button>
                                        </div>
                                        <div class="col-5">
                                            <div class="card border-0 shadow-sm card-body bg-secondary  ">
                                                <div class="card-title text-nowrap text-primary-70  mb-0  "><span class=" font-17px font-md-22px my-auto mt-1 ">Tgl akhir</span> <i class=" fas font-15px fa-fw fa-calendar-check mb-2  "></i></div>
                                                <span class=" text-nowrap font-md-26px font-w-600 text-primary  "><?= date('d-m-Y', strtotime($rental['rent_date_end'])); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 mt-3 mx-auto text-right">
                                    <p class="  text-black-50 ">
                                        <span class="font-25px font-md-28px mr-1 ">Total</span> <span class="font-25px font-w-700 font-md-38px text-dark ">
                                            Rp. <?= number_format($rental['rent_price'], 0, ',', '.'); ?>
                                        </span>
                                    </p>
                                </div>

                                <div class="col-md-10 mx-auto text-right">
                                    <button type="button" class=" btn font-15px font-md-18px " data-toggle="tooltip" data-placement="left" title="Tanggal pesanan anda">
                                        <?= date("l, d m y | h:i A", strtotime($rental['rent_date'])); ?>
                                    </button>


                                </div>
                                <div class="col-md-10 mx-auto text-left">
                                    <form action="<?= base_url('session/reset/respon-order') ?>" method="get">
                                        <input type="hidden" name="rent_id" value="<?= $rental['rent_id'] ?>">
                                        <input type="hidden" name="price" value="<?= $rental['rent_total_price'] ?>">
                                        <button type="submit" class="btn btn-secondary btn-lg text-capitalize ml-auto">Ke halaman transaksi</button>
                                    </form>

                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>