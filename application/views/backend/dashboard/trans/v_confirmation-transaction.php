<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">Transction</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">Confirmation Transactions</span>
            </li>
        </ol>
    </nav>
    <div class="row pt-5 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="fad fa-fw fa-check-square font-26  "></i>
            <span class=" font-weight-light ml-3 ">Confirmation Transactions</span>
        </h1>
    </div>

    <div class="row">
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="flash-success  d-none" data-status="success" data-text="<?= $this->session->flashdata('success')['text'];  ?>" data-title="<?= $this->session->flashdata('success')['title'];  ?>">
            </div>
        <?php elseif ($this->session->flashdata('info')) : ?>
            <div class="flash-success  d-none" data-status="info" data-text="<?= $this->session->flashdata('info')['text'];  ?>" data-title="<?= $this->session->flashdata('info')['title'];  ?>">
            </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
            <div class="flash-success  d-none" data-status="error" data-text="<?= $this->session->flashdata('error')['text'];  ?>" data-title="<?= $this->session->flashdata('error')['title'];  ?>">
            </div>
        <?php endif; ?>
        <form action="<?= base_url('administrators/transaction/send-confirmation-transaction') ?>" method="post">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card  ">
                            <div class="card-header">
                                <h5 class="text-uppercase  text-gray ">Persetujuan Transaksi</h5>
                            </div>
                            <div class="card-body">
                                <p class=" font-16">Anda akan melakukan konfirmasi persetujuan tranasksi pada nomor pesanan
                                    <span class="text-muted"> <?= $rental['rent_id']; ?></span>
                                </p>

                            </div>
                            <div class="card-footer text-right">
                                <a href="<?= base_url('administrator/transaction/rent') ?>" class="btn btn-danger mr-1">Batal</a>
                                <button type="submit" class="btn btn-primary">Setuju</button>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">
                                <h5 class="text-uppercase  text-gray ">Pesan Persetujuan Transaksi</h5>
                            </div>
                            <div class="card-body">

                                <input type="hidden" name="inbox_to" value="<?= $rental['user_id']  ?>">
                                <input type="hidden" name="inbox_from" value="primerental@gmail.com">
                                <input type="hidden" name="rent_id" value="<?= $rental['rent_id'] ?>">
                                <input type="hidden" name="user_id" value="<?= $rental['user_id'] ?>">
                                <input type="hidden" name="rent_service" value="<?= $rental['rent_service'] ?>">
                                <!-- <input type="hidden" name="inbox_created_at" value="primeRental@gmail.com"> -->
                                <div class="form-group mt-3">
                                    <label for="inbox_email">Kepada</label>
                                    <input type="text" class="form-control form-control-lg  text-light py-2" id="inbox_email" value="<?= $rental['user_email']  ?>" readonly>
                                </div>
                                <div class="form-group ">
                                    <label for="inbox_subject">Judul</label>
                                    <input type="text" class="form-control form-control-lg  text-light py-2" name="inbox_title" id="inbox_title" placeholder="Masukan judul " value="Persetujuan Transaksi">
                                </div>
                                <div class="form-group">
                                    <label for="inbox_subject">Subjek</label>
                                    <input type="text" class="form-control form-control-lg py-2 text-light " name="inbox_subject" id="inbox_subject" placeholder="Masukan Subject " value="Pesanan anda telah mendapat persetujaun ">
                                </div>
                                <div class="form-group">
                                    <label for="">Pesan</label>
                                    <div class="tinymce-wrap">
                                        <textarea class="tinymce" name="inbox_text" id="summernote">
                                        <div class="row">
                                            <div class="col-10 mx-auto">
                                                <br>
                                                <br>
                                                <br>
                                                <div class="d-flex flex-column justify-content-center align-items-center ">
                                                    <p class=" font-35px font-md-6 text-uppercase text-success font-w-600  ">
                                                        Terima Kasih
                                                    </p>
                                                </div>
                                                <br><br>


                                                <p class="mb-0">Halo <b><?= $rental['client_fullname'] ?></b></p>
                                                <p>Terima kasih telah menggunakan layanan kami. dan saat ini kami telah melakukan persetujuan untuk pesanan anda.
                                                </p>
                                                <br>
                                                <div class="row mt-2 mb-2">
                                                    <div class="col-6">
                                                        <div class="d-flex flex-column ">
                                                            <span class="text-black-50 font-14px font-md-15px font-w-600 ">
                                                                Untuk
                                                            </span>
                                                            <div class="d-flex flex-column ">
                                                                <span class="text-dark font-15px font-md-18px font-w-700">
                                                                    <?= $rental['client_fullname']; ?>
                                                                </span>
                                                                <span class="text-dark font-15px font-md-18px font-w-700">
                                                                    <?= $rental['user_email']; ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        <div class="d-flex flex-column flex-wrap">
                                                            <span class="text-black-50 font-14px font-md-15px font-w-600">
                                                                No Pesanan
                                                            </span>
                                                            <span class="text-dark font-17px font-md-24px font-w-700">
                                                                <?= $rental['rent_id'] ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-4 mt-2">
                                                        <div class="d-flex flex-column flex-wrap">
                                                            <span class="text-black-50 font-14px font-md-15px font-w-600">
                                                                Tgl Transaksi
                                                            </span>
                                                            <span class="text-dark font-15px font-md-18px font-w-700">
                                                                <?= date('d F Y', strtotime($rental['rent_date'])); ?>
                                                            </span>
                                                        </div>
                                                        <div class="d-flex flex-column mt-1">
                                                            <span class="text-black-50 font-14px font-md-15px font-w-600">
                                                                Waktu
                                                            </span>
                                                            <span class="text-dark font-15px font-md-18px font-w-700">
                                                                <?= $rental['days']; ?> Hari
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mt-2  ">
                                                        <span class="text-black-50 font-14px font-md-15px font-w-600">
                                                            Tgl Sewa
                                                        </span>
                                                        <div class="d-flex flex-column">
                                                            <p class="mb-0 " data-toggle="tooltip" data-placement="left" title="Tanggal Mulai">
                                                                <i class="fas font-11px fa-hourglass-start mr-1 fa-fw"></i>
                                                                <?= date('d F Y', strtotime($rental['rent_date_start'])); ?>
                                                            </p>

                                                            <p class="mb-0 text-danger " data-toggle="tooltip" data-placement="left" title="Tanggal Berakhir">
                                                                <i class="fas font-11px fa-hourglass-end mr-1 fa-fw"></i>
                                                                <?= date('d F Y', strtotime($rental['rent_date_end'])); ?>
                                                            </p>

                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-4 text-right mt-2">
                                                        <div class="d-flex flex-column flex-wrap">
                                                            <span class="text-black-50 font-14px font-md-15px font-w-600">
                                                                Layanan
                                                            </span>
                                                            <span class="text-dark font-15px font-md-18px font-w-700">
                                                                <?php if ($rental['rent_service'] == 1) :  ?>
                                                                    <span>Self Driver</span>
                                                                <?php elseif ($rental['rent_service'] == 2) :  ?>
                                                                    <span>With Driver (tanpa biaya BBM dll)</span>
                                                                <?php elseif ($rental['rent_service'] == 3) :  ?>
                                                                    <span>All in</span>
                                                                <?php endif; ?>
                                                            </span>
                                                        </div>
                                                        <div class="d-flex flex-column mt-1">
                                                            <span class="text-black-50 font-14px font-md-15px font-w-600">
                                                                Total Harga
                                                            </span>
                                                            <span>
                                                                <span class="text-info font-16px font-md-20px font-w-700">
                                                                    Rp. <?= number_format($rental['payment_total'], 0, ',', '.'); ?>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-2">
                                                    <div class="col-12">
                                                        <div class="rounded pt-3">
                                                            <table class="table">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th class="text-center">Mobil</th>
                                                                        <th>Tipe</th>
                                                                        <th>Harga sewa / hari</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-flex align-items-center flex-nowrap"><img height="80" class="" src="<?= $rental['car_photo'] ?>" alt="">
                                                                                <div class="ml-1 text-nowrap">
                                                                                    <span class="font-14px w-100 mb-0 ">
                                                                                        <?= $rental['car_brand'] ?>
                                                                                    </span>

                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <p><?= $tipe_mobil['type_name'] ?></p>
                                                                        </td>

                                                                        <td>
                                                                            <p><?= $rental['car_price_format']; ?>/hari</p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-2">
                                                        <a href="<?= base_url('user/' . $user['user_id'] . '/dashboard/invoice?rent_id=') . $rental['rent_id'] ?>" class="btn btn-success">
                                                            <i class="fas fa-file-invoice mr-1"></i> Lihat lebih Invoice
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-12">
                                                        <p class="mb-0">From</p>
                                                        <h3>PrimeRental</h3>
                                                        <br><br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="text-uppercase  text-gray ">Pilih Supir</h5>
                            </div>
                            <div class="card-body">
                                <?php if ($rental['rent_service'] == 2 || $rental['rent_service'] == 3) : ?>
                                    <div class="row selectdriver-row ">

                                    </div>
                                <?php elseif ($rental['rent_service'] == 1) :  ?>
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="alert alert-fill-info text-dark " role="alert">
                                                <i class=" fa fa-info-circle mr-2 "></i>
                                                Tidak Menggunakan Layanan Supir
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div>