export function detailData(data, path) {
	let modalDetailData = "";
	const modalDetailBody = document.querySelector("#modalDetailBody");
	modalDetailData += modalUpdateUI(data, path);
	modalDetailBody.innerHTML = modalDetailData;
}

const modalUpdateUI = (data, path) => {
	$("#modalDetail").modal({
		backdrop: "static",
		keyboard: false,
	});

	const { car, car_new_price } = data;

	return `
<div class="row flex-grow ">
    <div class="col-lg-5 my-auto grid-margin stretch-card ">
        <div class="card border-0 shadow-none ">
            <div class="card-body">
                <img class=" card-img-absolute img-fluid w-100 " src=${
									path + car.car_photo
								} alt="">
                <span class=" mt-3 text-white-50">Date create : ${
									car.car_date_input
								}</span>
            </div>
        </div>
    </div>
    <div class="col-lg-7 grid-margin stretch-card ">
        <div class="card shadow-none border-0 ">
            <div class="card-body flex-column d-flex">
                <p class=" display-3 my-1 text-light">${car.car_brand}</p>
                <h4 class=" font-weight-bold text-monospace text-primary-muted mt-2  "> ${
									car.type_name
								} </h4>

                <div class="pt-4 ">
                    <div class="row px-0 justify-content-between">
                        <div class="col-6 col-xl-4  mt-2">
                            <h5 class="font-weight-bold text-primary">Price</h5>
                            <span class=" text-light font-20  my-2 ">${car_new_price}</span>
                        </div>

                        <div class=" col-6 col-xl-4  text-left text-xl-center   mt-2">
                            <h5 class=" font-weight-bold text-primary ">Transmission</h5>
                            <h6 class="text-light text-left text-xl-center mt-2 ">
                            ${car.car_transmission}
                            </h6>
                        </div>
                        <div class="d-none d-md-flex col-xl-4 "></div>
                    </div>
                    <div class="row mt-3 border-top pt-3 pr-0">
                        <div class="col-12 col-lg-8">
                            <h5 class=" font-weight-bold text-primary ">Description</h5>
                            <p class="text-light text-left ">
                            ${car.car_desc}
                            </p>
                        </div>
                        <div class="col-12 col-lg-4 ">
                            <h5 class=" font-weight-bold text-primary mt-3 mt-lg-0 ">Police Number</h5>
                            <div class=" text-light font-weight-bold mt-lg-2 font-18  ">
                            ${car.car_no_police}
                            </div>
                        </div>
                        <hr class=" border-top w-100 ">
                        <div class="col-4 col-lg-4 col-xl-3 text-left   mt-2">
                            <h5 class=" font-weight-bold text-primary font-17 ">Capacity</h5>
                            <p class="text-light text-left  font-17 font-weight-bold ">
                            ${car.car_capacity} Kursi
                            </p>
                        </div>
                        <div class="col-4 col-lg-4 col-xl-3 text-left   mt-2">
                            <h5 class=" font-weight-bold text-primary font-17 ">Type of Fuel </h5>
                            <p class="text-light text-left  font-17 font-weight-bold ">
                            ${car.car_fuel}
                            </p>
                        </div>
                        <div class="col-4 col-lg-4 col-xl-3 text-left  mt-2">
                            <h5 class=" font-weight-bold text-primary font-17 ">Status</h5>
                            <p class="text-light text-left font-17  ">
                                Bebas sewa
                            </p>
                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>


</div>
    
    `;
};
