<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">System Menu</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">Change Access Menu</span>
            </li>
        </ol>
    </nav>


    <div class="row pt-5 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="far fa-fw fa-folder font-26  "></i>
            <span class=" font-weight-light ">Change Access Menu</span>
        </h1>
    </div>

    <?php if ($this->session->flashdata('pesan-akses')) : ?>
        <div class="pesan-akses d-none" data-message="<?= $this->session->flashdata('pesan-akses');  ?>"></div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex">
                        <h4> Level : <span class=" badge badge-primary text-capitalize "> <?= $level['level']; ?> </span> </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive-lg">
                        <div class="row">
                            <div class="col-lg-6 mt-3 mb-3">
                                <h3 class="card-title">Access Menu</h3>
                                <table class="table table-hover table-bordered " id="data-akses-menu">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Menu</th>
                                            <th colspan="1">Akses</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no = 1; ?>
                                        <?php foreach ($menu as $m) : ?>
                                            <?php if ($m['menu_id'] != 2) : ?>
                                                <tr>
                                                    <th><span class=" text-white-50 "><?= $no++; ?></span></th>
                                                    <td class=" text-capitalize "><?= $m['menu_name']; ?></td>

                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input style="cursor: pointer;" type="checkbox" class="custom-control-input checkbox-akses-menu" <?= check_access($level['level_id'], $m['menu_id']); ?> data-level="<?= $level['level_id']; ?>" data-menu="<?= $m['menu_id']; ?>" id="<?= $m['menu_name']; ?>">
                                                            <label class="custom-control-label" for="<?= $m['menu_name']; ?>"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6 mt-3  ">
                                <h3 class="card-title">Access submenu</h3>

                                <table class="table table-hover table-bordered " id="data-akses-submenu">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Submenu</th>
                                            <th colspan="1">Akses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($submenu as $sm) : ?>
                                            <tr>
                                                <th><span class=" text-white-50 "><?= $no++; ?></span></th>
                                                <td class=" text-capitalize "><?= $sm['submenu_name']; ?></td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input checkbox-akses-submenu" <?= check_submenu_access($level['level_id'], $sm['submenu_id']); ?> data-level="<?= $level['level_id']; ?>" data-submenu="<?= $sm['submenu_id']; ?>" id="<?= $sm['submenu_name']; ?>">
                                                        <label class="custom-control-label" for="<?= $sm['submenu_name']; ?>"></label>
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
                <div class="card-footer">
                    <a href="<?= base_url('administrator/system-management/user-access-menu') ?>" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>


</div>