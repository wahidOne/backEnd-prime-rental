<div class="main-content receipt-content bg-white">
    <section class="px-3">
        <?php
        $this->load->view($templatesPath . "navbar_top"); ?>
        <div class="col-12 pl-0 mt-4 pl-md-2">
            <h4 class="mb-n4 text-secondary font-25px">Pesanan</h4>
            <nav aria-label="breadcrumb px-0">
                <ol class="breadcrumb bg-transparent pl-0">
                    <li class="breadcrumb-item"><a class="text-muted" href="#">Home</a></li>
                    <li class="breadcrumb-item">Transaksi</li>
                    <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
                </ol>
            </nav>
        </div>
        <div class="container-fluid px-md-2">
            <div class="row mt-3">
                <div class="col-md-8 mx-auto text-center">
                    <p class=" font-6 font-w-600 text-secondary "> TERIMA KASIH</p>
                    <br>
                    <p class=" text-dark font-18px ">
                        Hay Unit <br>
                        Pesanan anda telah berhasil diterima <br>

                        untuk langkah selanjutnya silahkan lakukan pembayaran dan upload bukti pembayaran anda untuk mendapatkan konfirmasi dari kami.
                    </p>
                </div>
                <div class="col-md-8 mx-auto mt-2">
                    <p class=" font-19px text-center mb-2 font-md-5 text-uppercase text-secondary font-w-600 "> <span class=" font-12px font-md-15px font-w-400 text-capitalize text-secondary-50 ">No Transaksi : </span> <?= $rental['rent_id']; ?> </p>

                    <div class=" text-center mb-1 ">
                        <i class="fas text-info fa-clock"></i>
                        <span>
                            Tanggal pesan : <?= date("l, d m y | h:i A", strtotime($rental['rent_date'])); ?>
                        </span>
                    </div>
                </div>

            </div>
            <hr class=" ">
            <div class="row mt-4 px-md-2">
                <div class="col-12 mt-4">
                    <h3 class=" font-w-400 ">Detail pesanan <?= $rental['rent_id'] ?></h3>
                </div>
            </div>
            <div class="row mt-4 px-md-2">
                <div class="col-md-4">
                    <div class="d-block">
                        <p class=" font-20px mb-0 font-w-600 ">Untuk </p>
                        <p class=" d-flex flex-column ">
                            <span><?= $rental['client_fullname']; ?></span>
                            <span><?= $rental['user_email']; ?></span>
                        </p>
                    </div><br>
                    <div class="d-block">
                        <p class=" font-20px mb-0 font-w-600 ">Metode Pembayaran </p>
                        <p class=" d-flex flex-column ">
                            <?= $rental['payment_method']; ?>

                        </p>
                    </div>
                    <br>
                    <div class="d-block">
                        <p class=" font-20px mb-0 font-w-600 ">Jenis Layanan </p>
                        <p class=" d-flex flex-column ">
                            <?php if ($rental['rent_service'] == "1") : ?>
                                <span>Self Driver</span>
                            <?php elseif ($rental['rent_service'] == "2") : ?>
                                <span>With Driver</span>
                            <?php elseif ($rental['rent_service'] == "3") : ?>
                                <span>All In</span>
                            <?php endif; ?>

                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <p class=" text-dark font-w-600 ">No Polisi : <?= $rental['car_no_police']; ?></p>
                    <div class=" d-flex justify-content-center flex-column align-items-center ">
                        <img height="100" src="<?= base_url('assets/uploads/cars/') . $rental['car_photo']  ?>" class="img-fluid mx-auto " alt="">
                        <p class=" mt-1 font-w6-00 font-md-25px text-center text-black text-uppercase mb-0"><?= $rental['car_brand']; ?></p>
                        <p class="font-19px font-md-5 text-center text-dark font-w-600 ">Rp. <?= number_format($rental['car_price'], 0, ',', '.'); ?> / Hari</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-block text-right">
                        <p class=" font-20px mb-0 font-w-600 ">Tanggal Mulai </p>
                        <p class=" d-flex flex-column ">
                            <span><?= date('l d, m Y', strtotime($rental['rent_date_start'])); ?></span>

                        </p>
                    </div><br>
                    <div class="d-block text-right">
                        <p class=" font-20px mb-0 font-w-600 ">Metode Pembayaran </p>
                        <p class=" d-flex flex-column ">
                            <span><?= date('l d, m Y', strtotime($rental['rent_date_end'])); ?></span>

                        </p>
                    </div>
                </div>
            </div>
            <hr class=" ">
            <br>
            <div class="row">
                <div class="col-12 text-right ">
                    <p class="  text-black-50 font-arial ">
                        <span class="font-25px font-md-28px mr-1 ">Total</span> <span class="font-25px font-w-700 font-md-38px text-dark ">
                            Rp. <?= number_format($rental['rent_price'], 0, ',', '.'); ?>
                        </span>
                    </p>


                </div>
                <div class="col-12 d-flex justify-content-end">
                    <form action="<?= base_url('session/reset/respon-order') ?>" method="get">
                        <input type="hidden" name="rent_id" value="<?= $rental['rent_id'] ?>">
                        <input type="hidden" name="price" value="<?= $rental['rent_total_price'] ?>">
                        <button type="submit" class="btn btn-secondary btn-lg text-capitalize text-primary text-center ">
                            <i class="fas fa-check-double fa-fw mr-1"></i> Checkout
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>