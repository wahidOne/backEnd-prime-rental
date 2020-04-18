<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">System Menu</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">User Access Menu</span>
            </li>
        </ol>
    </nav>


    <div class="row pt-5 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="far fa-fw fa-folder font-26  "></i>
            <span class=" font-weight-light ">User Access Menu</span>
        </h1>
    </div>

    <div class="row">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex">
                        <!-- <button type="button" class="btn btn-primary tambahMenu" data-toggle="modal" data-target="#modal-tambah-menu">Tambah Menu</button> -->
                        <button type="button" class="btn btn-primary tambahMenu">Tambah level User</button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive-lg">
                        <table class="table table-hover ">
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
                                            <a id="btn-access" href="<?= site_url('administrator/system-management/get-access-menu/') . $l['level_id']; ?>" class=" btn btn-small btn-outline-info  ">
                                                access
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-wrap justify-content-center  ">
                                                <a href="<?= base_url('administrator/system-management/update-user-level/') . $l['level_id']; ?>" class=" btn btn-sm btn-outline-primary  ">
                                                    <i class="fas fa-fw fa-edit"></i>
                                                    Edit
                                                </a>
                                                <a href="<?= base_url('administrator/system-management/delete-user-level/') . $l['level_id']; ?>" class="btn btn-sm ml-2 btn-outline-danger  ">
                                                    <i class="fas fa-fw fa-trash "></i>
                                                    Delete
                                                </a>
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