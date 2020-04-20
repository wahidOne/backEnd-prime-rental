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
                        <table class="table table-hover " id="table-cars">
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
                                    <input type="text" class="form-control" name="brand" id="brand">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="no_police" class="form-control-label text-white-50  font-weight-bold ">No Police </label>
                                    <input type="text" class="form-control" name="no_police" id="no_police">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="fuel" class="form-control-label text-white-50  font-weight-bold ">Type Fuel </label>
                                    <input type="text" class="form-control" name="fuel" id="fuel">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group ">
                                    <label for="price" class="form-control-label text-white-50  font-weight-bold ">Price </label>

                                    <input type="text" class="form-control" name="price" id="price">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group ">
                                    <label for="transmission" class="form-control-label text-white-50  font-weight-bold ">Transmission </label>
                                    <input type="text" class="form-control" name="transmission" id="transmission">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group ">
                                    <label for="capacity" class="form-control-label text-white-50  font-weight-bold ">Capacity </label>
                                    <input type="number" class="form-control" name="capacity" id="capacity">
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
                                    <textarea class=" form-control " name="desc" id="desc" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="form-group">
                                    <div class="card">
                                        <div class="card-body">
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
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>



</div>