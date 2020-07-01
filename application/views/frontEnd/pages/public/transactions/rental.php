<div class="main-content rental-content">
    <?php
    $this->load->view($componentPath . "rental-banner");
    ?>

    <?php if ($this->session->flashdata('error-date')) : ?>
        <div class="alert-date-rental" data-message="<?= $this->session->flashdata('error-date') ?>"></div>
    <?php endif; ?>

    <section class="bg-white pt-6">
        <div class="container" id="container-form">
            <div class="row px-lg-4 mb-5">
                <div class="col-6 bg-secondary border border-secondary py-2 text-center my-auto ">
                    <p class=" my-auto text-primary font-18px ">Form pemesanan</p>
                </div>
                <div class="col-6 border border-secondary  py-2 text-center my-auto ">
                    <p class="my-auto text-secondary font-18px">Pembayaran</p>
                </div>
            </div>
            <form autocomplete="off" action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 pl-0">

                        <input type="hidden" value="<?= $user['user_id'] ?>" name="user_id">
                        <input type="hidden" value="<?= $car['car_id'] ?>" name="car_id">
                        <input type="hidden" value="<?= $car['car_price'] ?>" name="car_price">

                        <?php
                        if ($client->num_rows() < 1) :  ?>
                            <div class="card text-secondary border-0 shadow-none">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="card-title font-42px">Data Diri</p>
                                        <p style="cursor: pointer;" class="my-auto" data-toggle="tooltip" data-placement="left" title="Ini adalah transaksi pertama kamu... silahkan lengkapi data diri kamu terlebih dahulu">

                                            <i class=" fad fa-info-circle font-18px "></i>
                                        </p>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label for="name" class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" name="input_client" value="true">
                                            <input name="client_name" class="form-control bg-white-30" id="name" value="<?= set_value('client_name') ?>" placeholder="masukan nama lengkap...">
                                            <?= form_error('client_name', '<small style="margin-top: 3px"  class="text-danger  ml-2" >', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3"><label for="no_ktp" class="col-sm-4 col-form-label">No Identitas/ KTP</label>
                                        <div class="col-sm-8">
                                            <input name="client_no_ID" class="form-control bg-white-30" id="no_ktp" value="<?= set_value('client_no_ID') ?>" placeholder="No KTP...">
                                            <?= form_error('client_no_ID', '<small style="margin-top: 3px"  class="text-danger  ml-2" >', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3"><label for="address" class="col-sm-4 col-form-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <input name="client_address" class="form-control bg-white-30" id="address" value="<?= set_value('client_address') ?>" placeholder="Alamat Lengkap">
                                            <?= form_error('client_address', '<small style="margin-top: 3px"  class="text-danger  ml-2" >', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label for="phone" class="col-sm-4 col-form-label">No Hp</label>
                                        <div class="col-sm-8">
                                            <input name="client_phone" class="form-control bg-white-30" id="phone" value="<?= set_value('client_phone') ?>" placeholder="No telepon ">
                                            <?= form_error('client_phone', '<small style="margin-top: 3px"  class="text-danger  ml-2" >', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label for="phone" class="col-sm-4 col-form-label">Upload Foto KTP</label>
                                        <div class="col-sm-8">
                                            <input type="file" class="dropify" data-min-width="100" name="IDcard_img" id="IDcard_img" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>
                        <div class="card border-0 shadow-none">
                            <div class="card-body text-secondary">
                                <p class="card-title font-42px">Data Penyewaan</p>
                                <div class="form-group row mt-3">
                                    <label for="city" class="col-sm-4 col-form-label">Lokasi Kota</label>
                                    <div class="col-sm-8">
                                        <select name="city" class=" form-control bg-white-30 ">
                                            <option class="bg-white" disabled selected>Pilih Kota </option>
                                            <option class="bg-white" value="jakarta">Jakarta</option>
                                            <option class="bg-white" value="bogor">Bogor</option>
                                            <option class="bg-white" value="depok">Depok</option>
                                            <option class="bg-white" value="tanggerang">Tanggerang </option>
                                            <option class="bg-white" value="bekasi">Bekasi </option>
                                        </select>
                                        <?= form_error('city', '<small style="margin-top: 3px"  class="text-danger  ml-2" >', '</small>'); ?>
                                    </div>
                                </div>


                                <div class="form-group row mt-3">
                                    <label for="city" class="col-sm-4 col-form-label">Kota Tujuan</label>
                                    <div class="col-sm-8">
                                        <select id="destination" class=" bg-white-30 form-control show-menu-arrow " name="destination[]" data-title='Pilih kota tujuan anda' data-style="btn-gray text-black-50 " multiple>
                                            <option class="bg-white" value="jakarta">Jakarta</option>
                                            <option class="bg-white" value="bogor">Bogor</option>
                                            <option class="bg-white" value="depok">Depok</option>
                                            <option class="bg-white" value="tanggerang">Tanggerang </option>
                                            <option class="bg-white" value="bekasi">Bekasi </option>
                                        </select>
                                        <?= form_error('destination[]', '<small style="margin-top: 3px"  class="text-danger  ml-2" >', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label for="date_start" class="col-sm-4 col-form-label">Tgl mulai Sewa</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="date_start" class="form-control bg-white-30" id="date_start">
                                        <?= form_error('date_start', '<small style="margin-top: 3px"  class="text-danger  ml-2" >', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label for="date_end" class="col-sm-4 col-form-label">Tgl berakhir</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="date_end" class="form-control bg-white-30" id="date_end">
                                        <?= form_error('date_end', '<small style="margin-top: 3px"  class="text-danger  ml-2" >', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col-sm-4 d-flex">
                                        <label for="service_rental" class=" col-form-label ">Fasilitas
                                        </label>
                                        <a href="javascript:void(0)" class=" my-auto  " id="info-fasilitas">
                                            <i class="fad text-secondary fa-info-circle ml-1 "></i>
                                        </a>
                                    </div>

                                    <div class="col-sm-8">
                                        <select name="rent_serv" class=" form-control bg-white-30" id="service_rental">
                                            <option class="bg-white" disabled selected>Pilih Layanan</option>
                                            <option class="bg-white" value="1">Self Driver</option>
                                            <option class="bg-white" value="2"> With Driver</option>
                                            <option class="bg-white" value="3">All In </option>
                                        </select>
                                        <?= form_error('rent_serv', '<small style="margin-top: 3px"  class="text-danger  ml-2" >', '</small>'); ?>
                                    </div>
                                </div>
                                <div id="formPickUpAddress" class="form-group row mt-3 d-none ">
                                    <div class="col-sm-4 d-flex">
                                        <label data-toggle="tooltip" data-placement="top" title="Alamat penjemputan" for="service" class=" col-form-label ">Lok. jemput
                                        </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea class="form-control bg-white-30 " name="pickup_address" id="pickUpAddress" rows="3" placeholder="Masukan alamat lengkap penjemputan"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card border-0 shadow-none">
                            <div class="card-body text-secondary">
                                <p class="card-title font-42px">Pembayaran</p>
                                <div class="form-group row mt-3"><label for="method_payment" class="col-sm-4 col-form-label">Metode</label>
                                    <div class="col-sm-8 my-auto  d-flex justify-content-between ">
                                        <div>
                                            <span><i class="fas fa-check-square fa-fw"></i>
                                                ATM </span>
                                            <input name="method_pay" type="hidden" checked="checked" value="No Rekening" id="credit_card">
                                        </div>
                                        <span data-toggle="tooltip" data-placement="left" class="ml-auto" title="Maaf Metode pembayaran kami belum banyak">
                                            <i class=" fas fa-question-circle "></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row mt-3"><label for="date_end" class="col-sm-4 col-form-label">Bank</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="bank">
                                            <option disabled="disabled" selected="selected">Pilih Bank</option>
                                            <option value="BRI">BRI</option>
                                            <option value="BNI">BNI</option>
                                        </select>
                                        <?= form_error('bank', '<small style="margin-top: 3px"  class="text-danger  ml-2" >', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="card border-0 shadow-none">
                            <div class="d-flex">
                                <button type="submit" class=" text-center text-primary btn btn-secondary ml-auto ">
                                    Selanjutnya <i class=" fad fa-arrow-right "> </i>
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <p class="card-title font-42px text-secondary">Detail Sewa</p>
                                <div class="row pl-1 d-flex ">
                                    <div class="col-lg-5 order-2 order-lg-1 ">
                                        <div class="mb-n2">
                                            <p class="text-muted mb-n1">Merek :</p>
                                            <p class="ml-2 font-18px"><?= $car['car_brand'] ?></p>
                                        </div>
                                        <div>
                                            <p class="text-muted mb-0">Harga/hari :</p>
                                            <p class="ml-2 font-18px">Rp. <?= $car['car_format_price'] ?> </p>
                                        </div>
                                        <div>
                                            <p class="text-muted mb-0">Tipe :</p>
                                            <p class="ml-2 font-20px"><?= $car['type_name']  ?></p>
                                        </div>
                                        <div>
                                            <p class="text-muted mb-0">Denda :</p>
                                            <p class="ml-2 font-20px">Rp. <?= $car['car_fine'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 order-1 order-lg-2  my-auto px-0">
                                        <img class="img-fluid" src="<?= base_url('assets/uploads/cars/') . $car['car_photo'] ?>" alt="">
                                    </div>
                                    <!-- <div class="col-12 mx-auto px-4 order-3 my-2 ">
                                        <div class="d-flex">
                                            <button type="submit" class=" text-center text-primary btn btn-secondary btn-lg btn-block ">Pesan Sekarang
                                            </button>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

</div>