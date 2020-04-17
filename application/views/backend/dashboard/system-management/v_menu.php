<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">System Menu</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">Menu Management</span>
            </li>
        </ol>
    </nav>


    <div class="row pt-5 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="far fa-fw fa-folder font-26  "></i>
            <span class=" font-weight-light ">Menu Management</span>
        </h1>
    </div>

    <?php if ($this->session->flashdata('pesan-tambah-menu')) : ?>
        <div class="pesan-tambah d-none" data-message="<?= $this->session->flashdata('pesan-tambah-menu');  ?>"></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('pesan-ubah-menu')) : ?>
        <div class="pesan-ubah d-none" data-message="<?= $this->session->flashdata('pesan-ubah-menu');  ?>"></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('pesan-hapus-menu')) : ?>
        <div class="pesan-hapus d-none" data-message="<?= $this->session->flashdata('pesan-hapus-menu');  ?>"></div>
    <?php endif; ?>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex">
                        <!-- <button type="button" class="btn btn-primary tambahMenu" data-toggle="modal" data-target="#modal-tambah-menu">Tambah Menu</button> -->
                        <button type="button" class="btn btn-primary tambahMenu">Tambah Menu</button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive-lg">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Icon</th>
                                    <th class="pt-0">Name / Title</th>
                                    <th class="pt-0">Method</th>
                                    <th class="pt-0">Url</th>
                                    <th class="pt-0">Type</th>
                                    <th class="text-center" colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <th><span class=" text-white-50 "><?= $no++; ?></span></th>
                                        <td><span><i class="text-primary <?= $m['menu_icon']; ?>"></i></span> </td>
                                        <td><?= $m['menu_name']; ?></td>
                                        <td><?= $m['menu_method']; ?></td>
                                        <td><?= $m['menu_url']; ?></td>
                                        <td class=" text-capitalize "><?= $m['menu_type']; ?></td>
                                        <td>
                                        <td>
                                            <div class="dropleft justify-content-center ">
                                                <button class="btn p-0" type="button" id="<?= $m['menu_name']; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="<?= $m['menu_name']; ?>">
                                                    <a class="dropdown-item d-flex align-items-center text-primary   " href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                                                    <a class="dropdown-item d-flex align-items-center text-info ubah-menu" href="#" data-id="<?= $m['menu_id']; ?>"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>

                                                    <a id="hapus-menu" class="dropdown-item d-flex align-items-center text-danger " href="<?= base_url('administrator/system-management/delete-menu/') . $m['menu_id']; ?>"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                                                </div>
                                            </div>
                                        </td>
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


<!-- Large modal -->


<div id="menu-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formActionMenu" action="" method="post">
                <!-- <form action="/" id="formTambahMenu" method="POST"> -->
                <div class="modal-body">
                    <div class="row px-md-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label " for="menu_name">Title</label>
                                <input type="text" name="menu_name" class="form-control text-primary " id="menu_name" data-title="Title">
                                <small class="text-danger"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" form-control-label " for="menu_method">Method</label>
                                <input type="text" name="menu_method" class="form-control text-primary " id="menu_method" data-title="Method">
                                <small class="text-danger"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" form-control-label " for="menu_url">Url</label>
                                <input type="text" name="menu_url" class="form-control text-primary " id="menu_url" data-title="Url">
                                <small class="text-danger"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" form-control-label " for="menu_slug">Slug</label>
                                <input type="text" name="menu_slug" class="form-control text-primary " id="menu_slug" data-title="Slug">
                                <small class="text-danger"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" form-control-label" for="menu_icon">Icon</label>
                                <input type="text" name="menu_icon" class="form-control text-primary  " id="menu_icon" data-title="Icon">
                                <small class="text-danger"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" form-control-label" for="menu_type">Type </label>
                                <select class="form-control text-primary " name="menu_type" id="menu_type" data-title="Menu Type">
                                    <option selected="" value="0">Open this Select Type Menu</option>
                                    <div class="d-none" id="select-tambah">
                                        <?php foreach ($menu_type as $mt) : ?>
                                            <option value="<?= $mt['type_id'] ?>" class=" text-capitalize "><?= $mt['type_name'] ?></option>
                                        <?php endforeach; ?>
                                    </div>
                                </select>
                                <small class="text-danger"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="save-data" type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>