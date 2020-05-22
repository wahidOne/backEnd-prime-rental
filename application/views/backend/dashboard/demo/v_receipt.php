<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">page</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">Receipt</span>
            </li>
        </ol>
    </nav>





    <div class="row mt-5 mb-5">

        <div class="col-lg-10 mx-auto">
            <div class="card pb-4 " id="print">
                <div class="card-header border-0 text-center">
                    <div class="d-flex justify-content-center align-content-center pt-3 mb-3 ">
                        <i class="fad fa-5x  fa-check-circle text-success "></i>
                    </div>
                    <span class=" text-success display-5  ">Transaksi anda berhasil</span>
                    <p class="display-3 mt-3 text-primary">
                        Receipt
                    </p>
                </div>
                <div class="card-body text-white">
                    <div class="row px-md-5 ">
                        <div class="col-6">
                            <h5 class=" font-weight-bold text-muted  ">Untuk : </h5>
                            <span class=" display-4 "><?= $costumer['cos_name']; ?></span>
                        </div>
                        <div class="col-6 text-right">
                            <h5 class=" font-weight-bold text-muted ">No transaksi </h5>
                            <span class=" display-5 mt-2 "><?= $receipt['rent_id']; ?></span>
                        </div>
                    </div>
                    <div class="row px-md-5 mt-4">
                        <div class="col-10 ">
                            <h4 class=" text-light ">Terima Kasih Atas Pesanannya!</h4>
                            <p class=" text-white-50 mt-2 ">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Numquam repudiandae autem ratione neque, quasi mollitia itaque nostrum</p>
                        </div>
                    </div>
                    <br><br>
                    <div class="px-md-5">
                        <div class="row px-0">
                            <div class="col-4 ">
                                <p class=" text-muted font-weight-bold ">Tgl Transaksi :</p>
                                <p class=" display-5 ml-1 "><?= $receipt['rent_date']; ?></p>
                            </div>

                            <div class="col-4 ">
                                <p class=" text-muted font-weight-bold ">Waktu :</p>
                                <p class=" display-5 ml-1 "><?= $receipt['days']; ?> Hari</p>
                            </div>
                            <div class="col-4">
                                <p class=" text-muted font-weight-bold ">Tgl max pengembalian :</p>
                                <p class=" display-5 ml-1 "><?= $receipt['rent_max_returned']; ?></p>
                            </div>
                        </div>

                    </div>
                    <br>
                    <br>
                    <div class="table-responsive bg-dark rounded px-md-5 pt-3 ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Merk Mobil</th>
                                    <th>Image</th>
                                    <th>Tgl mulai</th>
                                    <th>Tgl berakhir</th>
                                    <th>Harga sewa / hari</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h5><?= $receipt['car_brand']; ?></h5>
                                    </td>
                                    <td>
                                        <img class=" img-lg rounded-0 h-5  w-auto " src="<?= $receipt['car_photo'] ?>" alt="">
                                    </td>
                                    <td>
                                        <h5><?= date('d-m-Y', strtotime($receipt['rent_date_start'])) ?></h5>
                                    </td>
                                    <td>
                                        <h5><?= date('d-m-Y', strtotime($receipt['rent_date_end'])) ?></h5>
                                    </td>
                                    <td>
                                        <h5><?= $receipt['car_price']; ?>/hari</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <br><br>
                    <div class="row px-md-5 ">
                        <div class="col-4 ">
                            <h4 class="  text-muted font-weight-bold">Alamat penjemputan</h4>
                            <p class=" font-weight-medium text-white ml-1">
                                <?= $receipt['rent_address'] ?>
                            </p>
                            <h4 class="  text-muted font-weight-bold mt-2">Supir</h4>
                            <p class=" font-weight-medium text-white ml-1">
                                <?= $receipt['rent_type'] ?>
                            </p>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table ">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h5 class=" text-muted ">Harga sewa/hari</h5>
                                            </td>
                                            <td>
                                                <h5><?= $receipt['car_price']; ?> hari</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class=" text-muted ">Waktu</h5>
                                            </td>
                                            <td>
                                                <h5><?= $receipt['days']; ?> hari</h5>
                                            </td>
                                        </tr>
                                        <tr class=" bg-dark">
                                            <td>
                                                <h5 class=" text-muted ">Total</h5>
                                            </td>
                                            <td>
                                                <h5><?= $receipt['rent_price']; ?></h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="<?= site_url('admistrator/rental/reset-receipt') ?>" class="btn btn-outline-success"><i class="fad fa-fw fa-check-double "></i> Checkout </a>
                </div>
            </div>


        </div>

    </div>
</div>