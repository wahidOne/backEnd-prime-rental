<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">System Menu</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">User Level</span>
            </li>
        </ol>
    </nav>


    <div class="row pt-5 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="far fa-fw fa-folder font-26  "></i>
            <span class=" font-weight-light ">User Level</span>
        </h1>
    </div>

    <div class="row">
        <div class="col-md-5 grid-margin stretch-card order-2 order-md-1 ">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Tambah Level</h6>
                    <form data-url="<?= base_url('administrator/system-management/add-level-access/') ?>" action="" class="forms-sample form-level " method="POST">
                        <div class="form-group">
                            <label for="level">Level Name</label>
                            <input type="text" class="form-control text-primary " name="level" id="level" autocomplete="off" placeholder="Username">
                        </div>
                        <div class="form-group row justify-content-end ">
                            <button type="reset" class="btn btn-sm btn-outline-light  ">Reset </button>
                            <button type="submit" class="btn btn-outline-primary ml-2 "> Tambah </button></div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-md-7 grid-margin stretch-card order-1 order-md-2 ">
            <div class="card">

                <div class="card-body">

                    <div class="table-responsive-lg">
                        <table class="table table-hover " id="data-level">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Level</th>
                                    <th class="pt-0">Akses</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($user_level as $l) : ?>
                                    <tr>
                                        <th><span class=" text-white-50 "><?= $no++; ?></span></th>
                                        <td class=" text-capitalize "><?= $l['level']; ?></td>
                                        <td>
                                            <a id="btn-access" href="<?= site_url('administrator/system-management/get-access-menu/') . $l['level_id']; ?>" class=" btn btn-sm btn-outline-info   ">
                                                access
                                            </a>
                                        </td>
                                        <td>
                                            <div class="row d-flex flex-wrap justify-content-center  ">
                                                <div class="col-6 text-right px-1 ">
                                                    <a href="<?= base_url('administrator/system-management/get-level-access/') . $l['level_id']; ?>" class="  btn btn-sm btn-outline-primary  button--edit">
                                                        <i class="fas fa-fw fa-edit"></i>
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="col-6 px-1 text-left ">
                                                    <a href="<?= base_url('administrator/system-management/delete-level-access/') . $l['level_id']; ?>" class=" btn btns-sm btn-outline-danger  ml-2   ">
                                                        <i class="fas fa-fw fa-trash "></i>
                                                        Delete
                                                    </a>
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

    <?php if ($this->session->flashdata('pesan-level')) : ?>
        <div class="pesan-level d-none" data-message="<?= $this->session->flashdata('pesan-level');  ?>"></div>
    <?php endif; ?>

</div>

<div id="modal-edit" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form id="form-edit" action="" data-url="<?= base_url('administrator/system-management/update-level-access/') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row px-2">
                        <div class="col-12 mx-auto">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="level_id">
                                <label for="level">Level Name</label>
                                <input type="text" class="form-control text-primary " name="level_name" id="level_name" autocomplete="off" placeholder="Level name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>