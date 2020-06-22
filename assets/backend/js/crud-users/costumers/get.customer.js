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

export const getCostumer = (url, id, path) => {
	return $.ajax({
		type: "GET",
		url: url + id,
		async: false,
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

const updateUIModal = (data, path) => {
	const modalTitle = document.querySelector(".modal-title");

	modalTitle.innerHTML = `Detail of <span class=" font-italic text-primary  " >${data.user_name}</span> `;
	// console.log(object);
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
				<h5 class=" text-capitalize ">${data.cos_name}</h5>
			</div>
		</div>
		<br>
		<div class="row px-2">
			<div class="col-3 px-3 py-2">
				<h5 class="text-white-50" >ID Number</h5>
			</div>
			<div class="border-bottom col-8 px-3 py-2">
				<h5 class=" text-capitalize ">${data.cos_ID_num}</h5>
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
				<h5 class=" text-capitalize ">${data.cos_phone}</h5>
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
};
