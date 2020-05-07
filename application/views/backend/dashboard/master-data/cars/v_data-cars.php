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
            <i class="far fa-fw fa-cars font-26  "></i>
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
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Merk</th>
                                    <th>No Police</th>
                                    <th>Type of car</th>
                                    <th>Price</th>
                                    <th>Status</th>
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

</div>