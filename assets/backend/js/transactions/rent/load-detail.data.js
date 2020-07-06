// import Axios from "axios";

export const detailRental = (url) => {
	$("#detail-modal").modal(
		{
			backdrop: "static",
			keyboard: false,
		},
		"show"
	);

	return $.ajax({
		type: "GET",
		url: url,
		async: true,
		dataType: "json",
		success: function (response) {
			loadingModal();

			const container = document.querySelector("#container-modal");
			let containData = "";

			containData += updateUImodal(response);

			setTimeout(() => {
				container.innerHTML = containData;
			}, 400);
		},
		error: function (err) {
			console.log(err);
		},
	});
};

const updateUImodal = ({ response }) => {
	return `
	<div class="row flex-grow  ">
		<div class="col-6 col-md-4 order-1">
			<h5 class="text-muted mb-1">To : </h5>
			<p class="ml-1 text-capitalize ">${response.user_name}</p>
			<p class="mb-2 ml-1">Bekasi</p>
			<h5 class="text-muted mb-1">Tgl Transaksi : </h5>
			<p class="mb-2 ml-2">${response.rent_date}</p>
		</div>
		<div class="col-sm-8 col-md-3 d-flex flex-column justify-content-start align-items-start order-3 order-md-2 ">
			<h5 class="text-muted mb-1">Tgl rental : </h5>
			<p class="ml-1"><span class="text-white-50">Mulai : </span>${
				response.rent_date_start
			} </p>
			<p class="mb-2 ml-1"><span class="text-white-50">Berakhir : </span>${
				response.rent_date_end
			} </p>
		</div>
		<div class="col-6 col-md-5 text-right order-2 order-md-3 ">
			<h5 class="text-muted">Total Harga</h5>
			<p class="display-4 mt-1">${response.rent_price}</p>
			<h5 class=" text-primary mt-2 text-uppercase ">${response.rent_type}</h5>
			<h5 class="text-muted mt-3">Status Sewa</h5>
			<p class=" display-5 text-capitalize ">${response.rent_status}</p>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-lg-6 mt-2 order-2">
			<div class="table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<td>Status pengembalian</td>
							<td class="text-right">${response.rent_return_status}</td>
						</tr>
						<tr>
							<td class="text-bold-800">Status Pembayaran</td>
							<td class="text-bold-800 text-right">${response.rent_pay_status}</td>
						</tr>
						<tr>
							<td class="text-bold-800">Total</td>
							<td class="text-bold-800 text-right">${response.rent_price}</td>
						</tr>
						<tr>
							<td>Denda</td>
							<td class="text-danger text-right">(-)</td>
						</tr>
						<tr class="bg-dark">
							<td class="text-bold-800">Total Pembayaran</td>
							<td class="text-bold-800 text-right">$ 12,000.00</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="col-lg-6 mt-2">
			<div class="table-responsive">
				<table class="table">

					<tbody>
						<tr>
							<td>Mobil</td>
							<td class="text-right">${response.car_brand}</td>
						</tr>
						<tr>
							<td>Harga Sewa/hari</td>
							<td class="text-right">${response.car_price}/hari</td>
						</tr>
						<tr>
							<td>Supir</td>
							<td class="text-right">${
								response.rent_type == "Pakai Supir"
									? '<span class="badge badge-primary"> ' +
									  response.rent_type +
									  "</span>"
									: '<span class="badge badge-primary-muted"> ' +
									  response.rent_type +
									  "</span>"
							}</td>
						</tr>
						<tr>
							<td>Tgl. max Pengembalian</td>
							<td class="text-right">${response.rent_date_max_return}</td>
						</tr>
						<tr>
							<td>Tgl Dikembalikan</td>
							<td class="text-right">${response.rent_date_returned}</td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>
	</div>
	`;
};

const loadingModal = () => {
	let container = "";

	const containerModal = document.querySelector("#container-modal");

	container += `
	<div  style="height: 40vh; " class="d-flex justify-content-center align-items-center flex-column ">
			<div class="spinner-border text-primary " role="status">
				
			</div>
			<span class=" text-white-50 mt-3 font-weight-bold ">Prepare data...</span>
	</div>
	`;

	containerModal.innerHTML = container;
};
