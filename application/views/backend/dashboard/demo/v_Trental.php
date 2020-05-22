<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">page</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">Rental Transaction</span>
            </li>
        </ol>
    </nav>

    <?php if ($this->session->flashdata('pesan-tgl')) : ?>
        <div class="error-message" data-pesan="<?= $this->session->flashdata('pesan-tgl') ?>">
        </div>
    <?php endif; ?>



    <div class="row pt-5 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="fad fa-fw fa-handshake-alt font-26  "></i>
            <span class=" font-weight-light ">Rental Transaction</span>
        </h1>
    </div>


    <div class="row">

        <div class="col-lg-8">

            <form action="<?= site_url('admistrator/rental/add-rental'); ?>" method="POST">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" class="form-control" name="car_id" value="<?= $car['car_id']; ?>">
                        <input type="hidden" class="form-control" name="user_id" value="<?= $user['user_id']; ?>">
                        <input type="hidden" class="form-control" name="denda" value="<?= $car['car_fine']; ?>">
                        <input type="hidden" class="form-control" name="car_price" value="<?= $car['car_price']; ?>">
                        <div class="form-group row">
                            <label class="form-control-label col-md-3">
                                Merk Mobil
                            </label>
                            <div class="col-md-9">
                                <input readonly type="text" class="form-control bg-transparent text-primary" value="<?= $car['car_brand']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-control-label col-md-3">
                                Harga Sewa / Hari
                            </label>
                            <div class="col-md-9">
                                <input readonly type="text" class="form-control bg-transparent text-primary " value="<?= $car['car_format_price']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-control-label col-md-3">
                                Denda / Hari
                            </label>
                            <div class="col-md-9">
                                <input readonly type="text" class="form-control bg-transparent text-primary " value="<?= $car['car_format_fine']; ?>">
                            </div>
                        </div>
                        <div class="form-group row my-n3 ">
                            <label class="form-control-label col-md-3">
                                Supir
                            </label>
                            <div class="col-md-9 d-flex ">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="supir" id="pakai" value="1">
                                        Pakai
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="supir" id="tidak" value="0">
                                        Tidak Pakai
                                        <i class="input-frame"></i></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kota" class="form-control-label col-md-3  ">Kota</label>
                            <div class="col-md-9">
                                <select name="kota" class="form-control col-md-12" id="kota">
                                    <option disabled selected>-- Pilih Kota --</option>
                                    <?php foreach ($city as $c) : ?>

                                        <option value="<?= $c; ?>"><?= $c; ?></option>


                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-md-3 form-control-label  ">Alamant Penjemputan</label>
                            <div class="col-md-9">
                                <input type="text" name="alamat" class="form-control" id="alamat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="form-control-label col-md-3">Tanggal Mulai Sewa</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input name="tgl_mulai_sewa" type="date" class="form-control text-primary ">
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="form-control-label col-md-3">Tanggal Berakhir</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input name="tgl_akhir_sewa" type="date" class="form-control text-primary ">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-end ">
                        <a href="<?= site_url('administrator/rental') ?>" class=" btn btn-outline-danger ">Batalkan</a>
                        <button type="submit" class=" btn btn-outline-primary ml-2 ">Setuju</button>
                    </div>



                </div>
            </form>
        </div>

    </div>
</div>