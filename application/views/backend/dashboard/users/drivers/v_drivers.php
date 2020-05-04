<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">Users</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">Drivers</span>
            </li>
        </ol>
    </nav>
    <div class="row pt-5 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="far fa-fw fa-users font-26  "></i>
            <span class=" font-weight-light ml-3 ">Drivers </span>
        </h1>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card order-1 order-sm-2">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex">
                        <!-- <button type="button" class="btn btn-primary tambahMenu" data-toggle="modal" data-target="#modal-tambah-menu">Tambah Menu</button> -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-responsive-lg ">
                        <table class="table table-hover " id="table-drivers" data-url="<?= site_url('administrator/users/get-drivers') ?>">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Photo</th>
                                    <th class="pt-0">Name</th>
                                    <th class="pt-0">Email</th>
                                    <th class="pt-0">Phone</th>
                                    <th class="pt-0">Status</th>
                                    <th class="pt-0">Joined</th>
                                    <th class="pt-0 text-center ">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-drivers">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<div id="m-info" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border-0 pt-md-2 ">
                <h4 class="modal-title ml-md-2 mt-md-3">
                    Detail of driver
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="container-modal">
                </div>

            </div>

            <div class="modal-footer border-0">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>