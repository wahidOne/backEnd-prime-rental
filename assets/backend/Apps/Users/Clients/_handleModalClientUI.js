const handleModalClientUI = (modal, data, path) => {
	const modalTitle = modal.querySelector(".modal-title");
	modalTitle.innerHTML = `Detail of <span class=" font-italic text-primary  " >${data.client_fullname}</span> `;
	return `
    <div class="row">
        <div class="col-12 col-md-4 text-center">
            <img class="mx-auto border p-2 border-primary rounded rounded-circle" height="150" src="${
                path + data.user_photo
            }" alt="">
            <div class="mb-md-4 mt-3 mt-md-4 ">
                <button type="button" class=" btn btn-primary text-dark"> ${
                    data.user_status
                } </button>
            </div>
        </div>
        <div class="col-md-8 pt-md-0  mt-3 mt-md-0">
            <hr class=" d-md-none ml-2 border-top " style="width: 100%">
            <div class="row px-2">
                <div class="col-3 px-3 py-2">
                    <h5 class="text-white-50" >Name</h5>
                </div>
                <div class="border-bottom col-8 px-3 py-2">
                    <h5 class=" text-capitalize ">${data.client_fullname}</h5>
                </div>
            </div>
            <br>
            <div class="row px-2">
                <div class="col-3 px-3 py-2">
                    <h5 class="text-white-50" >ID Number</h5>
                </div>
                <div class="border-bottom col-8 px-3 py-2">
                    <h5 class=" text-capitalize ">${data.client_ID_num}</h5>
                </div>
            </div>
            <br>
            <div class="row px-2">
                <div class="col-3 px-3 py-2">
                    <h5 class="text-white-50">Username</h5>
                </div>
                <div class="border-bottom col-8 px-3 py-2">
                    <h5 class=" text-capitalize ">${data.user_name}</h5>
                </div>
            </div>
            <br>
            <div class="row px-2">
                <div class="col-3 px-3 py-2">
                    <h5 class="text-white-50">Email</h5>
                </div>
                <div class="border-bottom col-8 px-3 py-2">
                    <h5 class=" text-capitalize ">${data.user_email}</h5>
                </div>
            </div>
            <br>
            <div class="row px-2">
                <div class="col-3 px-3 py-2">
                    <h5 class="text-white-50">Phone</h5>
                </div>
                <div class="border-bottom col-8 px-3 py-2">
                    <h5 class=" text-capitalize ">${data.client_phone}</h5>
                </div>
            </div>
            
            <br>
            <div class="row px-2">
                <div class="col-3 px-3 py-2">
                    <h5 class="text-white-50">Joined</h5>
                </div>
                <div class="border-bottom col-8 px-3 py-2">
                    <h5 class=" text-capitalize ">${data.user_created}</h5>
                </div>
            </div>
        </div>
    </div>
        
        `;
}

export {
	handleModalClientUI
}
