<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">Users</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">Administrations</span>
            </li>
        </ol>
    </nav>
    <div class="row pt-5 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="far fa-fw fa-users font-26  "></i>
            <span class=" font-weight-light ml-3 ">Administrations </span>
        </h1>
    </div>

    <div class="row">
        <div class="col-12">
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
        </div>
        <div class="col-12">
            <div class="card card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link  text-primary " id="add-tab" data-toggle="tab" href="#add" role="tab" aria-controls="add" aria-selected="false">

                            <i class="fas fa-fw fa-user-plus"></i>
                            <span>Tambah Data</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-primary" id="table-tab" data-toggle="tab" href="#table" role="tab" aria-controls="table" aria-selected="true">

                            <i class="fas fa-fw fa-table "></i>
                            <span>Table</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade " id="add" role="tabpanel" aria-labelledby="add-tab">
                        <div class="row pt-3">
                            <div class="col-12">
                                <div class="card card-body border-0 shadow-none">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class=" overflow-scroll ">
                                                <div class="nav mt-md-1 flex-nowrap overflow-scroll  justify-content-center flex-row flex-md-column nav-pills nav-pills-prime px-0 mx-auto " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <a class="nav-link  active text-left " id="v-pills-manual-tab" data-toggle="pill" href="#v-pills-manual" role="tab" aria-controls="v-pills-manual" aria-selected="true">
                                                        Manual
                                                    </a>
                                                    <a class="nav-link text-left" id="v-pills-from-user-tab" data-toggle="pill" href="#v-pills-from-user" role="tab" aria-controls="v-pills-from-user" aria-selected="false">
                                                        Dari User Tersedia
                                                    </a>
                                                    <!-- <a class="nav-link text-left" id="v-pills-auto-generate-tab" data-toggle="pill" href="#v-pills-auto-generate" role="tab" aria-controls="v-pills-auto-generate" aria-selected="false">
                                                        Auto Generate
                                                    </a> -->
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-9 pt-4">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-manual" role="tabpanel" aria-labelledby="v-pills-manual-tab">
                                                    <form action="<?= base_url('administrator/users/add-admin') ?>" method="post" id="tambah-admin-manual">

                                                        <h5>Form Tambah Data Admin</h5>


                                                        <div class="row pt-4">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="">Nama Lengkap</label>
                                                                    <input type="text" name="admin_name" id="admin_name" class="form-control" placeholder="Masukan nama">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="">Nama Pengguna</label>
                                                                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Masukan nama pengguna">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="">Email</label>
                                                                    <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Masukan alamat email">
                                                                </div>
                                                            </div>
                                                            <div class="col-6 col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="">Password</label>
                                                                    <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Masukan password">
                                                                </div>
                                                            </div>
                                                            <div class="col-6 col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="">Ulangi Password</label>
                                                                    <input type="password" name="repeat_password" id="repeat_password" class="form-control" placeholder="Ulangi password">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="">No Hp</label>
                                                                    <input type="text" name="admin_phone" id="admin_phone" class="form-control" placeholder="Masukan nama pengguna">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="">Alamat</label>
                                                                    <input type="text" name="admin_address" id="admin_address" class="form-control" placeholder="Masukan nama pengguna">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="">Tgl Lahir</label>
                                                                    <input type="date" name="admin_birth" id="admin_birth" class="form-control" placeholder="Masukan nama pengguna">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">

                                                                <div class="form-group">
                                                                    <label for="admin_gender">Jenis Kelamin</label>
                                                                    <select class="form-control" name="admin_gender" id="admin_gender">
                                                                        <option disabled selected>-- Pilih Jenis Kelamin -- </option>
                                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                                        <option value="Perempuan">Perempuan</option>

                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group text-right">
                                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-from-user" role="tabpanel" aria-labelledby="v-pills-from-user-tab">

                                                    <div class="card-body">
                                                        <div class="table-responsive table-responsive-lg ">
                                                            <table class="table table-hover " id="table-admin_user" data-url="<?= site_url('administrator/users/get-general-user') ?>">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="pt-0">#</th>
                                                                        <th class="pt-0">Photo</th>
                                                                        <th class="pt-0">Username</th>
                                                                        <th class="pt-0">Email</th>
                                                                        <th class="pt-0">Joined</th>
                                                                        <th class="pt-0 text-center ">Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tbody-admin_user">

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane fade" id="v-pills-auto-generate" role="tabpanel" aria-labelledby="v-pills-auto-generate-tab">...</div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- tab table -->
                    <div class="tab-pane fade show active" id="table" role="tabpanel" aria-labelledby="table-tab">
                        <!-- table -->
                        <div class="row pt-3">
                            <div class="col-12">
                                <div class="card card-body border-0 shadow-none">
                                    <div class="table-responsive table-responsive-lg ">
                                        <table class="table table-hover " id="table-admin">
                                            <thead>
                                                <tr>
                                                    <th class="pt-0">#</th>
                                                    <th class="pt-0">Photo</th>
                                                    <th class="pt-0">Email</th>
                                                    <th class="pt-0">Gender</th>
                                                    <th class="pt-0">Status</th>
                                                    <th class="pt-0">Phone number</th>
                                                    <th class="pt-0 text-center ">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody-admin">

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div>
</div>

<div id="m-admin-info" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Detail of admin
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid container-modal" id="container-modal-admin">
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>