<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">Master Data</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">Types Car</span>
            </li>
        </ol>
    </nav>
    <div class="row pt-5 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="far fa-fw fa-folders font-26  "></i>
            <span class=" font-weight-light ml-3 ">Types Car</span>
        </h1>
    </div>
    <div class="row">
        <div class="col-md-4 grid-margin order-2 order-sm-1 ">
            <div class="card">
                <div id="collapse-insert" class="collapse ">
                    <div class="" id="card-actions">
                        <div class="card-header pb-0">
                            <div class="card-title">
                                Add new Types
                            </div>
                        </div>
                        <div class="card-body px-3">
                            <form data-url="<?= site_url('administrator/master-data/add-type')  ?>" id="form-tambah" action="" method="POST">
                                <div class="form-group row">
                                    <label for="name" class="form-control-label col-sm-2 font-weight-bolder text-primary ">Type Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="name" id="name">
                                        <!-- <small class=" validate-name "></small> -->
                                    </div>
                                </div>
                                <div class="form-group text-right mt-2">
                                    <button type="submit" class=" btn-sm btn btn-outline-primary ">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="collapse-update" class="collapse">
                    <div id="card-update">
                        <div class="card-header pb-0">
                            <div class="card-title">
                                Update Types
                            </div>
                        </div>
                        <div class="card-body px-3">

                            <form data-url="<?= site_url('administrator/master-data/update-type')  ?>" id="form-ubah" action="" method="POST">
                                <div class="form-group row">
                                    <label for="u_name" class="form-control-label col-sm-2 font-weight-bolder text-primary ">Update Type Name</label>
                                    <div class="col-sm-12">
                                        <input type="hidden" class="form-control" name="u_id" id="u_id">
                                        <input type="text" class="form-control" name="u_name" id="u_name">
                                        <!-- <small class=" validate-name "></small> -->
                                    </div>
                                </div>
                                <div class="form-group text-right mt-2">
                                    <button type="submit" class=" btn-sm btn btn-outline-primary ">Ubah </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 grid-margin stretch-card order-1 order-sm-2">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex">
                        <!-- <button type="button" class="btn btn-primary tambahMenu" data-toggle="modal" data-target="#modal-tambah-menu">Tambah Menu</button> -->

                        <button class="btn btn-primary btn-small mb-2" type="button" id="collpase-insert-btn">
                            Tambah Data
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-responsive-lg ">
                        <table class="table table-hover " id="table-types" data-url="<?= site_url('administrator/master-data/get-types-car') ?>">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Tipe</th>
                                    <th class="pt-0 text-center ">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-type">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>