<main class="dashboard--content">
    <div class="dashboard--main pb-5">
        <div class="container-fluid">
            <nav aria-label="breadcrumb  " class="bg-transparent ml-n8">
                <ol class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item "><a class="text-secondary my-auto font-25px font-weight-bold" href="<?= site_url('transaksi') ?>">Inbox</a></li>
                    <li class="breadcrumb-item active text-secondary  my-auto font-20px" aria-current="page">
                        Read
                    </li>

                </ol>
            </nav>

            <hr>
            <div class="row px-md-3">
                <div class="card card-body border-0  ">
                    <div class="d-flex w-100 justify-content-between">
                        <div class="d-flex align-items-center ">
                            <img height="50" class="  rounded-circle" src="<?= base_url('assets/uploads/ava/') . $sender['user_photo']; ?>">
                            <span class="ml-2"> <?= $sender['admin_name']; ?></span>
                        </div>
                        <div class=" dropleft">
                            <a href="#" class=" text-dark " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class=" fas fa-ellipsis-v  "></i>
                            </a>
                            <div class="dropdown-menu mr-1">

                                <!-- <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item text-success" href="#"><i class="far text-success fa-print  mr-1 "></i> Print</a>
                                <a class="dropdown-item text-danger" href="#"><i class="far fa-trash-alt mr-1 "></i> Hapus</a>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex mt-4 ">
                        <h3><?= $inbox['inbox_subject']; ?></h3>
                    </div>
                    <?= $inbox['inbox_text']; ?>
                </div>

            </div>
        </div>
    </div>

    <?php $this->load->view($componentPath . "footer"); ?>
</main>