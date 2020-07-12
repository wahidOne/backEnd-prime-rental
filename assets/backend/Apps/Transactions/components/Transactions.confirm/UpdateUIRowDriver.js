export const UpdateUIRowDriver = (data, path) => {
	console.log(data);

	return `
    <div class="col-6 col-md-6 mt-2">
        <div class="card border-0 shadow-none" >
            <div class="card-img-top px-2 pt-2 pb-0 d-flex justify-content-center mb-0 ">
                <img src="${
									path + data.user_photo
								}" class=" img-lg  mx-auto " alt="...">
            </div>
            <div class="card-body text-center ">
               
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="${
									data.user_id
								}" name="driver_id" class="custom-control-input" value="${
		data.driver_id
	}" >
                <label class="custom-control-label ml-1" for="${data.user_id}">
                    <span>${data.driver_name}</span>
                </label>
            </div>
           
            </div>
        </div>
    </div>
    `;
};
