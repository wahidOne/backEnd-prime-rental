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
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex">
                        <h4> Level : <span class=" badge badge-primary text-capitalize "> <?= $level['level']; ?> </span> </h4>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <th><span class=" text-white-50 "><?= $no++; ?></span></th>
                                        <td class=" text-capitalize "><?= $m['menu_name']; ?></td>
                                        <td>
                                            <div class="input-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" <?= check_access($level['level_id'], $m['menu_id']); ?> data-level="<?= $level['level_id']; ?>" data-menu="<?= $m['menu_id']; ?>" class="form-check-input checkbox-level">
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('administrator/system-management/user-access-menu') ?>" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>


</div>