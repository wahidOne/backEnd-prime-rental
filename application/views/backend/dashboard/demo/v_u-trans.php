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

    <div class="row mt-5">
        <div class="col-sm-12">
            <?php if ($rent == []) :  ?>
                <div class="col-10 mx-auto">
                    <div class="card">
                        <div class="card-body text-center ">

                            <h5 class=" text-center mb-4">Anda Belum Melakukan Transaksi</h5>
                            <a class="text-center mt-3" style="text-decoration: underline" href="<?= base_url('administrator/rental') ?>">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>

            <?php else :  ?>

                <div class="card stretch-card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Transaksi Anda
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table table-striped ">
                                <thead>
                                    <th>#</th>
                                    <th>Tgl Transaksi</th>
                                    <th>Nama</th>
                                    <th>Mobil</th>
                                    <th>Harga sewa/hari </th>
                                    <th>Total harga</th>
                                    <th>Info</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <!-- <?php $no = 1; ?>
                                    <?php foreach ($rent as $r) : ?> -->

                                    <tr>
                                        <td>
                                            <?= $no++; ?>
                                        </td>
                                        <td>
                                            <?= $r['rent_date']; ?>
                                        </td>
                                        <td class=" text-capitalize "><?= $cos['cos_name']; ?></td>
                                        <td><?= $r['car_brand']; ?></td>
                                        <td><?= $r['rent']; ?></td>
                                        <td>Rp. <?= number_format($r['car_price'], 0, ',', '.'); ?></td>
                                        <td>Rp. <?= number_format($r['rent_price'], 0, ',', '.'); ?></td>
                                    </tr>

                                    <!-- <?php endforeach; ?> -->

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            ban

        </div>

    </div>
</div>