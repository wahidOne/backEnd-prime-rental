<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">System Menu</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">Sub Management</span>
            </li>
        </ol>
    </nav>

    <div class="row pt-5 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="far fa-fw fa-folders font-26  "></i>
            <span class=" font-weight-light ml-3 ">Menu Management</span>
        </h1>
    </div>

    <?php if ($this->session->flashdata('pesan-tambah-submenu')) : ?>
        <div class="pesan-tambah d-none" data-message="<?= $this->session->flashdata('pesan-tambah-submenu');  ?>"></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('pesan-ubah-submenu')) : ?>
        <div class="pesan-ubah d-none" data-message="<?= $this->session->flashdata('pesan-ubah-submenu');  ?>"></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('pesan-hapus-submenu')) : ?>
        <div class="pesan-hapus d-none" data-message="<?= $this->session->flashdata('pesan-hapus-submenu');  ?>"></div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex">
                        <button type="button" class="btn btn-primary tambahMenu" data-toggle="modal" data-target="#submenu-modal">Tambah Menu</button>
                        <!-- <button type="button" class="btn btn-primary tambahMenu">Tambah Menu</button> -->
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive-lg">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Nama / Title</th>
                                    <th class="pt-0">Method (Fungsi)</th>
                                    <th class="pt-0" colspan="2">Tipe Menu</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($submenu as $sm) : ?>
                                    <tr>
                                        <th><span class=" text-white-50 "><?= $no++; ?></span></th>
                                        <td><?= $sm['submenu_name']; ?></td>
                                        <td><?= $sm['submenu_method']; ?></td>
                                        <td><?= $sm['menu_name']; ?></td>
                                        <td>
                                        <td>
                                            <div class="text-wrap d-flex justify-content-around ">
                                                <a class=" badge badge-primary " href="<?= base_url('administrator/system-management/update-submenu/') . $sm['submenu_id']; ?>"><i data-feather="edit-2" class="icon-sm"></i> <span class="">Edit</span></a>
                                                <a id="hapus-menu" class="badge badge-danger ml-2 ml-md-1" href="<?= base_url('administrator/system-management/delete-submenu/') . $sm['submenu_id']; ?>"><i class=" fas fa-fw fa-trash-alt mr-1  "></i>Delete</a>
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


<?php if (validation_errors()) : ?>
    <div id="showModal"></div>
<?php endif; ?>


<div id="submenu-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary " id="modal-title"><i class="fal fa-fw font-18 fa-folder-plus"></i> Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <!-- <form action="/" id="formTambahMenu" method="POST"> -->
                <div class="modal-body">
                    <div class="row px-md-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label " for="name">Nama Submenu</label>
                                <input type="text" name="name" class="form-control text-primary " id="name" data-title="Submenu Name">
                                <?= form_error('name', '<span class="text-danger m-1 pesan-validasi-input">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" form-control-label " for="method">Method</label>
                                <input type="text" name="method" class="form-control text-primary " id="method" data-title="Method">
                                <?= form_error('method', '<span class="text-danger m-1 pesan-validasi-input">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" form-control-label " for="icon">Icon</label>
                                <input type="text" name="icon" class="form-control text-primary " id="icon" data-title="Icon">
                                <?= form_error('icon', '<span class="text-danger m-1 pesan-validasi-input">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" form-control-label" for="menu_id">Menu </label>
                                <select class="form-control text-white text-capitalize " name="menu_id" id="menu_id">
                                    <option selected="" disabled>Open this Select Menu</option>
                                    <div class="d-none" id="select-tambah">
                                        <?php foreach ($menu as $m) : ?>
                                            <option value="<?= $m['menu_id'] ?>" class=" text-capitalize "><?= $m['menu_name'] ?></option>
                                        <?php endforeach; ?>
                                    </div>
                                </select>
                                <?= form_error('menu_id', '<span class="text-danger m-1 pesan-validasi-input">', '</span>'); ?>
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