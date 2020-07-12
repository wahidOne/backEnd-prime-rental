<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">Transction</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">Invoice</span>
            </li>
        </ol>
    </nav>
    <div class="row pt-5 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="fad fa-fw fa-file-invoice font-26"></i>
            <span class=" font-weight-light ml-2 ">Invoice <?= $rental['rent_id']; ?></span>
        </h1>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 pl-0">
                            <a href="#" class="noble-ui-logo logo-light d-block mt-3">Prime<span>Rental</span></a>
                            <p class="mt-1 mb-1"><b>PrimeRental Invoice</b></p>
                            <p>108,<br> Great Russell St,<br>London, WC1B 3NA.</p>
                            <h5 class="mt-5 mb-2 text-muted">Invoice to :</h5>
                            <p>
                                <h4><?= $rental['client_fullname']; ?></h4><?= $rental['client_address']; ?><br><?= $rental['user_email']; ?>
                            </p>
                        </div>
                        <div class="col-lg-3">

                        </div>
                        <div class="col-lg-3 pr-0">
                            <h4 class="font-weight-medium text-uppercase text-right mt-4 mb-2">invoice</h4>
                            <h6 class="text-right mb-5 pb-4"><?= $rental['rent_id']; ?></h6>
                            <p class="text-right mb-1">Total Harga</p>
                            <h4 class="text-right font-weight-normal">Rp. <?= number_format($rental['payment_total'], 0, ',', '.'); ?></h4>
                            <h6 class="mb-0 mt-3 text-right font-weight-normal mb-2"><span class="text-muted">Tgl Mulai : </span> <?= $rental['rent_date_start']; ?></h6>
                            <h6 class="text-right font-weight-normal"><span class="text-muted">Tgl Berakhir :</span> <?= $rental['rent_date_end']; ?></h6>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kendaraan</th>
                                        <th>Type</th>
                                        <th class="text-right">No Polisi</th>
                                        <th class="text-right">Kapasitas</th>
                                        <th class="text-right">Harga Sewa / hari</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-right" style="height: 90px!important;">
                                        <td c>
                                            <div style="height: auto !important; height: 90px!important;" class="d-flex h-100 w-100 align-items-center flex-nowrap justify-content-center ">
                                                <img style="height: 80px; width:auto;" class="" src="<?= $rental['car_photo'] ?>" alt="">
                                                <div class="ml-1 text-wrap">
                                                    <p class="font-18px w-100 font-weight-bold mb-0 ">
                                                        <?= $rental['car_brand'] ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-left"><?= $tipe_mobil['type_name']; ?></td>
                                        <td><?= $rental['car_no_police']; ?></td>
                                        <td><?= $rental['car_capacity']; ?> Kursi</td>
                                        <td><?= $rental['car_price_format']; ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 w-100">
                        <div class="row">
                            <div class="col-md-6  ">
                                <div class="d-flex flex-column mb-3  ">

                                    <h5 class=" text-muted">Metode Pembayaran:</h5>
                                    <p>
                                        <?= $rental['payment_method']; ?>
                                    </p>

                                    <br>
                                    <h5 class=" mt-3 text-muted">Layanan</h5>
                                    <p><?= $rental['rent_name_service']; ?></p>
                                    <br>
                                    <?php if ($rental['rent_service'] == 2 || $rental['rent_service'] == 3) : ?>
                                        <h5 class=" mt-3 text-muted">Nama Supir</h5>
                                        <p><?= $driver['driver_name']; ?></p>
                                        <br>
                                        <h5 class=" mt-3 text-muted">Lok Jemput</h5>
                                        <p><?= $rental['rent_pickup_address']; ?></p>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td class="text-right"><?= $rental['rent_sub_total']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Supir</td>
                                                <td class="text-right"><?= $rental['rent_driver_price']; ?></td>
                                            </tr>
                                            <!-- <tr>
                                                <td class="text-bold-800">Total</td>
                                                <td class="text-bold-800 text-right"> $ 16,688.00</td>
                                            </tr> -->
                                            <tr>
                                                <td>Denda</td>
                                                <td class="text-danger text-right">Rp. 0</td>
                                            </tr>
                                            <tr class="bg-dark">
                                                <td class="text-bold-800">Total</td>
                                                <td class="text-bold-800 text-right">
                                                    Rp. <?= number_format($rental['payment_total'], 0, ',', '.'); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid w-100">
                        <a href="<?= site_url('administrator/transaction/rent') ?>" class="btn btn-info float-right mt-4 ml-2">
                            Kembali
                        </a>
                        <!-- <a href="#" class="btn btn-outline-primary float-right mt-4"><i data-feather="printer" class="mr-2 icon-md"></i>Print</a> -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>