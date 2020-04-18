<div class="page-content pt-md-4 px-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">System Menu</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">Update Submenu</span>
            </li>
        </ol>
    </nav>

    <div class="row pt-2 pt-md-4 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="far fa-fw fa-folder-open font-26  "></i>
            <span class=" font-weight-light"> Update Submenu </span>
        </h1>
    </div>


    <!-- row -->

    <div class="col-12 col-md-9">

        <div class="card">
            <div class="card-header">
                <h3 class=" display-5 font-weight-light text-white-50 ">
                    Ubah submenu : <?= $submenu['submenu_name']; ?>
                </h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row px-md-4">
                        <div class="col-sm-12">
                            <input type="hidden" class="form-control" name="submenu_id" value="<?= $submenu['submenu_id']  ?>">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">

                                <label class="form-control-label " for="name">Nama Submenu</label>
                                <input type="text" name="name" class="form-control text-primary " id="name" data-title="Submenu Name" value="<?= $submenu['submenu_name'] ?>">
                                <?= form_error('name', '<span class="text-danger m-1 pesan-validasi-input">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" form-control-label " for="method">Method</label>
                                <input type="text" name="method" class="form-control text-primary " id="method" data-title="Method" value="<?= $submenu['submenu_method'] ?>">
                                <?= form_error('method', '<span class="text-danger m-1 pesan-validasi-input">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" form-control-label " for="icon">Icon</label>
                                <input type="text" name="icon" class="form-control text-primary " id="icon" data-title="Icon" value="<?= $submenu['submenu_icon'] ?>">
                                <?= form_error('icon', '<span class="text-danger m-1 pesan-validasi-input">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" form-control-label" for="menu_id">Menu </label>
                                <select class="form-control text-white text-capitalize " name="menu_id" id="menu_id">
                                    <option disabled class=" text-primary ">Open this Select Menu</option>
                                    <div class="d-none" id="select-tambah">
                                        <?php foreach ($menu as $m) : ?>
                                            <?php if ($submenu['submenu_menu_id'] == $m['menu_id']) : ?>
                                                <option value="<?= $m['menu_id'] ?>" class=" text-capitalize " selected><?= $m['menu_name'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $m['menu_id'] ?>" class=" text-capitalize "><?= $m['menu_name'] ?></option>
                                            <?php endif; ?>

                                        <?php endforeach; ?>
                                    </div>
                                </select>
                                <?= form_error('menu_id', '<span class="text-danger m-1 pesan-validasi-input">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-12  text-right ">
                            <a href="<?= base_url('administrator/system-management/submenu') ?>" class="btn btn-secondary text-dark ">Cancel</a>
                            <button type="submit" class="btn btn-primary ml-2">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /row -->



</div>