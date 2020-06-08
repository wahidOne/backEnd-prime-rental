<div class="main-content rental-content">
    <?php
    $this->load->view($componentPath . "rental-banner");
    ?>

    <section class="bg-white pt-6">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pl-0">
                    <form autocomplete="off" action="" method="POST">
                        <?php if ($costumer->num_rows() < 1) :  ?>

                            <div class="card text-secondary border-0 shadow-none">
                                <div class="card-body">
                                    <p class="card-title font-42px">Data Diri</p>
                                    <div class="form-group row mt-3"><label for="name" class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-8"><input class="form-control bg-white-30" id="name"></div>
                                    </div>
                                    <div class="form-group row mt-3"><label for="no_ktp" class="col-sm-4 col-form-label">No Identitas/ KTP</label>
                                        <div class="col-sm-8"><input class="form-control bg-white-30" id="no_ktp"></div>
                                    </div>
                                    <div class="form-group row mt-3"><label for="address" class="col-sm-4 col-form-label">Alamat</label>
                                        <div class="col-sm-8"><input class="form-control bg-white-30" id="address">
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3"><label for="phone" class="col-sm-4 col-form-label">No Hp</label>
                                        <div class="col-sm-8"><input class="form-control bg-white-30" id="phone"></div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="card border-0 shadow-none">
                            <div class="card-body text-secondary">
                                <p class="card-title font-42px">Data Penyewaan</p>
                                <div class="form-group row mt-3"><label for="city" class="col-sm-4 col-form-label">Kota</label>
                                    <div class="col-sm-8"><input class="form-control bg-white-30" id="city"></div>
                                </div>
                                <div class="form-group row mt-3"><label for="date_start" class="col-sm-4 col-form-label">Tgl mulai Sewa</label>
                                    <div class="col-sm-8"><input class="form-control bg-white-30" id="date_start">
                                    </div>
                                </div>
                                <div class="form-group row mt-3"><label for="date_end" class="col-sm-4 col-form-label">Tgl berakhir</label>
                                    <div class="col-sm-8"><input class="form-control bg-white-30" id="date_end">
                                    </div>
                                </div>
                                <div class="form-group row mt-3"><label for="name" class="col-sm-4 col-form-label">Pakai Supir</label>
                                    <div class="col-sm-8 d-flex justify-content-around">
                                        <div class="form-check form-check-driver"><input class="form-check-input" type="radio" name="with_driver" id="use_driver" value="1"> <label class="form-check-label" for="use_driver">Pakai</label></div>
                                        <div class="form-check form-check-driver"><input class="form-check-input" type="radio" name="with_driver" id="not_use" value="0"> <label class="form-check-label" for="not_use">Tidak Pakai</label></div>
                                    </div>
                                </div>
                                <div class="form-group row mt-3 hide" id="form-pickup-address"><label for="pickup_address" class="col-sm-4 col-form-label">Alamat
                                        Penjemputan</label>
                                    <div class="col-sm-8"><input name="pickup_address" class="form-control bg-white-30" id="pickup_address"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 shadow-none">
                            <div class="card-body text-secondary">
                                <p class="card-title font-42px">Pembayaran</p>
                                <div class="form-group row mt-3"><label for="method_payment" class="col-sm-4 col-form-label">Metode</label>
                                    <div class="col-sm-8 my-auto"><span><i class="fas fa-check-square fa-fw"></i>
                                            Kartu Kredit </span><input class="form-check-input" type="hidden" checked="checked" value="" id="credit_card" disabled="disabled"></div>
                                </div>
                                <div class="form-group row mt-3"><label for="date_end" class="col-sm-4 col-form-label">Bank</label>
                                    <div class="col-sm-8"><select class="form-control">
                                            <option disabled="disabled" selected="selected">Pilih Bank</option>
                                            <option>BRI</option>
                                            <option>BNI</option>
                                        </select></div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 shadow-none">
                            <div class="card-body"><button type="submit" class="px-2 text-primary btn btn-secondary ml-auto d-flex">Setuju</button></div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <p class="card-title font-42px text-secondary">Detail Sewa</p>
                            <div class="row pl-1">
                                <div class="col-md-5">
                                    <div class="mb-n2">
                                        <p class="text-muted mb-n1">Merek :</p>
                                        <p class="ml-2 font-18px"><?= $car['car_brand'] ?></p>
                                    </div>
                                    <div>
                                        <p class="text-muted mb-0">Harga/hari :</p>
                                        <p class="ml-2 font-18px">Rp. <?= $car['car_price'] ?> </p>
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
                                <div class="col-md-7 my-auto px-0"><img class="img-fluid" src="<?= base_url('assets/uploads/cars/') . $car['car_photo'] ?>" alt=""></div>
                                <div class="col-12">
                                    <div class="d-flex"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>