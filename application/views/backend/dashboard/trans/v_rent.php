<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">Transction</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">Rental</span>
            </li>
        </ol>
    </nav>
    <div class="row pt-5 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="fad fa-fw fa-handshake-alt  font-26  "></i>
            <span class=" font-weight-light ml-3 ">Rental</span>
        </h1>
    </div>

    <div class="row">
        <div class="d-none">
            <?php var_dump($this->session->flashdata('success')); ?>
        </div>
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="flash-success  d-none" data-status="success" data-text="<?= $this->session->flashdata('success')['text'];  ?>" data-title="<?= $this->session->flashdata('success')['title'];  ?>">
            </div>
        <?php elseif ($this->session->flashdata('info')) : ?>
            <div class="flash-info  d-none" data-status="info" data-text="<?= $this->session->flashdata('info')['text'];  ?>" data-title="<?= $this->session->flashdata('info')['title'];  ?>">
            </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
            <div class="flash-error  d-none" data-status="error" data-text="<?= $this->session->flashdata('error')['text'];  ?>" data-title="<?= $this->session->flashdata('error')['title'];  ?>">
            </div>
        <?php endif; ?>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex">
                        <!-- <button type="button" class="btn btn-primary tambahMenu" data-toggle="modal" data-target="#modal-tambah-menu">Tambah Menu</button> -->


                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped pb-3" id="table-rent" data-url="<?= site_url('administrator/transaction/load-rent') ?>">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Tgl. Sewa</th>
                                    <th>No Pesanan</th>
                                    <th>Kostumer</th>
                                    <th>Mobil</th>
                                    <th>Total Harga</th>
                                    <th>Jenis Layanan </th>
                                    <th>Status</th>
                                    <th>Konfirmasi</th>
                                    <th class="text-center">More</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="detail-modal" class="modal fade d-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-capitalize font-weight-bold ">Modal title</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="container-modal" class="container-fluid mt-4 w-100 pb-4">

                </div>
            </div>

        </div>
    </div>
</div>