const handleModalClientUI = (modal, data, path, domain = "", transaction) => {
	const modalTitle = modal.querySelector(".modal-title");
	modalTitle.innerHTML = `Detail of <span class=" font-italic text-primary  " >${data.client_fullname}</span>`;

	let navcontain = "";
	let profileTabContain = "";
	let clientTransactionTbody = "";

	profileTabContain += profileTabContent(data, path);
	let no = 1;
	transaction.map(
		(trans) =>
			(clientTransactionTbody += transactionClientTbody(trans, no++, domain))
	);
	navcontain += navTab();

	return `
    <div class="row pl-0 ">
        <div class="col-12 col-md-4 text-center  px-0 border-right">
            <img class="mx-auto border p-2 border-primary rounded rounded-circle" height="150" src="${
							path + data.user_photo
						}" alt="">
            <div class="mb-md-2 mt-3 mt-md-4 ">
               <h4 class=" font-weight-medium " >
                        ${data.user_name}
               </h4>
            </div>
            <div class="mb-md-4 ">
               <small class=" text-muted " >
                    Bergabung Sejak : ${data.user_created}
               </small>
            </div>
           ${navcontain}
        </div>
        <div class="col-md-8 pt-md-0  mt-3 mt-md-0">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">${profileTabContain}
            </div>
            
                <div class="tab-pane fade" id="v-pills-transaction" role="tabpanel" aria-labelledby="v-pills-transaction-tab">
                <div class="row">
                <div class="col-12 mb-3">
                <h6 class=" text-uppercase text-gray " >Data Transaksi Klien</h6>
            </div>
            
                <div class="col-12">
                    <div class="table-responsive">
                        <table class=" table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Transaksi</th>
                                    <th>Tgl Pesan</th>
                                    <th>Mobil</th>
                                    <th>Total Harga</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                ${clientTransactionTbody}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                </div>
        </div>
        </div>
    </div>
        `;
};

const navTab = () => {
	return `
    <div class="nav mt-3 mt-md-1  justify-content-center flex-row flex-md-column nav-pills nav-pills-prime px-0 mx-auto " id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link  active text-left " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">
            <i class="fad fa-id-card fa-fw mr-2 "></i> Profile
        </a>
        <a class="nav-link text-left" id="v-pills-transaction-tab" data-toggle="pill" href="#v-pills-transaction" role="tab" aria-controls="v-pills-transaction" aria-selected="false">
        <i class="fas fa-handshake-alt fa-fw mr-2"></i> Transaction
        </a>
    </div>
    `;
};

const transactionClientTbody = (data, no, domain) => {
	return `
        <tr>
            <td>${no}</td>
            <td>${data.rent_id}</td>
            <td>${data.rent_date}</td>
            <td>${data.car_brand}</td>
            <td>Rp. ${data.payment_total}</td>
        </tr>
    `;
};

const profileTabContent = (data, path) => {
	return `
        <div class="row px-2 px-md-4">
            <div class="col-12 mb-3">
                <h6 class=" text-uppercase text-gray " >Informasi personal</h6>
            </div>
            
            <div class="col-md-6 mt-2 d-flex flex-column">
                <h5>Nama Lengkap</h5>
                <p class="mt-1 text-gray " >${data.client_fullname}</p>
            </div>
            <div class="col-md-6 mt-2 d-flex flex-column">
                <h5>No Identitas</h5>
                <p class="mt-1 text-gray " >${data.client_ID_num}</p>
            </div>
           
            <div class="col-md-6 mt-2 d-flex flex-column">
                <h5>Alamat</h5>
                <p class="mt-1 text-gray " >${data.client_address}</p>
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
                <p class="mt-1 text-gray " >${data.client_phone}</p>
            </div>
        </div>
    `;
};
export { handleModalClientUI };
