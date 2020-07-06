import loadingModal from "./loadingModal";
import modalInvoiceContentUI from "./modal-Invoice-content";

class Invoice {
	constructor() {
		this.modal = document.querySelector("#container-modal");
	}

	fetchData(url) {
		const containerModal = this.modal;

		return axios
			.get(url)
			.then(function (response) {
				$("#detail-modal").modal(
					{
						backdrop: "static",
						keyboard: false,
					},
					"show"
				);

				const rentId = response.data.response.rent_id;
				const ModalContent = containerModal.parentElement.parentElement;
				const modalTitle = ModalContent.children[0].children[0];

				modalTitle.innerHTML = "Wait a minute....";
				loadingModal(containerModal);

				let containData = "";

				containData += modalInvoiceContentUI(response.data);

				setTimeout(() => {
					containerModal.innerHTML = containData;
					modalTitle.innerHTML = `Invoice ${rentId}`;
				}, 400);
			})
			.catch(function (error) {
				// handle error
				console.log(error);
			});
	}
}

export default Invoice;
