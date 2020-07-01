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
                        <input type="hidden" value="ATM Transfer" name="pay_menthod">
                        <!-- <input type="hidden" value="<?= $car['car_price'] ?>" name="car_price"> -->
                        <div class="card border-0 shadow-none">
                            <div class="card-body text-secondary">
                                <p class="card-title font-42px">Pembayaran</p>
                                <div class="form-group row mt-3"><label for="method_payment" class="col-sm-4 col-form-label">Metode</label>
                                    <div class="col-sm-8 my-auto  d-flex justify-content-between ">
                                        <div>
                                            <span class=" btn btn-secondary ">
                                                <i class="fas text-white fa-credit-card-front  fa-fw mr-1"></i>
                                                ATM
                                            </span>
                                        </div>
                                        <span data-toggle="tooltip" data-placement="left" class="ml-auto" title="Maaf Metode pembayaran kami belum banyak">
                                            <i class=" fas fa-question-circle "></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label for="date_end" class="col-sm-4 col-form-label">Bank Tujuan</label>

                                    <div class="col-sm-8">
                                        <select class="form-control" name="bank" id="select-bank">
                                            <option disabled="disabled" selected="selected">Pilih Bank</option>
                                            <?php foreach ($bank as $b) :  ?>
                                                <option data-no="<?= $b['bank_number'] ?>" data-name="<?= $b['bank_name'] ?>" value="<?= $b['bank_id'] ?>">
                                                    <?= $b['bank_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                </div>

                            </div>
                        </div>



                        <div class="card border-0 shadow-none">
                            <div class="card-body text-secondary">
                                <p class="card-title font-42px">Info Sewa</p>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card card-body d-flex flex-row align-items-center justify-content-around shadow-sm ">
                                            <div class="">
                                                <i class="fas fa-sign-in-alt fa-2x"></i>
                                            </div>
                                            <div class="my-auto mt-2">
                                                <p class=" font-w-600 text-dark mb-0 font-13px ">Tanggal Mulai</p>
                                                <p class=" text-black-50 font-20px ">
                                                    <?= date("F d, Y", strtotime($invoice['rent_date_start'])); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card card-body bg-secondary  d-flex flex-row  align-items-center justify-content-around ">
                                            <div class=" ">
                                                <i style="transform: scaleX(-1);" class="fas fa-sign-out-alt text-primary fa-2x"></i>
                                            </div>
                                            <div class="my-auto mt-2 d-flex justify-content-center flex-column">
                                                <p class=" font-w-600 text-primary mb-0 font-13px ">Tanggal Berakhir</p>
                                                <p class=" text-primary-70 font-20px ">
                                                    <?= date("F d, Y", strtotime($invoice['rent_date_start'])); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                            <div class="card-body pt-0">
                                <p class="card-title font-16px text-black-50 text-uppercase font-weight-bold ">Info</p>
                                <div class="d-flex flex-column mb-2">
                                    <p class=" text-black-50 ">
                                        Untuk pembayaran anda dapet ditransfer melalui no berikut
                                    </p>

                                    <div id="info-banking" class="row px-2 ">
                                        <div id="bank-name" class=" col-auto font-20px text-info ">
                                            <span class="text-blank-50 text-danger font-15px ">*Silahkan pilih bank Tujuan!</span>
                                        </div>
                                        <div id="no-bank" class=" text-left font-20px col-auto col-offset-5 text-info ">
                                            <span class="text-black-50   text-left "></span>
                                        </div>

                                    </div>
                                </div>
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
                                <a href="<?= base_url('batalkan-transaksi?rentid=') . $invoice['rent_id'] . "&userid=" . $user['user_id']  ?>" class="btn btn-block btn-lg btn-outline-danger ">
                                    Batalkan
                                </a>
                            </div>
                            <div class="col-6">
                                <button disabled id="btn-submit" type="submit" class=" btn-block text-wrap  btn btn-success  btn-lg ">
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