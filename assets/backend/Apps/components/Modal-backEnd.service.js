const loadingModal = (modal) => {
	let container = "";

	const containerModal = modal.querySelector(".container-modal");

	container += `
	<div  style="height: 40vh; " class="d-flex justify-content-center align-items-center ">
			<div class="spinner-border text-primary " role="status">
				<span class="sr-only">Loading...</span>
			</div>
	</div>
	`;
	if (modal) {
		containerModal.innerHTML = container;
	}
};

export { loadingModal };
