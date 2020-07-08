<main class="dashboard--content">
    <div class="dashboard--main pb-5">
        <div class="container-fluid">
            <nav aria-label="breadcrumb  " class="bg-transparent ml-n8">
                <ol class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item text-secondary my-auto font-25px font-weight-bold">Transaksi</li>
                    <li class="breadcrumb-item active text-secondary my-auto font-20px text-capitalize " aria-current="page"><?= $user['user_name']; ?>
                    </li>
                </ol>
            </nav>



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
                <?php if ($transaksi != false) : ?>
                    <div class="col-lg-11 mx-auto mt-0">
                        <div class="card border-0 table-responsive">
                            <table class="table">
                                <thead class="thead-light " style="white-space:nowrap !important;">
                                    <tr>
                                        <th class="text-black-50 font-13px">#</th>
                                        <th class="text-black-50 font-13px">No Transaksi</th>
                                        <th colspan="2" class="text-black-50 text-center font-13px">Mobil</th>
                                        <th scope="row" class="text-black-50 font-13px">Type Sewa</th>
                                        <th class="text-black-50 font-13px">Tgl Transaksi</th>
                                        <th class="text-black-50 font-13px">Total Harga</th>
                                        <th class="text-black-50 font-13px">Status Bayar</th>
                                        <th class="text-black-50 font-13px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody style="white-space: nowrap !important;">

                                    <?php $no = 1; ?>
                                    <?php foreach ($transaksi as $tr) : ?>
                                        <tr class=" <?= $tr['payment_status'] == "Expired" ? "text-black-50 bg-white-50" : ""  ?> ">
                                            <th scope="row"><?= $no++; ?></th>
                                            <td><?= $tr['rent_id']; ?></td>
                                            <td colspan="2">
                                                <div class="d-flex align-items-center flex-row  ">
                                                    <img height="80" class="" src="<?= base_url('assets/uploads/cars/') . $tr['car_photo'] ?>" alt="">
                                                    <div class="ml-1">
                                                        <p class="font-14px w-100 mb-0 font-weight-bold"><?= $tr['car_brand']; ?></p>

                                                        <?php foreach ($car_type as $ct) : ?>
                                                            <?php if ($tr['car_type_id'] == $ct['type_id']) :  ?>
                                                                <small class="mt-0 text-black-50"><?= $ct['type_name'] ?></small>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td scope="row">
                                                <?php if ($tr['rent_type'] == 0) : ?>
                                                    <span class="font-14px  text-secondary  ">Self Drive</span>
                                                <?php else : ?>
                                                    <span class=" font-14px text-info ">With Driver</span>
                                                <?php endif ?>
                                            </td>
                                            <td><?= date('d/m/Y', strtotime($tr['rent_date']))  ?></td>

                                            <td>
                                                <span class=" font-15px ">Rp. <?= number_format($tr['rent_price'], 2, ',', '.'); ?></span>
                                            </td>
                                            <td>

                                                <?php
                                                $date_rent = strtotime($tr['rent_date']);
                                                $expired =  date('Y-m-d G:i:s', $date_rent + (24 * 3600 * 1));
                                                ?>

                                                <?php if ($tr['payment_proof'] == "" && $tr['payment_status'] == "0") : ?>
                                                    <span class="date_expired" class="d-none" data-url="<?= base_url('penyewaan/set-expired/') . $tr['rent_id']; ?>" id="date_expired" data-time="<?= date('F d, Y H:i:s', strtotime($expired)) ?>">
                                                    </span>
                                                    <span class=" badge badge-warning font-weight-light py-1 btn-sm ">
                                                        Menunggu pembayaran
                                                    </span>
                                                <?php elseif (!$tr['payment_proof'] == "" && !$tr['payment_status'] == 1) : ?>
                                                    <span class=" badge badge-info font-weight-light py-1 btn-sm ">
                                                        Menunggu Konfirmasi
                                                    </span>
                                                <?php elseif ($tr['payment_proof'] != "" && $tr['payment_status'] == 1) : ?>
                                                    <span class=" badge badge-success font-weight-light py-1 btn-sm ">
                                                        Pembayaran Selesai
                                                    </span>
                                                <?php else :  ?>
                                                    <span class="text-center py-1 badge badge-danger text-capitalize font-weight-light ">
                                                        <?= $tr['payment_status']; ?>
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="d-flex  ">
                                                    <?php if ($tr['payment_status'] == "Expired") : ?>

                                                        <a href="<?= base_url('user/' . $user['user_id'] . '/dashboard/transaksi/pembatalan?rentId=') .  $tr['rent_id'] ?>" class="btn btn-secondary btn-sm tooltip--costum ">
                                                            <i class="fad fa-info"></i>
                                                            <span class="tooltip--item text-white">Infomasi</span>
                                                        </a>

                                                    <?php else : ?>

                                                        <a href="<?= base_url('user/' . $user['user_id'] . '/dashboard/invoice/pembayaran?rentId=') .  $tr['rent_id'] ?>" class="btn btn-secondary btn-sm tooltip--costum ">
                                                            <i class="fad fa-money-check-edit-alt"></i>
                                                            <span class="tooltip--item text-white">Cek Pembayaran</span>
                                                        </a>

                                                        <?php if ($tr['payment_proof'] != "" && $tr['payment_status'] == 1) : ?>
                                                            <a href="<?= site_url('transaksi/detail/') . $tr['rent_id'] ?>" class="btn btn-secondary btn-sm tooltip--costum ml-1 ">
                                                                <i class="fad fa-file-invoice"></i>
                                                                <span class="tooltip--item text-white">Invoice pesanan</span>
                                                            </a>
                                                        <?php endif; ?>


                                                        <a href="#" class="btn btn-secondary btn-sm ml-1 tooltip--costum">
                                                            <i class="fad fa-times-octagon "></i>
                                                            <span class=" tooltip--item  text-white">Batalkan Transaksi</span>
                                                        </a>

                                                    <?php endif; ?>

                                                </div>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>

                                    <!-- <tr>
                            <th scope="row">1</th>
                            <td colspan="2">
                                <div class="d-flex align-items-center flex-nowrap"><img height="80" class="" src="dist/static/img/datsun-go.png" alt="">
                                    <div class="ml-1 text-wrap">
                                        <p class="font-14px w-100 mb-n1 font-weight-bold">Datsun Go</p>
                                        <small class="mt-0 text-black-50">Hatback</small>
                                    </div>
                                </div>
                            </td>
                            <td>Pakai Supir</td>
                            <td>20/05/2020</td>
                            <td>20/05/2020</td>
                            <td>Rp. 600.000</td>
                            <td><span class="badge badge-warning">Menunggu Pembyaran</span></td>
                            <td>
                                <div class="d-flex"><a href="invoice.html" class="btn btn-info btn-sm tooltip--costum"><i class="fad fa-file-invoice"></i> <span class="tooltip--item">invoice</span> </a><a href="#" class="btn btn-danger btn-sm ml-1 tooltip--costum"><i class="fad fa-times-octagon"></i> <span class="tooltip--item">Batalkan Transaksi</span></a></div>
                            </td>
                        </tr> -->


                                </tbody>
                            </table>
                        </div>

                    </div>
                <?php else :  ?>
                    <div class="col-lg-10 mx-auto  ">

                        <div class="card mt-2 border-0 shadow-none ">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="<?= base_url('assets/frontEnd/') ?>dist/static/svg/empty_cart.svg" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8 my-auto">
                                    <div class="card-body">
                                        <h5 class=" display-4 text-secondary ">Maaf...</h5>
                                        <p class=" font-22px text-secondary-50 ">Data transaksi anda masing kosong <i class="fas fa-sad-tear   text-secondary "></i><br>
                                            <span class=" font-18px text-secondary ">Silahkan lakukan transaksi</span>
                                        </p>
                                        <a href="<?= site_url('mobil-kami#daftar-mobil') ?>" class=" btn btn-outline-secondary rounded-pill "> Expolore now </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>


            </div>


        </div>




    </div>

    <?php $this->load->view($componentPath . "footer"); ?>
</main>