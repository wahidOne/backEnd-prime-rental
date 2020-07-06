const loadingModal = (selector) => {
	let container = "";

	container += `
	<div  style="height: 40vh; " class="d-flex justify-content-center align-items-center flex-column ">
			<div class="spinner-border text-primary " role="status">
				
			</div>
			<span class=" text-white-50 mt-3 font-weight-bold ">Prepare data...</span>
	</div>
	`;

	selector.innerHTML = container;
};

export default loadingModal;
