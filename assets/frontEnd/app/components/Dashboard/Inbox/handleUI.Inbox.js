const displayList = (inbox, sender, userPath) => {
	const _sender = sender[0];

	return `
    <a href="${userPath}user/${inbox.user_id}/dashboard/inbox/${inbox.inbox_id}" class="message-link row py-2">
        <div class="col-2 text-center">
            <img class="rounded-circle" height="50" src="${userPath}assets/uploads/ava/${_sender.user_photo}" alt=""></div>
            <div class="col-10 d-flex flex-row align-items-center justify-content-between flex-wrap px-2">
            <h5 class="text-dark font-13px font-md-20px my-auto text-left flex-grow-1">
                ${_sender.admin_name}
            </h5>
            <div class="d-flex flex-row align-items-center justify-content-between flex-grow-1 text-dark">
                <p class="inbox__subject font-w-400 font-11px font-md-15px my-auto text-left">
                ${inbox.inbox_subject}
                </p>
                <small class="text-right text-dark flex-grow-1 ml-3">
                   ${inbox.date_format_sort}
                </small>
            </div>
        </div>
    </a>
    
    `;
};

const handleSortSubject = (selector) => {
	[...selector].map((title) => {
		let titleText = title.textContent
			.replace(/\s+/g, " ")
			.replace(/(\r\n|\n|\r)/gm, " ");
		const arrayText = titleText.split(" ");
		const content = title;

		let sortText;

		sortText = arrayText.splice(0, 12).join(" ");

		content.innerHTML = `${sortText} ...`;
	});
};

// exports = {
// 	handleSortSubject: handleSortSubject,
// 	listMessageUI: listMessageUI,
// };

const inboxTextTemplateOrderDecline = (data, domain) => {
	return `<div class="row mt-5 mb-4"> 
        <div class="col-md-8 mx-auto ">
        <div class="card card-bod p-3 border-0 shadow-sm ">
            <div class="d-flex flex-column justify-content-center align-items-center ">
                <i class="fas text-danger fa-times-circle fa-4x">
                </i>
                <br>
                <p class=" font-18px font-md-25px font-w-600 text-danger ">Pesanan Anda Ditolak</p>
            </div>
            <div class="d-flex mt-2 flex-column">

                <p class=" text-dark text-center ">Halo ${data.client_fullname} <br>
                    Maaf pesanan anda atas no pesan <span class=" text-w-600 font-20px " >${data.rent_id}</span> terpaksa kami tolak. <br> Dikarenakan anda terlambat melakukan pembayaran sesuai batas waktu yg ditentukan
                </p>
                <br><br>
                <div class="d-flex text-center justify-content-center ">
                    <h5>No pesanan:</h5>
                    <h5 class="ml-2 text-black-50"> ${data.rent_id}</h5>
                </div>
                <div class="d-flex text-left justify-content-center">
                    <h5> Total Pembyaran : </h5>
                    <h5 class="ml-2 text-black-50 "> ${data.rent_price_format}</h5>
                </div>
            </div>
            
            <div class="mx-auto mt-3">
                <a href="${domain}user/${data.user_id}/dashboard/transaksi/pembatalan?rentId=${data.rent_id}" class="btn btn-danger  ">
                    Lihat Detail Pesanan
                </a>
            </div>
            <br>
            <br>
            <br>
            <div class="d-flex flex-column mt-4 ">
                <span class=" text-black-50 ">From</span>
                <h3>PrimeRental</h3>
            </div>
        </div>
    </div>
</div>
    `;
};

export { handleSortSubject, displayList, inboxTextTemplateOrderDecline };

// export default listMessageUI;
