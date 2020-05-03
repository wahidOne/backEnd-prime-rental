export const detailDriver = (url, id, path) => {
	return $.ajax({
		type: "GET",
		url: url + id,
		async: true,
		dataType: "json",
		success: function (res) {
			$("#m-info").modal(
				{
					backdrop: "static",
					keyboard: false,
				},
				"show"
			);

			loadingModal();
			let container = "";

			const containerModal = document.querySelector("#container-modal");

			container += updateUIModal(res, path);

			setTimeout(() => {
				containerModal.innerHTML = container;
			}, 500);
		},
	});
};

const loadingModal = () => {
	let container = "";

	const containerModal = document.querySelector("#container-modal");

	container += `
	<div  style="height: 40vh; " class="d-flex justify-content-center align-items-center ">
			<div class="spinner-border text-primary " role="status">
				<span class="sr-only">Loading...</span>
			</div>
	</div>
	`;

	containerModal.innerHTML = container;
};

const updateUIModal = (data, path) => {
	return `
<div class="row">
	<div class="col-12 col-md-4 text-center">
		<img class="mx-auto shadow  rounded rounded-circle" height="150" src="${
			path + data.user_photo
		}" alt="">
		<div class="mb-md-4 mt-3 ">
			<h5 class=" text-white display-3 ">${data.user_name} </h5>
			<span class=" text-primary "> ${data.user_status} </span>
		</div>
	</div>
	<div class="col-md-8 pt-md-0  mt-3 mt-md-0">
		<hr class=" d-md-none ml-2 border-top " style="width: 100%">
		<div class="col-12">
			<span class=" font-weight-bold text-primary">Contact Infomation</span>
			<div class="mt-2  row pl-3">
				<div class="col-8 col-md-10 col-lg-8 mt-2 d-flex justify-content-between">
					<h6 class="text-white-50" >Username</h6>
					<h6>${data.user_name}</h6>
				</div>
				<div class="col-8 col-md-10 col-lg-8 mt-2 d-flex justify-content-between">
					<h6  class="text-white-50">Email</h6>
					<h6>${data.user_email}</h6>
				</div>
				<div class="col-8 col-md-10 col-lg-8 mt-2 d-flex justify-content-between">
					<h6  class="text-white-50">Phone number</h6>
					<h6>${data.driver_phone}</h6>
				</div>
			</div>
		</div>
		<div class="col-12 mt-3">
			<span class=" font-weight-bold  text-primary">Basic Infomation</span>
			<div class="mt-2  row pl-3">
				<div class="col-8 col-md-10 col-lg-8 mt-2 d-flex justify-content-between">
					<h6 class="text-white-50" >Full Name</h6>
					<h6 >${data.driver_name}</h6>
				</div>
				<div class="col-8 col-md-10 col-lg-8 mt-2 d-flex justify-content-between">
					<h6 class="text-white-50">ID number</h6>
					<h6>${data.driver_ID_number}</h6>
				</div>
				<div class="col-8 col-md-10 col-lg-8 mt-2 d-flex justify-content-between">
					<h6 class="text-white-50">Joined</h6>
					<h6>${data.user_created}</h6>
				</div>
				<div class="col-8 col-md-10 col-lg-8 mt-2 d-flex justify-content-between">
					<h6 class="text-white-50">Status</h6>
					<h6>${data.driver_status}</h6>
				</div>
			</div>
		</div>
	</div>
</div>
	
	`;
};

export const changeLevel = (url, id) => {
	return $.ajax({
		type: "POST",
		url: url + id,
		async: true,
		dataType: "json",
		success: function (res) {
			Swal.fire("Deleted!", res.message, "success");
			return res;
		},
	});
};
