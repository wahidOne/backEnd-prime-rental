<main class="dashboard--content">
    <div class="dashboard--main pb-5">
        <div class="container-fluid">
            <nav aria-label="breadcrumb  " class="bg-transparent ml-n8">
                <ol class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item "><a class="text-secondary my-auto font-25px font-weight-bold" href="<?= site_url('transaksi') ?>">Transaksi</a></li>
                    <li class="breadcrumb-item active text-secondary  my-auto font-20px" aria-current="page">Invoice
                    </li>
                    <li class="breadcrumb-item active text-secondary-50   my-auto font-18px" aria-current="page"><?= $transaksi['rent_id']  ?>
                    </li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div class="card bg-white border-0 shadow-sm px-2 pt-3 pb-4">
                        <div class="card-header border-0 bg-white">
                            <div class="d-flex justify-content-between flex-column flex-md-row">
                                <h2 class="text-secondary">PrimeRental</h2>
                                <div class="dropdown my-auto">

                                    <button class="btn btn-outline-secondary btn-sm actions-invoice" type="button"><i class="fas fa-bars mr-1"></i> <span>Actions </span><i class="fas fa-angle-down ml-1"></i></button>
                                    <div class="dropdown-menu font-15px dropdown-menu-right mt-1" id="dropdown-menu-actionsInvoice"><a class="dropdown-item" href="#"><i class="fad fa-print mr-1"></i> Print</a> <a class="dropdown-item" href="#"><i class="fad fa-times-octagon t mr-1"></i> Batalkan</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-info font-md-40px font-weight-bold text-left">Invoice
                                : <?= $transaksi['rent_id']; ?></p>
                            <div class="row d-flex px-md-3">
                                <div class="col-6 col-lg-4 order-1 order-lg-1 ">
                                    <div class="d-flex flex-column text-secondary"><span class="my-auto font-18px text-black-50">No transaksi</span>
                                        <div class="text-black font-18px d-flex flex-column"><span class="font-28px"><?= $transaksi['rent_id']; ?></span></div>
                                    </div>
                                    <div class="d-flex mt-2 flex-column text-secondary">
                                        <span class="my-auto font-20px text-black-50">Tgl Transaksi</span>
                                        <div class="text-black font-18px d-flex flex-column">
                                            <span><?= date('d F Y', strtotime($transaksi['rent_date'])) ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-5 mx-auto order-3 order-lg-2">
                                    <div class="d-flex mt-2  flex-row justify-content-between  text-secondary">
                                        <div>
                                            <span class="font-16px text-black-50">Tgl Mulai</span>
                                            <div class="text-black d-flex flex-column">
                                                <span class="text-uppercase font-17px "><?= $transaksi['rent_date_start'] ?></span>
                                            </div>
                                        </div>
                                        <div class="my-auto d-flex">
                                            <i class="fas fa-arrow-right fa-2x "></i>
                                        </div>
                                        <div>
                                            <span class="font-16px text-black-50">Tgl Berakhir</span>
                                            <div class="text-black d-flex flex-column">
                                                <span class="text-uppercase font-17px "><?= $transaksi['rent_date_end'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 text-right order-2 order-lg-3">
                                    <div class="d-flex  flex-column justify-content-start  text-secondary">
                                        <span class="font-20px text-black-50">Status</span>
                                        <div class="text-black d-flex flex-column">
                                            <span class="text-uppercase font-20px "><?= $transaksi['rent_status'] ?></span>
                                        </div>
                                    </div>

                                </div>

                            </div><br>
                            <!-- <div class="row px-md-3">
                                <div class="col-12 col-md-6 mx-auto">
                                    <div class="d-flex mt-2  flex-row justify-content-between  text-secondary">
                                        <div>
                                            <span class="font-16px text-black-50">Tgl Mulai</span>
                                            <div class="text-black d-flex flex-column">
                                                <span class="text-uppercase font-17px "><?= $transaksi['rent_date_start'] ?></span>
                                            </div>
                                        </div>
                                        <div class="my-auto d-flex">
                                            <i class="fas fa-arrow-right fa-2x "></i>
                                        </div>
                                        <div>
                                            <span class="font-16px text-black-50">Tgl Berakhir</span>
                                            <div class="text-black d-flex flex-column">
                                                <span class="text-uppercase font-17px "><?= $transaksi['rent_date_end'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br> -->
                            <div class="row px-md-3">
                                <hr class="w-100">
                                <div class="col-md-4">
                                    <div class="d-flex flex-column text-secondary justify-content-center ">
                                        <p class=" text-secondary font-22px mb-0 font-weight-bold text-capitalize "><?= $klien['client_fullname']; ?></p>
                                        <i class=" text-dark font-16px text-capitalize "><?= $klien['user_email']; ?></i>
                                        <p class=" text-black-50 font-16px text-capitalize mb-0 "><?= $klien['client_address']; ?></p>
                                        <p class=" text-black-50 font-16px text-capitalize "><?= $klien['client_phone']; ?></p>
                                    </div>


                                    <?php if ($transaksi['rent_service'] != 1) : ?>
                                        <div class="d-flex mt-2 flex-column text-secondary"><span class="my-auto font-20px text-black-50">Alamat Penjemputan</span>
                                            <div class="d-flex flex-column">
                                                <span class="font-21px text-black"><?= $transaksi['rent_pickup_address']; ?></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex flex-column text-secondary"><span class="my-auto font-17px text-black-50">Tgl Max Pengembalian
                                        </span>
                                        <div class="d-flex flex-column"><span class="font-25px text-black"><?= $transaksi['rent_max_returned']; ?></span></div>
                                    </div>
                                    <div class="d-flex mt-2 flex-column text-secondary"><span class="my-auto font-17px text-black-50">Hari</span>
                                        <div class="d-flex flex-column"><span class="font-25px text-black"><?= $transaksi['days']; ?>
                                                hari</span></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex flex-column text-secondary"><span class="my-auto font-17px text-black-50">Total Harga</span>
                                        <div class="d-flex flex-column">
                                            <span class="font-25px text-black"><?= $transaksi['rent_price_format']; ?></span>

                                        </div>
                                    </div>


                                    <div class="d-flex flex-column mt-2 text-secondary">
                                        <span class="my-auto font-17px text-black-50">Tipe Sewa</span>
                                        <div class="d-flex flex-column">
                                            <?php if ($transaksi['rent_service'] == 1) : ?>
                                                <span class="font-25px text-black">Self
                                                    driver
                                                </span>
                                            <?php elseif ($transaksi['rent_service'] == 2) : ?>
                                                <span class="font-25px text-black">With Driver
                                                </span>
                                            <?php elseif ($transaksi['rent_service'] == 3) : ?>
                                                <span class="font-25px text-black">All in
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <?php if ($transaksi['rent_service'] == 2 | $transaksi['rent_service'] == 3) : ?>
                                        <div class="d-flex flex-column mt-2 text-secondary">
                                            <span class="my-auto font-17px text-black-50">Nama Supir</span>
                                            <div class="d-flex flex-column">
                                                <?= $driver['driver_name']; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="table-responsive rounded pt-3">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center">Mobil</th>
                                                <th>Type</th>
                                                <th>Kapasitas</th>
                                                <th>Harga sewa / hari</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center flex-nowrap justify-content-center "><img height="80" class="" src="<?= $transaksi['car_photo'] ?>" alt="">
                                                        <div class="ml-1 text-wrap">
                                                            <p class="font-18px w-100 font-weight-bold mb-0 ">
                                                                <?= $transaksi['car_brand'] ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p><?= $tipe_mobil['type_name']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?= $transaksi['car_capacity']; ?> Kursi</p>

                                                </td>
                                                <td>
                                                    <p><?= $transaksi['car_price_format']; ?>/hari</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="d-flex pl-5 flex-column text-secondary"><span class="my-auto font-17px text-black-50">Metode Bayar</span>
                                    <div class="d-flex flex-column">
                                        <span class="font-25px text-black"><?= $transaksi['payment_method']; ?></span>

                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 ml-auto">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h6 class="text-black-50">Subtotal</h6>
                                                </td>
                                                <td>
                                                    <h6><?= $transaksi['rent_price_format']; ?></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="text-black-50">Harga Supir</h6>
                                                </td>
                                                <td>
                                                    <h6><?= $transaksi['rent_driver_price']; ?></h6>
                                                </td>
                                            </tr>
                                            <tr class="bg-white-30">
                                                <td>
                                                    <h6 class="text-black-50">Total</h6>
                                                </td>
                                                <td>
                                                    <h6>Rp. <?= number_format($transaksi['payment_total'], 2, ',', '.'); ?></h6>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php $this->load->view($componentPath . "footer"); ?>
</main>