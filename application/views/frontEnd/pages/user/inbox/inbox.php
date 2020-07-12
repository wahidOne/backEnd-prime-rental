<main class="dashboard--content">
    <div class="dashboard--main pb-5">
        <div class="container-fluid">
            <nav aria-label="breadcrumb  " class="bg-transparent ml-n8">
                <ol class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item "><a class="text-secondary my-auto font-25px font-weight-bold" href="<?= site_url('transaksi') ?>">Inbox</a></li>
                    <!-- <li class="breadcrumb-item active text-secondary  my-auto font-20px" aria-current="page">
                    </li> -->

                </ol>
            </nav>


            <div class="row">
                <div class="col-12">
                    <div class="card inbox--card card-body border-0 shadow-sm pt-2">
                        <div class="row">
                            <div class="col-md-10 mt-2">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item  ">
                                        <a class="nav-link text-secondary active" id="all-inbox-tab" data-toggle="tab" href="#all-inbox" role="tab" aria-controls="all-inbox" aria-selected="true">
                                            <i class="far fa-inbox-in fa-fw mr-1">
                                            </i>
                                            <span>
                                                Semua Pesan
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link text-secondary" id="unread-tab" data-toggle="tab" href="#unread" role="tab" aria-controls="unread" aria-selected="false"><i class="far fa-clock fa-fw mr-1"></i> <span>Belum
                                                Dibaca</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12 pt-3">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="all-inbox" role="tabpanel" aria-labelledby="all-inbox-tab">
                                        <div class="d-flex flex-column px-md-2" id="inbox-content" data-domain="<?= base_url('') ?>">
                                            <p class=" text-center ">Loading..</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="unread" role="tabpanel" aria-labelledby="unread-tab">
                                        <div class="d-flex flex-column px-md-2" id="inbox-contentunread" data-domain="<?= base_url('') ?>">
                                            <p class=" text-center ">Loading..</p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <?php $this->load->view($componentPath . "footer"); ?>
</main>