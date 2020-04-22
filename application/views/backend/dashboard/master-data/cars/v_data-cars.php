<div class="page-content pt-md-4 ">
    <nav class="page-breadcrumb ">
        <ol class="breadcrumb d-flex align-content-md-end ">
            <li class="breadcrumb-item"><a href="#" class="display-5 text-light ">Dashboard</a></li>
            <li class="breadcrumb-item mt-auto">
                <span class=" font-18 text-white-50 ">Master Data</span>
            </li>
            <li class=" breadcrumb-item active mt-auto" aria-current="page"><span class="font-14 text-primary font-weight-bold ">Cars</span>
            </li>
        </ol>
    </nav>
    <div class="row pt-5 pb-4 px-3">
        <h1 class=" display-5 text-primary ">
            <i class="far fa-fw fa-folders font-26  "></i>
            <span class=" font-weight-light ml-3 ">Cars</span>
        </h1>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex">
                        <!-- <button type="button" class="btn btn-primary tambahMenu" data-toggle="modal" data-target="#modal-tambah-menu">Tambah Menu</button> -->

                        <button type="button" class="btn btn-primary" id="button-actions">
                            <i class="fas fa-plus"></i>
                            Add Car data
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover " id="table-cars" data-url="<?= site_url('administrator/master-data/data-tables-cars') ?>">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Image</th>
                                    <th class="pt-0">Merk</th>
                                    <th class="pt-0">No Police</th>
                                    <th class="pt-0">Type of car</th>
                                    <th class="pt-0">Price</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" id="modalActions" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="" data-url="<?= base_url('administrator/master-data/add-cars') ?>" method="POST" enctype="multipart/form-data" id="form-cars">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row pt-4">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="brand" class="form-control-label text-white-50  font-weight-bold ">Brand </label>
                                    <input type="text" class="form-control text-primary" name="brand" id="brand">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="no_police" class="form-control-label text-white-50  font-weight-bold ">No Police </label>
                                    <input type="text" class="form-control text-primary" name="no_police" id="no_police">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="fuel" class="form-control-label text-white-50  font-weight-bold ">Type Fuel </label>
                                    <input type="text" class="form-control text-primary" name="fuel" id="fuel">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group ">
                                    <label for="price" class="form-control-label text-white-50  font-weight-bold ">Price </label>

                                    <input type="text" class="form-control text-primary" name="price" id="price">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group ">
                                    <label for="transmission" class="form-control-label text-white-50  font-weight-bold ">Transmission </label>
                                    <input type="text" class="form-control text-primary" name="transmission" id="transmission">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="capacity" class="form-control-label text-white-50  font-weight-bold ">Capacity </label>
                                    <input type="number" class="form-control text-primary" name="capacity" id="capacity">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="capacity" class="form-control-label text-white-50  font-weight-bold ">Car Types </label>
                                    <select id="type_id" name="type_id" class="form-control">
                                        <option selected>Choose Type of car...</option>
                                        <?php foreach ($type_car as $tc) : ?>
                                            <option id="type_id" value="<?= $tc['type_id']; ?>"> <?= $tc['type_name']; ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="desc" class="form-control-label text-white-50  font-weight-bold ">Descriptions Car </label>
                                    <textarea class=" form-control text-primary" name="desc" id="desc" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="form-group">
                                    <div class="card">
                                        <div class="card-body upload ">
                                            <h6 class="card-title">Upload Image </h6>
                                            <input type="file" id="image" name="image" class="border" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="submit" type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>




    <div class="modal fade bd-example-modal-lg" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="modalUpdateBody" class="modal-body">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title-detail text-center font-weight-bolder ">Detail Car </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="modalDetailBody" class="modal-body">
                    <!-- <div class="row flex-grow ">
                        <div class="col-lg-5 my-auto grid-margin stretch-card ">
                            <div class="card border-0 shadow-none ">
                                <div class="card-body">
                                    <img class=" card-img-absolute img-fluid w-100 " src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSveoAzV5iXWDh8NnoA80GBZNF350mR1pyCaAOvk10ywEIsUYPk&usqp=CAU" alt="">
                                    <span class=" mt-1 text-white-50">Date create : 12-20-2020</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 grid-margin stretch-card ">
                            <div class="card shadow-none border-0 ">
                                <div class="card-body flex-column d-flex">
                                    <p class=" display-3 my-1 text-light">Agya Kuning</p>
                                    <h4 class=" font-weight-bold text-monospace text-primary-muted mt-2  "> Hatback </h4>

                                    <div class="pt-4 ">
                                        <div class="row px-0 justify-content-between">
                                            <div class="col-6 col-xl-4  mt-2">
                                                <h5 class="font-weight-bold text-primary">Price</h5>
                                                <span class=" text-white-50 display-4 my-2 ">
                                                    Rp. 200.000
                                                </span>
                                            </div>

                                            <div class=" col-6 col-xl-4  text-left text-xl-center   mt-2">
                                                <h5 class=" font-weight-bold text-primary ">Transmission</h5>
                                                <h6 class="text-white-50 text-left text-xl-center  mt-2 ">
                                                    Otomastis
                                                </h6>
                                            </div>
                                            <div class="d-none d-md-flex col-xl-4 "></div>
                                        </div>
                                        <div class="row mt-3 border-top pt-3 pr-0">
                                            <div class="col-12 col-lg-8">
                                                <h5 class=" font-weight-bold text-primary ">Description</h5>
                                                <p class="text-white-50 text-left ">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio laudantium optio et unde atque accusantium minima numquam earum inventore porro, quia ex fugiat fugit quis, iusto voluptatibus, quisquam aliquid cum!
                                                </p>
                                            </div>
                                            <div class="col-12 col-lg-4 ">
                                                <h5 class=" font-weight-bold text-primary mt-3 mt-lg-0 ">Police Number</h5>
                                                <div class=" text-light font-weight-bold mt-lg-2 font-18  ">
                                                    C 4205 DE
                                                </div>
                                            </div>
                                            <hr class=" border-top w-100 ">
                                            <div class="col-6 col-lg-6 col-xl-3 text-left   mt-2">
                                                <h5 class=" font-weight-bold text-primary font-17 ">Capacity</h5>
                                                <p class="text-white-50 text-left  font-17 font-weight-bold ">
                                                    5 Kursi
                                                </p>
                                            </div>
                                            <div class="col-6 col-lg-6 col-xl-3 text-left  mt-2">
                                                <h5 class=" font-weight-bold text-primary font-17 ">Status</h5>
                                                <p class="text-white-50 text-left font-17  ">
                                                    Bebas sewa
                                                </p>
                                            </div>

                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>


                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

</div>