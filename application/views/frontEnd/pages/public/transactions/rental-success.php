<div class="main-content receipt-content bg-white">
    <section class="px-3">
        <?php
        $this->load->view($templatesPath . "navbar_top"); ?>
        <div class="col-12 pl-0 mt-4 pl-md-2">
            <h4 class="mb-n4 text-secondary font-25px">Transaksi Penyewaan</h4>
            <nav aria-label="breadcrumb px-0">
                <ol class="breadcrumb bg-transparent pl-0">
                    <li class="breadcrumb-item"><a class="text-muted" href="#">Home</a></li>
                    <li class="breadcrumb-item">Transaksi Penyewaan</li>
                    <li class="breadcrumb-item active" aria-current="page">Struk Transaksi</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-lg-10 mx-auto">
                    <div class="card pb-4 bg-white border-0 shadow pt-5" id="print">
                        <div class="card-header border-0 text-center bg-white">
                            <div class="d-flex justify-content-center align-content-center pt-5 mb-3"><i class="fad fa-5x fa-check-circle text-success"></i></div><span class="text-success font-40px">Transaksi anda berhasil</span>
                        </div>
                        <div class="card-body text-white">
                            <div class="row px-md-5">
                                <div class="col-6">
                                    <p class="text-dark mb-n2">Untuk :</p><span class="font-18px font-md-36px text-secondary">
                                        <?= $costumer['cos_name']; ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <p class="text-dark mb-n2">No transaksi</p><span class="font-18px font-md-29px text-secondary"><?= $receipt['rent_id'] ?></span>
                                </div>
                            </div>
                            <div class="row px-md-5 mt-4">
                                <div class="col-md-10">
                                    <h4 class="text-secondary">Terima Kasih Atas Pesanannya!</h4>
                                    <p class="text-dark">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        Numquam repudiandae autem ratione neque, quasi mollitia itaque nostrum</p>
                                </div>
                            </div><br><br>
                            <div class="px-md-5">
                                <div class="row px-0">
                                    <div class="col-md-4">
                                        <p class="text-dark mb-0">Tgl Transaksi :</p>
                                        <p class="text-secondary ml-2 font-24px"><?= $receipt['rent_date']; ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-dark mb-0">Waktu :</p>
                                        <p class="text-secondary ml-2 font-24px"><?= $receipt['days']; ?> Hari</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-dark mb-0">Tgl max pengembalian :</p>
                                        <p class="text-secondary ml-2 font-24px"><?= $receipt['rent_max_returned']; ?></p>
                                    </div>
                                </div>
                            </div><br><br>
                            <div class="table-responsive bg-white-30 rounded px-md-5 pt-3">
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
                                            <td class="my-auto">
                                                <p class="my-auto"><?= $receipt['car_brand']; ?></p>
                                            </td>
                                            <td><img height="97" class="" src="<?= $receipt['car_photo'] ?>" alt=""></td>
                                            <td>
                                                <p><?= date('d-m-Y', strtotime($receipt['rent_date_start'])) ?></p>
                                            </td>
                                            <td>
                                                <p><?= date('d-m-Y', strtotime($receipt['rent_date_end'])) ?></p>
                                            </td>
                                            <td>
                                                <p>
                                                    <h5><?= $receipt['car_price']; ?>/hari
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><br><br>
                            <div class="row px-md-5">
                                <div class="col-md-4">
                                    <div>
                                        <p class="text-dark mb-0">Alamat penjemputan :</p>
                                        <p class="font-weight-medium text-secondary text-secondary ml-2"><?= $receipt['rent_pickup_address'] ?></p>
                                    </div>
                                    <div>
                                        <p class="text-dark mb-0">Tipe Sewa :</p>
                                        <p class="font-weight-medium text-secondary font-22px ml-1"><?= $receipt['rent_type'] ?></p>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-6 mt-2 mt-md-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h5 class="text-black-50">Harga sewa/hari</h5>
                                                    </td>
                                                    <td>
                                                        <h5><?= $receipt['car_price']; ?>/hari</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5 class="text-black-50">Waktu</h5>
                                                    </td>
                                                    <td>
                                                        <h5><?= $receipt['days']; ?> hari</h5>
                                                    </td>
                                                </tr>
                                                <tr class="bg-white-30">
                                                    <td>
                                                        <h5 class="text-black-50">Total</h5>
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
                            <div class="card-body bg-white-30 rounded mt-2">
                                <p class="text-secondary font-weight-bold">Pembayaran dapat di transfer ke nomor
                                    rekening berikut :</p>
                                <span class="ml-2 ml-md-3 text-secondary">BRI :
                                    2000-0020-0203</span>
                            </div>
                        </div>
                        <div class="card-footer border-0 bg-white text-right">
                            <a href="<?= site_url('transaksi') ?>" class="btn btn-outline-success"><i class="fad fa-fw fa-check-double"></i>
                                Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>