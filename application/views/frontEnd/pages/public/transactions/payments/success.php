<div class="main-content bg-white ">
    <section class="px-3">
        <?php
        $this->load->view($templatesPath . "navbar_top"); ?>
        <div class="col-12 pl-0 mt-4 pl-md-2">
            <h4 class="mb-n4  font-25px">Pembayaran berhasil</h4>
            <nav aria-label="breadcrumb px-0">
                <ol class="breadcrumb bg-transparent pl-0">
                    <li class="breadcrumb-item"><a class="text-muted " href="#">Transaksi</a></li>
                    <li class="breadcrumb-item ">Pembayaran</li>
                    <li class="breadcrumb-item active  " aria-current="page">Berhasil</li>
                </ol>
            </nav>
        </div>

        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-lg-6 col-md-8 mx-auto ">
                    <div class="card border-0 shadow card-body pb-6 pt-4">
                        <div class="d-flex justify-content-center flex-column align-items-center ">
                            <a href="<?= site_url('user/' . $user['user_id'] . '/dashboard/transaksi-saya') ?>" class=" nav-link ml-auto " data-toggle="tooltip" data-placement="left" title="Kembali Ke Halaman Transaksi">
                                <i class="far fa-times fa-2x text-dark "></i>
                            </a>
                            <i class="far fa-check-circle  text-success fa-5x "></i>
                            <p class=" font-18px font-w-600 font-arial font-md-30px text-success mt-3 ">Upload Berhasil!</p>

                        </div>
                        <div class="d-flex  px-md-4 mt-2 flex-column align-items-center justify-content-center ">
                            <p class=" text-dark font-md-25px font-w-400 text-center ">Upload bukti pembayaran anda berhasil.</p>
                            <p class=" font-md-15px text-center ">Untuk Konfirmasi dari kami, kami akan mengirimnya melalui <span class=" font-w-500 "> <?= $user['user_email']; ?> </span> atau inbox anda</p>

                        </div>
                        <div class="d-flex flex-column align-items-center col-md-9 justify-content-center mx-auto ">
                            <table class="mt-2  table table-borderless   ">
                                <tbody class="pb-0">
                                    <?php $classleft = "text-dark pb-1 text-left font-13px font-md-15px font-arial text-capitalize font-w-600";
                                    $classRight = " text-dark pb-1 font-13px font-md-15px font-w-400 font-arial text-right ";
                                    ?>
                                    <tr class="">
                                        <td class="<?= $classleft ?>">Tgl Pembayaran</td>
                                        <td class="<?= $classRight ?>"><?= date('l, d-m-Y', $payment['payment_date']); ?></td>
                                    </tr>

                                    <tr>
                                        <td class="<?= $classleft ?>">Nama Klien</td>
                                        <td class="<?= $classRight ?>"><?= $payment['user_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="<?= $classleft ?>">No Transaksi</td>
                                        <td class="<?= $classRight ?>"><?= $payment['rent_id']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="<?= $classleft ?>">Metode Bayar</td>
                                        <td class="<?= $classRight ?>"><?= $payment['payment_method']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="<?= $classleft ?>">Kendaraan</td>
                                        <td class="<?= $classRight ?>"><?= $payment['car_brand']; ?></td>
                                    </tr>

                                    <tr>
                                        <td class=" text-dark font-weight-bold text-left font-md-18px   font-arial text-capitalize ">Total</td>
                                        <td class=" text-right text-dark font-weight-bold font-md-18px  ">Rp. <?= number_format($payment['payment_total'], 2, ',', '.'); ?></td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>
            </div>
        </div>




    </section>
</div>