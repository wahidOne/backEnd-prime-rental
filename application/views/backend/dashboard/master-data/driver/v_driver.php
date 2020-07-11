<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">Master Data</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">Cars</span>
            </li>
        </ol>
    </nav>
    <div class="row pt-5 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="far fa-fw fa-cars font-26  "></i>
            <span class=" font-weight-light ml-3 ">Data Drivers</span>
        </h1>
    </div>
    <div class="row">


        <div class="col-lg-10 grid-margin stretch-card">
            <div class="card pt-4 ">
                <div class="card-header ">
                    <div class="d-flex">
                        <button type="button" class="btn btn-primary" id="btn-insert">
                            <i class="fas fa-plus"></i>
                            Manual Insert
                        </button>
                        <button type="button" class="btn btn-outline-primary ml-2" id="btn-generate">
                            <i class="fas fa-plus "></i>
                            Auto Insert
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover " id="table-driver" data-load="<?= site_url('administrator/master-data/load-drivers') ?>">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
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


<div class="modal fade" id="modal-insert" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Driver</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="" id="form-inserdata">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama lengkap</label>
                                <input type="text" class=" form-control" data-post="true" name="driver_name" placeholder="Masukan Nama Lengkap ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">User Name</label>
                                <input type="text" class=" form-control" data-post="true" name="user_name" placeholder="Masukan username ">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class=" form-control" data-post="true" name="user_email" placeholder="Masukan Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class=" form-control" data-post="true" name="user_password" placeholder="Masukan Password ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">No Hp</label>
                                <input type="text" class=" form-control" data-post="true" name="driver_phone" placeholder="Masukan Nomor Hp ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">No KTP</label>
                                <input type="text" class=" form-control" data-post="true" name="driver_ID_number" placeholder="Masukan Nomor KTP ">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal Detail -->

<!-- Modal -->
<div class="modal fade " id="modalDetailDriver" tabindex="-1" role="dialog" aria-labelledby="modalDetailDriverTitle" aria-hidden="true">
    <div class="modal-dialog   modal-lg " role="document">
        <div class="modal-content ">

            <div class="modal-body">
                <form action="" method="POST" id="form-update">
                    <div class="container">
                        <div class="row px-2 py-4 px-md-3">
                            <div class="col-lg-4">
                                <div class="d-flex flex-column flex-wrap align-items-center justify-content-between ">
                                    <div class=" mx-auto mb-4 mt-3 ">
                                        <img id="driver-ava" class="" src="" alt="">
                                    </div>
                                    <div class="px-3 d-flex">
                                        <button id="button-status" type="button" class="btn btn-info rounded-pill btn-block  ">
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                    </div>

                                    <button id="btn-edit" type="button" class=" btn bg-transparent text-muted mt-3  ">
                                        <i class="fas fa-fw fa-user-edit  mr-1">
                                        </i><span>Edit</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="d-flex justify-content-between ">
                                    <h1 class=" display-4 ">
                                        Nama Supir
                                    </h1>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-danger">&times;</span>
                                    </button>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="user_name" class="font-weight-medium text-uppercase text-muted ">Nama lengkap</label>
                                            <input type="hidden" name="user_id" data-update="true" class=" form-control inputs-edit  " id="user_id">
                                            <input readonly type="text" data-update="true" name="driver_name" class=" form-control inputs-edit  " id="driver_name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="font-weight-medium text-uppercase text-muted " for="user_name">Username</label>
                                            <input readonly type="text" data-update="true" name="user_name" class=" form-control inputs-edit  " id="user_name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="font-weight-medium text-uppercase text-muted " for="">Nomor KTP</label>
                                            <input readonly type="text" data-update="true" name="driver_ID_number" class=" form-control inputs-edit  " id="driver_ID_number">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="font-weight-medium text-uppercase text-muted " for="">Nomor Telepon</label>
                                            <input readonly type="text" data-update="true" name="driver_phone" class=" form-control inputs-edit" id="driver_phone">
                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-weight-medium text-uppercase text-muted " for="user_email">Email</label>
                                            <input readonly type="text" name="user_email" class=" form-control inputs-edit " id="user_email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <div class="d-flex flex-column ">
                                            <span class="font-weight-medium text-uppercase text-muted">Tanggal Bergabung</span>

                                            <h4 class=" my-auto " id="date-join">17 June 2020</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 d-flex justify-content-end align-items-center" id="col-submit">
                                        <button id="btn-cancel-edit" type="button" disabled class="btn d-none btn-secondary mr-2 ">Cancel Edit</button>
                                        <button id="btn-submit" type="submit" disabled class="btn d-none btn-primary mr-2 ">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>