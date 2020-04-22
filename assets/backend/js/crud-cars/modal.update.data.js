export function showModalUpdate(
	data,
	path,
	updateData,
	urlUpdate,
	showMessage,
	loadDataCars
) {
	let modalBodyData = "";

	// 	// const UImodal =;
	// console.log(data);
	const modalBody = document.querySelector("#modalUpdateBody");
	modalBodyData += modalUpdateUI(data, path);
	modalBody.innerHTML = modalBodyData;
	const form = document.querySelector("#form-update-cars");

	let fileUpload = $("#newimage").dropify();
	if (form.length > 0) {
		updateData(urlUpdate, showMessage, fileUpload, loadDataCars);
	}
}

const modalUpdateUI = ({ car, type }, path) => {
	$("#modalUpdate").modal({
		backdrop: "static",
		keyboard: false,
	});
	let selectOption = "";
	type.map(({ type_id, type_name }) => {
		selectOption += `
		<option ${
			type_id == car.car_type_id ? "selected" : ""
		} id="u_type_id" value="${type_id}">${type_name}</option>
		`;
	});

	return `
	<form action="" data-url="<?= base_url('administrator/master-data/update-car') ?>" method="POST" enctype="multipart/form-data" data-url="" id="form-update-cars">
	                    <div class="row pt-4">
	                        <div class="col-sm-6">
	                        <input type="hidden" name="u_car_id" value="${
														car.car_id
													}" class="form-control" >
	                        <input type="hidden" name="u_old_image" value="${
														car.car_photo
													}" class="form-control" >
	                            <div class="form-group">

	                                <label for="brand" class="form-control-label text-white-50  font-weight-bold ">Brand </label>
	                                <input type="text" class="form-control text-primary" name="u_brand" id="u_brand" value="${
																		car.car_brand
																	}" >
	                            </div>
	                        </div>
	                        <div class="col-sm-6">
	                            <div class="form-group">
	                                <label for="no_police" class="form-control-label text-white-50  font-weight-bold ">No Police </label>
	                                <input type="text" class="form-control text-primary" name="u_no_police" id="u_no_police" value="${
																		car.car_no_police
																	}">
	                            </div>
	                        </div>
	                        <div class="col-sm-6">
	                            <div class="form-group">
	                                <label for="fuel" class="form-control-label text-white-50  font-weight-bold ">Type Fuel </label>
	                                <input type="text" class="form-control text-primary" name="u_fuel" id="u_fuel" value="${
																		car.car_fuel
																	}">
	                            </div>
	                        </div>
	                        <div class="col-sm-6">
	                            <div class="form-group ">
	                                <label for="price" class="form-control-label text-white-50  font-weight-bold ">Price </label>

	                                <input type="text" class="form-control text-primary" name="u_price" id="u_price" value="${
																		car.car_price
																	}">
	                            </div>
	                        </div>
	                        <div class="col-sm-6">
	                            <div class="form-group ">
	                                <label for="transmission" class="form-control-label text-white-50  font-weight-bold ">Transmission </label>
	                                <input type="text" class="form-control text-primary" name="u_transmission" id="u_transmission" value="${
																		car.car_transmission
																	}">
	                            </div>
	                        </div>
	                        <div class="col-sm-3">
	                            <div class="form-group ">
	                                <label for="capacity" class="form-control-label text-white-50  font-weight-bold ">Capacity </label>
	                                <input type="number" class="form-control text-primary" name="u_capacity" id="u_capacity" value="${
																		car.car_capacity
																	}">
	                            </div>
	                        </div>
	                        <div class="col-sm-3">
	                            <div class="form-group ">
	                                <label for="capacity" class="form-control-label text-white-50  font-weight-bold ">Car Types </label>
	                                <select id="u_type_id" name="u_type_id" class="form-control">
	                                    <option selected>Choose Type of car...</option>
	                                    ${selectOption}

	                                </select>
	                            </div>
	                        </div>
	                        <div class="col-lg-6">
	                            <div class="form-group">
	                                <label for="desc" class="form-control-label text-white-50  font-weight-bold ">Descriptions Car </label>
	                                <textarea class=" form-control text-primary" name="u_desc" id="u_desc" cols="30" rows="10"  >${
																		car.car_desc
																	}</textarea>
	                            </div>
	                        </div>
	                        <div class="col-lg-6 ">
	                            <div class="form-group">
	                                <div id="upload--image" class="card">
	                                    <div class="card-body upload ">
	                                        <h6 class="card-title">Upload Image </h6>
	                                        <input type="file" id="newimage" name="newimage" class="border" data-default-file="
	                                        ${path + car.car_photo}" />
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col-12 mt-3 ">
	                            <div class="form-group text-right border-top pt-3">
	                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	                                <button id="submit-update" type="submit" class="btn btn-primary">Simpan perubahan</button>
	                            </div>
	                        </div>
	                </form>
	`;
};
