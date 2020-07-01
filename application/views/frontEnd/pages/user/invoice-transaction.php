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
                            <div class="d-flex justify-content-between">
                                <h2 class="text-secondary">PrimeRental</h2>

                                <div class="dropdown my-auto">
                                    <a href="" class="btn btn-outline-success btn-sm ">Upload Bukti Pembayaran</a>
                                    <button class="btn btn-outline-secondary btn-sm actions-invoice" type="button"><i class="fas fa-bars mr-1"></i> <span>Actions </span><i class="fas fa-angle-down ml-1"></i></button>
                                    <div class="dropdown-menu font-15px dropdown-menu-right mt-1" id="dropdown-menu-actionsInvoice"><a class="dropdown-item" href="#"><i class="fad fa-print mr-1"></i> Print</a> <a class="dropdown-item" href="#"><i class="fad fa-times-octagon t mr-1"></i> Batalkan</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-info font-md-40px font-weight-bold text-left">Invoice
                                : <?= $transaksi['rent_id']; ?></p>
                            <div class="row px-3">
                                <div class="col-md-6">
                                    <div class="d-flex flex-column text-secondary"><span class="my-auto font-18px text-black-50">No transaksi</span>
                                        <div class="text-black font-18px d-flex flex-column"><span class="font-28px"><?= $transaksi['rent_id']; ?></span></div>
                                    </div>
                                    <div class="d-flex mt-2 flex-column text-secondary"><span class="my-auto font-20px text-black-50">Tgl Transaksi</span>
                                        <div class="text-black font-18px d-flex flex-column"><span><?= date('d F Y', strtotime($transaksi['rent_date'])) ?></span></div>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="d-flex mt-2 flex-column text-secondary"><span class="my-auto font-20px text-black-50">Status</span>
                                        <div class="text-black font-18px d-flex flex-column">

                                            <?php if ($transaksi['payment_proof'] == "" && $transaksi['payment_status'] == "0") : ?>
                                                <span class="text-danger">
                                                    Menunggu pembayaran
                                                </span>
                                            <?php elseif (!$transaksi['payment_proof'] == "" && !$transaksi['payment_proof'] == 1) : ?>
                                                <span class=" text-info ">
                                                    Menunggu Konfirmasi
                                                </span>
                                            <?php elseif ($transaksi['payment_proof'] != "" && $transaksi['payment_proof'] == 1) : ?>
                                                <span class=" text-success ">
                                                    Pembayaran Selesai
                                                </span>
                                            <?php else :  ?>
                                                <span>Opps..</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row px-3">
                                <hr class="w-100">
                                <div class="col-md-4">
                                    <div class="d-flex flex-column text-secondary justify-content-center ">
                                        <p class=" text-secondary font-22px mb-0 font-weight-bold text-capitalize "><?= $klien['client_fullname']; ?></p>
                                        <i class=" text-dark font-16px text-capitalize "><?= $klien['user_email']; ?></i>
                                        <p class=" text-black-50 font-16px text-capitalize mb-0 "><?= $klien['client_address']; ?></p>
                                        <p class=" text-black-50 font-16px text-capitalize "><?= $klien['client_phone']; ?></p>
                                    </div>


                                    <?php if (!$transaksi['rent_service'] == 1) : ?>
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
                                                <?php if ($transaksi['rent_pay_status'] == 1 && $transaksi['payment_status'] == 1) : ?>
                                                    <span class="font-25px text-black">Driver 1</span>
                                                <?php else : ?>
                                                    <span class="font-25px text-info">Sedang Diproses</span>
                                                <?php endif; ?>
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
                                                <th colspan="2">Mobil</th>
                                                <th>Tgl mulai</th>
                                                <th>Tgl berakhir</th>
                                                <th>Harga sewa / hari</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="d-flex align-items-center flex-nowrap"><img height="80" class="" src="<?= $transaksi['car_photo'] ?>" alt="">
                                                        <div class="ml-1 text-wrap">
                                                            <p class="font-18px w-100 font-weight-bold mb-0 ">
                                                                <?= $transaksi['car_brand'] ?></p>
                                                            <small class="mt-0 text-black-50"><?= $tipe_mobil['type_name'] ?></small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p><?= $transaksi['rent_date_start']; ?></p>
                                                </td>
                                                <td>
                                                    <p><?= $transaksi['rent_date_end']; ?></p>

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
                                <div class="alert alert-info mt-2" role="alert">
                                    <p class="text-secondary font-weight-bold">Pembayaran dapat di transfer
                                        ke nomor rekening berikut :</p><span class="ml-2 ml-md-3 text-secondary">
                                        <?= $bank['bank_name']; ?> : <?= $bank['bank_number']; ?></span>
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
                                                    <h6>Rp. <?= number_format($transaksi['rent_price'], 2, ',', '.'); ?></h6>
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