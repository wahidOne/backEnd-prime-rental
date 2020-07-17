const modalInfoAdminUI = (modal, data) => {
	const modalTitle = modal.querySelector(".modal-title");
	modalTitle.innerHTML = `Detail of <span class=" font-italic text-primary  " >${data.admin_name}</span>`;

	return `
    <div class="row px-md-3 pt-3">
       
        <div class="col-md-8">
                <div class="row px-2 px-md-4">
                <div class="col-12 mb-3">
                    <h6 class=" text-uppercase text-gray " >Informasi personal</h6>
                </div>
                
                <div class="col-md-6 mt-2 d-flex flex-column">
                    <h5>Nama Lengkap</h5>
                    <p class="mt-1 text-gray text-uppercase " >${data.admin_name}</p>
                </div>
                <div class="col-md-6 mt-2 d-flex flex-column">
                    <h5>Tanggal Lahir</h5>
                    <p class="mt-1 text-gray " >${data.admin_birth}</p>
                </div>
            
                <div class="col-md-6 mt-2 d-flex flex-column">
                    <h5>Jen. Kelamin</h5>
                    <p class="mt-1 text-gray " >${data.admin_gender}</p>
                </div>
            
                <div class="col-md-6 mt-2 d-flex flex-column">
                    <h5>Alamat</h5>
                    <p class="mt-1 text-gray " >${data.admin_address}</p>
                </div>
            <hr class="w-100 border-top " >
            </div>
            <div class="row px-2 px-md-4">
                <div class="col-12 mb-3">
                    <h6 class=" text-uppercase text-gray " >Informasi Kontak</h6>
                </div>
                <div class="col-md-6 mt-2 d-flex flex-column">
                    <h5>Email</h5>
                    <p class="mt-1 text-gray " >${data.user_email}</p>
                </div>
                <div class="col-md-6 mt-2 d-flex flex-column">
                    <h5>No Telp</h5>
                    <p class="mt-1 text-gray " >${data.admin_phone}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <img class="mx-auto border p-2 border-primary rounded rounded-circle" height="150" src="${data.user_photo}" alt="">
            <div class="mb-md-2 mt-3 mt-md-4 ">
                    <h4 class=" font-weight-medium" >
                                ${data.user_name}
                    </h4>
            </div>
            <div class="mb-md-4 ">
                    <small class=" text-muted " >
                            Bergabung Sejak : ${data.user_created}
                    </small>
            </div>
        </div>
    </div>
    `;
};

export { modalInfoAdminUI };
