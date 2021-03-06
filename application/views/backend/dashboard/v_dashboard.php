<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0 text-primary "> <i class="far fa-home fa-fw "></i> Dashboard</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
                <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
                <input type="text" class="form-control">
            </div>
            <!-- <button type="button" class="btn btn-outline-info btn-icon-text mr-2 d-none d-md-block">
                <i class="btn-icon-prepend" data-feather="download"></i>
                Import
            </button>
            <button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="printer"></i>
                Print
            </button>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                Download Report
            </button> -->
        </div>
    </div>

    <?php $this->load->view($path . '/flashmessage/flash') ?>
    <?php if ($this->session->flashdata('toastrBerhasilLogin')) : ?>
        <div class="row pb-4 ">
            <div class="col-lg-12">
                <div class=" alert shadow-lg border alert-dismissible fade show  bg-dark-costum p-sm-3  " role="alert">
                    <div class="row">
                        <div class="col-sm-7 d-flex flex-column align-content-center pt-3 ">
                            <div class="col-sm">
                                <p class="ml-1 font-20 text-primary text-capitalize ">
                                    hi, <?= $user['user_name']; ?>
                                </p>
                                <h3 class=" text-white-50 display-1 "> Selamat datang di </h3>
                                <h4 class=" text-white-50 font-weight-light display-4 "> Administrator <br> <span class="text-white   display-2 ">Prime</span><span class="text-primary display-2 ">rental
                                    </span> </h4>
                            </div>
                        </div>
                        <div class=" col-sm-4 overflow-hidden d-sm-flex  justify-content-center ">
                            <img class=" w-100 h-auto overflow-hidden" style="object-fit: cover; opacity: .7;" src="<?= base_url('assets/backend/svg/hello.svg') ?>" alt="">
                        </div>
                    </div>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Jumlah Pengunjung</h6>
                                <div class="dropdown mb-2">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">3,897</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">
                                            <span>+3.3%</span>
                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="apexChart1" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Pesanan Terbaru</h6>
                                <div class="dropdown mb-2">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">35,084</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-danger">
                                            <span>-2.8%</span>
                                            <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="apexChart2" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Pertumbuhan</h6>
                                <div class="dropdown mb-2">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">89.87%</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">
                                            <span>+2.8%</span>
                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="apexChart3" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
    <!-- row -->
    <div class="row ">
        <div class="col-lg-12 col-xl-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-2">10 Transaksi terbaru</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 pb-2">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Tanggal Transaksi</th>
                                    <th class="pt-0">Nama Penyewa</th>
                                    <th class="pt-0">Waktu Mulai</th>
                                    <th class="pt-0">Batas Waktu</th>
                                    <th class="pt-0">Type</th>
                                    <th class="pt-0">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($tenLatestTransactions as $t) :  ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= date('d/m/Y', strtotime($t['rent_date'])); ?></td>
                                        <td><?= $t['client_fullname']; ?></td>
                                        <td><?= date('d/m/Y', strtotime($t['rent_date_start'])); ?></td>
                                        <td><?= date('d/m/Y', strtotime($t['rent_date_end'])); ?></td>
                                        <?php if ($t['rent_service'] == 1) : ?>
                                            <td>Self Driver</td>
                                        <?php elseif ($t['rent_service'] == 2) : ?>
                                            <td>With Driver</td>
                                        <?php elseif ($t['rent_service'] == 3) : ?>
                                            <td>All in</td>
                                        <?php endif; ?>


                                        <?php if ($t['rent_status'] == "belum selesai" && $t['rent_order_status'] == "0" && $t['payment_proof'] == "" && $t['payment_status'] == "0") : ?>
                                            <!-- jika mengungu bukti pembayaran -->
                                            <td><span class="badge badge-danger">Menunggu pembayaran</span></td>
                                        <?php elseif ($t['rent_status'] == "belum selesai" && $t['rent_order_status'] == "0" && $t['payment_proof'] !== "" && $t['payment_status'] == "0") : ?>
                                            <!-- jika mengungu konfirmasi pembayaran -->
                                            <td><span class="badge badge-warning">Konfirmasi pembayaran</span></td>
                                        <?php elseif ($t['rent_status'] == "belum selesai" && $t['rent_order_status'] == "0" && $t['payment_proof'] !== "" && $t['payment_status'] == 1) : ?>
                                            <!-- jika pembayaran selesai -->
                                            <td><span class="badge badge-primary">Pembayaran Selesai</span></td>
                                        <?php elseif ($t['rent_status'] == "belum selesai" && $t['rent_order_status'] == 1 && $t['payment_proof'] !== "" && $t['payment_status'] == 1) : ?>

                                            <td><span class='badge badge-outlineinfo  text-info text-capitalize w-100  '>Menunggu Persetujuan</span></td>
                                        <?php elseif ($t['rent_status'] == "jalan" && $t['rent_order_status'] == 1 && $t['payment_proof'] !== "" && $t['payment_status'] == 1) : ?>
                                            <td><span class='badge badge-info text-dark text-capitalize w-100'>Sedan Jalan</span></td>
                                        <?php endif; ?>


                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /row -->

    <div class="row mt-4">
        <div class="col-lg-7 col-xl-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Kota Terlaris</h6>
                    <canvas id="kotaChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-xl-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-2">Anggota terbaru</h6>
                    </div>
                    <div class="table-responsive-xl ">
                        <table class="table table-hover">
                            <thead>
                                <th>#</th>
                                <th>Gambar</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>

                                <?php $no = 1; ?>
                                <?php foreach ($new_user as $u) : ?>
                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <td>
                                            <img src="<?= base_url('assets/uploads/ava/') . $u->user_photo ?>" alt="">
                                        </td>
                                        <td><?= $u->user_email; ?></td>
                                        <td>
                                            <div class="dropleft">
                                                <button class="btn p-0" type="button" id="user1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="user1">
                                                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">Detail</span></a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="slash" class="icon-sm mr-2"></i> <span class="">Nonaktifkan</span></a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>