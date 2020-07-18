<div class="main-content rental-content">
    <?php
    $this->load->view($componentPath . "rental-banner");
    ?>

    <?php if ($this->session->flashdata('error-date')) : ?>
        <div class="alert-date-rental" data-message="<?= $this->session->flashdata('error-date') ?>"></div>
    <?php endif; ?>
    <section class="bg-white pt-6">
        <div class="container" id="container-form">
            <div class="row px-4 mb-5">
                <div class="col-6  border border-secondary  py-2 text-center my-auto ">
                    <p class=" my-auto text-secondary font-16px font-md-18px text-wrap ">Form pemesanan</p>
                </div>
                <div class="col-6 bg-secondary border border-secondary   py-2 text-center my-auto ">
                    <p class="my-auto text-primary font-18px">Pembayaran</p>
                </div>
            </div>
            <form autocomplete="off" action="<?= base_url('tambah-transaksi') ?>" method="POST">
                <div class="row">
                    <div class="col-lg-6 pl-0">
                        <input type="hidden" value="<?= $user['user_id'] ?>" name="user_id">
                        <input type="hidden" value="<?= $invoice['rent_id'] ?>" name="rent_id">
                        <input type="hidden" value="<?= $invoice['rent_total'] ?>" name="total_price">
                        <input type="hidden" value="<?= $invoice['rent_driver_price']; ?>" name="driver_price">
                        <input type="hidden" value="<?= $invoice['days'] ?>" name="rent_time">
                        <input type="hidden" value="BANK TRANSFER" name="pay_menthod">
                        <!-- <input type="hidden" value="<?= $car['car_price'] ?>" name="car_price"> -->
                        <div class="card border-0 shadow-none mt-4">
                            <p class="card-title font-30px font-w-600 text-uppercase mb-0 ">Metode Pembayaran</p>
                            <hr class="mb-0">
                            <div class="card-body text-secondary  text-secondary mt-2 ">
                                <div class="row pl-2 font-23px ">
                                    <div class="col-1">
                                        <i class="fas fa-dot-circle text-secondary-50  "></i>
                                    </div>
                                    <div class="col-auto">
                                        <span class=" font-w-600 ">Bank Transfer</span><br><br>
                                    </div>
                                    <div class="col-1 ml-auto ">
                                        <span data-toggle="tooltip" data-placement="left" class="ml-auto" title="Maaf Metode pembayaran kami belum banyak">
                                            <i class=" fas fa-question-circle text-secondary "></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="row pl-3">
                                    <div class="col-12">
                                        Daftar Bank yang dapat dituju anda untuk melakukan transfer
                                    </div>

                                    <div class="col-12">
                                        <div class="row mt-2">
                                            <?php foreach ($bank as $b) :  ?>
                                                <div class="col-md-6 mt-2 ">
                                                    <div class="card  card-body pb-1">
                                                        <h5><?= $b['bank_name']; ?></h5>
                                                        <p class=" text-secondary-50 ">
                                                            <?= $b['bank_number']; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 ml-auto mt-7 ">
                        <div class="card border-0 shadow-sm pt-2">

                            <div class="card-body pt-0 mb-0  ">
                                <p class="card-title font-16px text-black-50 text-uppercase font-weight-bold ">Detail Pembayaran</p>
                                <table class=" table table-borderless mt-0">
                                    <tbody>
                                        <tr>
                                            <td class=" text-secondary ">Sub Total</td>
                                            <?php  ?>
                                            <td class="text-right">Rp. <?= number_format($invoice['rent_price'], 0, ',', '.'); ?> </td>
                                        </tr>
                                        <tr>
                                            <td class=" text-secondary ">Total harga Supir</td>
                                            <td class="text-right">Rp. <?= number_format($invoice['rent_driver_price'], 0, ',', '.');; ?> </td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="border-top ">
                                        <tr>
                                        <tr>
                                            <td class=" text-black ">Total Bayar</td>
                                            <td class="text-right">Rp. <?= number_format($invoice['rent_total'], 0, ',', '.');  ?> </td>
                                        </tr>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="card-body">
                                <div class="d-flex bg-white-30 px-2 pt-1 align-items-center justify-content-center flex-column">
                                    <p class="text-center text-uppercase font-20px mb-0 "><?= date("l"); ?></p>
                                    <p class="mt-1 ">
                                        <?= date("F d, Y | h:i A"); ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-6">
                                <a href="<?= base_url('batal-lanjut-pesan?rent_id=') . $invoice['rent_id']  ?>" class="btn btn-block btn-lg btn-outline-secondary ">
                                    Batalkan
                                </a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class=" btn-block text-wrap  btn btn-secondary  btn-lg ">
                                    <span class=" my-auto ">Sewa Sekarang</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

</div>