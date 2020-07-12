<main class="dashboard--content bg-light ">
    <div class="dashboard--main  bg-light pb-5">
        <div class="container-fluid  ">
            <nav aria-label="breadcrumb  " class="bg-transparent ml-n8">
                <ol class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item "><a class="text-secondary my-auto font-25px font-weight-bold" href="<?= site_url('transaksi') ?>">Transaksi</a></li>
                    <li class="breadcrumb-item active text-secondary  my-auto font-23px" aria-current="page">Invoice
                    </li>
                    <li class="breadcrumb-item active text-secondary  my-auto font-20px" aria-current="page">Pembayaran
                    </li>
                    <li class="breadcrumb-item active text-secondary-50   my-auto font-18px" aria-current="page"><?= $payment['rent_id']  ?>
                    </li>
                </ol>
            </nav>

            <div class="row mt-4 px-md-3">



                <div class="col-lg-7 card-stretch">
                    <div class="card card-stretch pt-2 px-2 border-0 shadow-sm rounded-0  pb-3">

                        <div class="card-body py-2 pl-1 pl-md-2 pr-md-5 ">
                            <div class=" d-flex flex-column flex-wrap pl-md-1 ">
                                <span class="font-w-600 mb-0 font-25px ">
                                    Invoice Pembayaran
                                </span>
                                <small class="mt-0 text-black-50 ">
                                    <?php if ($payment['payment_proof'] == "" && $payment['payment_status'] == "0") : ?>
                                        Menunggu pembayaran
                                    <?php elseif (!$payment['payment_proof'] == "" && !$payment['payment_status'] == 1) : ?>
                                        Pembayaran anda sedang dikonfirmasi
                                    <?php elseif ($payment['payment_proof'] != "" && $payment['payment_status'] == 1) : ?>
                                        Pembayaran anda telah dikonfirmasi

                                    <?php endif; ?>
                                </small>
                            </div>
                            <br>
                            <div class="d-flex mt-3 justify-content-between pl-md-1 ">
                                <span class=" text-black-50 ">No Transaksi</span>
                                <span class=" font-w-600 "><?= $payment['rent_id'] ?></span>
                            </div>
                            <div class="d-flex mt-2 justify-content-between pl-md-1 ">
                                <span class=" text-black-50 ">Nama Pemesan</span>
                                <span class=" font-w-600 "><?= $payment['client_fullname'] ?></span>
                            </div>
                            <div class="d-flex mt-2 justify-content-between pl-md-1 ">
                                <span class=" text-black-50 ">Tgl pesanan</span>
                                <span class=" font-w-600 "><?= date('l, d m Y | H:i', strtotime($payment['rent_date'])) ?></span>
                            </div>
                            <hr class="my-2">
                            <div class="d-flex mt-2 justify-content-between pl-md-1 ">
                                <span class=" text-black-50 ">Metode Pembayaran</span>
                                <span class=" text-capitalize font-w-600 "><?= $payment['payment_method'] ?></span>
                            </div>

                            <div class="d-flex mt-2 justify-content-between pl-md-1 ">
                                <span class=" text-black-50 text-capitalize  ">Status</span>
                                <?php if ($payment['payment_proof'] == "" && $payment['payment_status'] == "0") : ?>
                                    <span class=" text-warning  font-w-600 "> Menunggu pembayaran</span>
                                <?php elseif (!$payment['payment_proof'] == "" && !$payment['payment_status'] == 1) : ?>
                                    <span class=" text-info font-w-600  "> Menunggu Konfirmasi</span>
                                <?php elseif ($payment['payment_proof'] != "" && $payment['payment_status'] == 1) : ?>
                                    <span class=" text-success font-w-600">Pembayaran Selesai </span>
                                <?php else : ?>
                                    <span class=" text-dark font-w-600">Pembayaran terlambat </span>
                                <?php endif; ?>
                            </div>
                            <?php if ($payment['payment_proof'] == "" && $payment['payment_status'] == "0") : ?>
                                <div class="d-flex mt-2 justify-content-between pl-md-1 ">
                                    <span class=" text-black-50 text-capitalize">Batas Waktu</span>
                                    <span class="date_expired font-w-600 " data-url="<?= base_url('penyewaan/delete/') . $payment['rent_id']; ?>" data-time="<?= date('F d, Y H:i:s', strtotime($payment['payment_expired'])) ?>">
                                        <?= date('l, d m Y | H:i ', strtotime($payment['payment_expired'])) ?>
                                    </span>
                                </div>
                                <div class="d-flex mt-2 justify-content-between pl-md-1 ">
                                    <span class=" text-black-50 text-capitalize  ">Sisa Waktu </span>
                                    <span id="remaining_time" class="font-w-600">
                                        -
                                    </span>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5 card-stretch">
                    <div class="card card-stretch pt-2 border-0 shadow-sm rounded-0 pb-3  ">

                        <div class="card-body px-2">

                            <?php if ($payment['payment_status'] == 0) :  ?>
                                <div class=" d-flex flex-column flex-wrap pl-md-1 mb-4 ">
                                    <span class="font-w-600 mb-0 font-25px ">
                                        Info
                                    </span>

                                </div>
                                <p class="px-1 text-dark ">
                                    Halo<span class="font-19px font-w-600 "> <?= $payment['client_fullname']; ?></span><br>
                                    Ini adalah beberapa no rekening bank yang dapat anda tuju untuk melakukan pembayaran, jika anda menemu beberapa kendala saat pembayaran.
                                </p>

                                <div class="d-block bg-white-30 p-2 ">
                                    <?php foreach ($allbank as $b) : ?>
                                        <div class=" my-1 text-left ">Bank <?= $b['bank_name']; ?> <span class="ml-1 text-black-50 ">(<?= $b['bank_number']; ?>)</span> </div>
                                    <?php endforeach; ?>
                                </div>

                            <?php else : ?>

                                <div class="d-flex flex-column my-auto h-100 align-items-center justify-content-center">
                                    <h1 class="text-center">
                                        <i class="fas fa-badge-check text-success fa-3x "></i>
                                    </h1>
                                    <br>
                                    <p class=" font-18pxtext-center text-success">Pembayaran anda telah Berhasil!</p>

                                </div>
                            <?php endif; ?>


                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 px-md-3">

                <div class="col-12">
                    <div class="card bg-transparent border-0 table-responsive ">
                        <table class=" table table-borderless rounded  ">
                            <thead class=" bg-secondary  rounded rounded-pill text-primary ">
                                <tr class=" rounded-bottom ">
                                    <td class=" pl-5 py-2 ">Merek</td>
                                    <td class="py-2">Gambar</td>
                                    <td class="py-2">Tipe</td>
                                    <td class="py-2 text-center ">Kapasitas</td>
                                    <td class="py-2 text-center ">Harga Sewa/ hari</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="py-1">
                                    <td colspan="4" class="py-1"></td>
                                </tr>
                            </tbody>
                            <tbody class=" py-3 px-2 shadow-sm mt-5 bg-white ">
                                <tr>
                                    <td class=" pl-5 py-3"><span class="font-20px"><?= $payment['car_brand']; ?></span></td>
                                    <td class="pt-3">
                                        <img class=" " width="200" src="<?= base_url('assets/uploads/cars/') . $payment['car_photo']  ?>" alt="">
                                    </td>
                                    <td class="pt-3">
                                        <span class="font-20px"> <?= $car_type['type_name']; ?></span>
                                    </td>
                                    <td class="pt-3 text-center">
                                        <span class="font-20px"> <?= $payment['car_capacity']; ?> Kursi</span>
                                    </td>
                                    <td class="pt-3 text-center ">
                                        <span class=" font-20px ">Rp. <?= number_format($payment['payment_total'], 0, ',', '.'); ?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="col-12 mt-3">
                    <div class="row d-flex">
                        <?php if (!$status_upload == false) :  ?>
                            <div class="col-sm-6 order-2 order-lg-1 text-md-left text-right ">
                                <button class=" btn btn-lg btn-secondary" data-toggle="modal" data-target="#modalUploadBuktiPembayaran"> <i class="fas fa-upload  fa-fw ml-1 "></i> Upload Bukti pembayaran</button>
                            </div>
                        <?php else : ?>
                            <div class="col-sm-6 order-lg-1 order-2 "></div>
                        <?php endif;  ?>
                        <div class="col-sm-6 order-1 order-lg-2 text-right ">
                            <p class="font-19px mb-0">
                                Subtotal : Rp. <?= number_format($payment['rent_subtotal'], 0, ',', '.'); ?>
                            </p>
                            <p class=" font-23px font-weight-bold text-secondary  ">Total : Rp. <?= number_format($payment['payment_total'], 0, ',', '.'); ?></p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <?php $this->load->view($componentPath . "footer"); ?>
</main>


<div class="modal fade" id="modalUploadBuktiPembayaran" tabindex="-1" role="dialog" aria-labelledby="modalUploadBuktiPembayaranLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('pembayaran/update') ?>" enctype="multipart/form-data" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUploadBuktiPembayaranLabel">Upload Bukti</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="rent_id" value="<?= $payment['rent_id'] ?>">
                    <input type="file" class="dropify" name="payment_proof" id="payment_proof" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>

            </form>
        </div>
    </div>
</div>