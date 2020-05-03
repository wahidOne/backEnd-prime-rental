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
        <div class="col-md-12 grid-margin stretch-card order-1 order-sm-2">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex">
                        <!-- <button type="button" class="btn btn-primary tambahMenu" data-toggle="modal" data-target="#modal-tambah-menu">Tambah Menu</button> -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-responsive-lg ">
                        <table class="table table-hover " id="table-admin-users" data-url="<?= site_url('administrator/users/get-admin-user') ?>">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Photo</th>
                                    <th class="pt-0">Username</th>
                                    <th class="pt-0">Email</th>
                                    <th class="pt-0">Role</th>
                                    <th class="pt-0">Status</th>
                                    <th class="pt-0">Joined</th>
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



<div class="modal fade bd-example-modal-sm" id="modal_level" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Change Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="form-change-level" action="<?= site_url('administrator/users/change-level') ?>">
                    <div class="col-12">
                        <input type="hidden" class=" form-control " name="user_id">
                        <input type="hidden" class=" form-control " name="old_level">
                        <div class="form-group row">
                            <label for="user_level" class="col-sm-2 my-auto">Level</label>
                            <div class="col-sm-10">
                                <select name="user_level" id="user_level" class="form-control text-primary text-capitalize ">
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary btn-small ml-auto">Save Changes </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>