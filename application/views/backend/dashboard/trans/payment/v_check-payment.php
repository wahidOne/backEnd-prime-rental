<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">Transction</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">Check Payments</span>
            </li>
            <li class=" breadcrumb-item   mt-auto" aria-current="page"><span class="font-14 text-primary-muted font-weight-bold "><?= $payment['rent_id']; ?></span>
            </li>
        </ol>
    </nav>
    <div class="row pt-5 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="fad fa-fw fa-hand-holding-usd   font-26  "></i>
            <span class=" font-weight-light ml-3 "><?= $title; ?></span>
        </h1>
    </div>

    <div class="row mt-2">
        <?php if ($payment['payment_status'] == 0) : ?>
            <div class="col-md-6 grid-margin stretch-card ">

                <div class="card card-body pt-5 text-center d-flex flex-column align-items-center justify-content-center ">
                    <?php if ($payment['payment_proof'] == "") : ?>
                        <i class="fas fa-heart-rate fa-5x text-warning "></i>

                        <h4 class=" mt-4 text-warning font-weight-light ">Menunggu Pembayaran</h4>
                        <p class="mt-3 text-white-50 ">
                            Belum ada file bukti pembayaran yang di upload oleh pemesan
                        </p>
                        <div class=" d-flex justify-content-center mt-3 " id="time_left">
                            <p class=" font-weight-light text-info mr-2">Sisa Waktu : </p>
                            <div class="spinner-border text-info spinner-border-sm my-auto " role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    <?php else : ?>
                        <i class="fas fa-check-circle  fa-5x text-success "></i>

                        <h4 class=" mt-4 text-success font-weight-light ">Bukti telah Diupload</h4>
                        <p class="mt-3 text-white-50 ">
                            File bukti pembayaran sudah tersedia, Silahkan download bukti pembayaran
                        </p>
                        <a href="<?= site_url('administrator/transaction/download-payment-proof/') . $payment['rent_id']  ?>" class=" btn btn-success btn-lg mt-4 py-2 w-75 mx-auto "> <i class="fas fa-fw fa-file-download mr-1"></i> <span> Download Bukti Bayar</span> </a>
                    <?php endif; ?>

                </div>
            </div>
        <?php endif; ?>
        <div class="col-12 col-md-6 grid-margin stretch-card ">
            <div class="card card-body py-5 px-2">
                <div class="col-md-10 mx-auto ">

                    <?php if ($payment['payment_status'] == 1 && $payment['payment_proof'] != "") : ?>
                        <div class="d-flex flex-column justify-content-center align-items-center ">
                            <i class="fas fa-check-circle text-success fa-5x  "></i>
                            <h4 class=" text-success mt-3 display-5 font-weight-light  ">Pembayaran Telah Terkonfirmasi</h4>
                        </div>
                    <?php endif; ?>
                    <br><br>
                    <div class="d-flex flex-column flex-md-row   justify-content-between">
                        <h5 class=" text-primary-muted ">No pesanan</h5>
                        <h5 class="  mt-1 mt-md-0   font-weight-light"><?= $payment['rent_id']; ?></h5>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between  flex-column flex-md-row   ">
                        <h5 class=" text-primary-muted ">Nama Pemesan</h5>
                        <h5 class=" mt-1 mt-md-0  font-weight-light"><?= $payment['client_fullname']; ?></h5>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between  flex-column flex-md-row  ">
                        <h5 class=" text-primary-muted ">Tgl pesanan</h5>
                        <h5 class="  mt-1 mt-md-0 font-weight-light"><?= date("l, d m Y | H:i:s", strtotime($payment['rent_date'])); ?></h5>
                    </div>
                    <br>
                    <!-- <hr class=" border-top my-3 "> -->
                    <div class="d-flex justify-content-between  flex-column flex-md-row  ">
                        <h5 class=" text-primary-muted ">Metode Pembayaran</h5>
                        <h5 class="  mt-1 mt-md-0 font-weight-light"><?= $payment['payment_method']; ?></h5>
                    </div>

                    <?php if ($payment['payment_proof'] == "" && $payment['payment_status'] == 0) : ?>
                        <br>
                        <div class="d-flex justify-content-between flex-column flex-md-row  ">
                            <h5 class=" text-primary-muted ">Batas Waktu</h5>
                            <h5 data-time="<?= date('F d, Y H:i:s', strtotime($payment['payment_expired'])) ?>" class="  mt-1 mt-md-0 date_exp font-weight-light"><?= date("l, d m Y | H:i:s", strtotime($payment['payment_expired'])); ?></h5>
                        </div>
                        <br>

                        <div class="d-flex justify-content-between flex-column flex-md-row ">
                            <h4 class=" text-primary-muted ">Total</h4>
                            <h4 class=" mt-1 mt-md-0 font-weight-light">Rp. <?= number_format($payment['payment_total'], 2, ',', '.'); ?></h4>
                        </div>
                        <hr class=" border-top ">

                    <?php elseif ($payment['payment_proof'] != "" && $payment['payment_status'] == 0) :  ?>

                        <hr class=" border-top ">
                        <div class="d-flex justify-content-between flex-column flex-md-row ">
                            <h4 class=" text-primary-muted ">Total</h4>
                            <h4 class=" mt-1 mt-md-0 font-weight-light">Rp. <?= number_format($payment['payment_total'], 2, ',', '.'); ?></h4>
                        </div>
                        <div class="d-flex justify-content-end mt-3 flex-column flex-md-row ">
                            <button type="button" class="btn btn-danger mr-2 text-dark" data-toggle="modal" data-target="#declinePayment">
                                <i class="fas fa-times fa-fw text-dark"></i> Tolak
                            </button>
                            <button type="button" class="btn btn-primary text-dark" data-toggle="modal" data-target="#confirmPayment">
                                <i class="fas fa-check fa-fw text-dark "></i> Konfirmasi
                            </button>
                        </div>
                    <?php else : ?>
                        <br>
                        <div class="d-flex justify-content-between  flex-column flex-md-row  ">
                            <h5 class=" text-primary-muted ">Tgl Konfirmasi</h5>
                            <h5 class="  mt-1 mt-md-0 font-weight-light"><?= date("l, d m Y | H:i:s", strtotime($payment['payment_date_confirm'])); ?></h5>
                        </div>
                        <br>
                        <div class="d-flex justify-content-between flex-column flex-md-row ">
                            <h4 class=" text-primary-muted ">Total</h4>
                            <h4 class=" mt-1 mt-md-0 font-weight-light">Rp. <?= number_format($payment['payment_total'], 2, ',', '.'); ?></h4>
                        </div>

                    <?php endif; ?>


                </div>
            </div>

        </div>
    </div>
</div>


<?php
$data = [
    'user' => $user,
    'payment' => $payment,
];

$this->load->view($viewsDashboardPath . 'trans/payment/modal-confirm-success', $data);
$this->load->view($viewsDashboardPath . 'trans/payment/modal-confirm-decline', $data);
?>