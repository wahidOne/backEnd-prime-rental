<main class="dashboard--content bg-light ">
    <div class="dashboard--main  bg-light pb-5">
        <div class="container-fluid  ">
            <nav aria-label="breadcrumb  " class="bg-transparent ml-n8">
                <ol class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item "><a class="text-secondary my-auto font-25px font-weight-bold" href="<?= site_url('transaksi') ?>">Transaksi</a></li>
                    <li class="breadcrumb-item active text-secondary  my-auto font-23px" aria-current="page">Informasi
                    </li>
                    <li class="breadcrumb-item active text-secondary  my-auto font-20px" aria-current="page">Tolak
                    </li>
                    <li class="breadcrumb-item active text-secondary-50   my-auto font-18px" aria-current="page"><?= $payment['rent_id']  ?>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row mt-4 px-md-3">
            <div class="col-md-9 col-lg-7">
                <div class="card card-body border-0 shadow-sm pt-5 pb-4 px-md-4 ">
                    <div class="d-flex flex-column align-items-center mb-5 ">
                        <i class=" far fa-times-circle fa-5x text-danger "></i>
                        <h4 class="mt-2 text-danger ">Pembatalan Transaksi</h4>
                    </div>
                    <h4 class="card-title">Hay <?= $payment['client_fullname']; ?></h4>
                    <p>Maaf pesanan anda atas no pesanan <span class="  font-w-600 font-20px"><?= $payment['rent_id']; ?></span> terpaksa kami tolak. <br> Dikarenakan anda telah terlambat melakukan pembayaran sesuai batas waktu yg ditentukan </p>
                    <hr>
                    <p class="mb-0">Berikut adalah info pesanan yang kami tolak</p>
                    <ul class="list-group list-group-flush mt-3 w-80 ">
                        <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                            <span class=" font-w-600">No Transaksi</span>
                            <span class="  ">
                                <?= $payment['rent_id']; ?>
                            </span>
                        </li>

                        <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                            <span class=" font-w-600">Nama Pemesan</span>
                            <span class="  ">
                                <?= $payment['client_fullname']; ?>
                            </span>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                            <span class=" font-w-600">Tgl Pesanan</span>
                            <span class="  ">
                                <?= date("l , d F Y ", strtotime($payment['rent_date'])); ?>
                            </span>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                            <span class=" font-w-600">Kendaraan</span>
                            <span class="  ">
                                <?= $payment['car_brand']; ?>
                            </span>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between align-items-center">
                            <span class=" font-w-700">Total Harga</span>
                            <span class="  ">
                                Rp . <?= number_format($payment['rent_price'], 2, ',', '.'); ?>
                            </span>
                        </li>

                    </ul>


                    <form class=" w-100 text-sm-center " action="<?= base_url('user/' .  $user['user_id'] . '/dashboard/transaksi/konfirmasi-pembatalan') ?>" method="post">
                        <input type="hidden" name="rent_id" value="<?= $payment['rent_id'] ?>">
                        <input type="hidden" name="user_id" value="<?= $payment['user_id'] ?>">
                        <input type="hidden" name="message" value="Keterlambatan pembayaran">
                        <button type="submit" class="btn btn-danger w-50 mx-auto mt-4 " data-toggle="tooltip" data-placement="top" title="Klik tombol ini untuk konfirmasi pembatalan">
                            Konfirmasi
                        </button>
                    </form>


                </div>
            </div>
        </div>

    </div>


    <?php $this->load->view($componentPath . "footer"); ?>
</main>