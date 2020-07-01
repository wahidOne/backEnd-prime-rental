import { showAlertDate } from "./alert-transactions.js";

class Transactions {
	constructor() {
		this.shoAlert = showAlertDate();
		this.statusMoreCustomerCollapse = false;
		this.invoiceMoreCustomer = document.querySelector("#more-customer");

		this.serviceRentalSelect = document.querySelector("#service_rental");
		this.statusShowInputPickUpAddress = false;

		this.selectBank = document.querySelector("#select-bank");

		this.infoBanking = document.querySelector("#info-banking");

		this.selectDestinations = document.querySelector("#destination");
	}

	loadingInfoBanking() {
		return `
		<span class=" text-black-50 mx-auto ">
			<div class="spinner-border mx-auto text-secondary" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</span>
		`;
	}

	render() {
		this.popOvers();
		this.toolTips();

		const serviceSelect = this.serviceRentalSelect;
		if (this.serviceRentalSelect) {
			const formPickUpAddress = document.querySelector("#formPickUpAddress");
			this.serviceRentalSelect.addEventListener("change", function (event) {
				console.log(event.target.value);

				const value = event.target.value;

				if (value == 2 || value == 3) {
					formPickUpAddress.classList.remove("d-none");
				} else {
					formPickUpAddress.classList.add("d-none");
				}
			});
		}

		const containInfoBanking = this.infoBanking;

		const loader = this.loadingInfoBanking();

		if (this.selectBank) {
			const btnSumbit = document.querySelector("#btn-submit");
			this.selectBank.addEventListener("change", function (event) {
				const optionSelected = event.target.options[event.target.selectedIndex];

				let bodyCointainInfoBanking = "";

				if (containInfoBanking) {
					const infoBankingName = containInfoBanking.children[0];
					const infoBankingNumber = containInfoBanking.children[1];

					let _infoBankingNameContent = "";
					let _infoBankingNumberContent = "";

					bodyCointainInfoBanking += loader;

					containInfoBanking.innerHTML = bodyCointainInfoBanking;

					const bankingNumberOption = optionSelected.dataset.no;

					const bankingValueOption = optionSelected.dataset.name;

					_infoBankingNameContent += bankingValueOption;
					_infoBankingNumberContent += bankingNumberOption;
					btnSumbit.disabled = true;

					setTimeout(() => {
						bodyCointainInfoBanking = "";
						infoBankingName.innerHTML = `<span class=" text-info font-weight-bold " >${_infoBankingNameContent}  :</span> `;
						infoBankingNumber.innerHTML = `<span class=" text-info " >${_infoBankingNumberContent}</span>`;

						containInfoBanking.innerHTML = "";

						containInfoBanking.appendChild(infoBankingName);
						containInfoBanking.appendChild(infoBankingNumber);

						btnSumbit.disabled = false;
					}, 1000);
				}
			});
		}

		if (this.selectDestinations) {
			$("#destination").selectpicker({
				title: "Pilih kota tujuan anda",
			});
		}
	}

	toolTips() {}

	popOvers() {
		$("#info-fasilitas").popover({
			container: "body",
			placement: "right",
			html: true,
			template: `
			<div class="popover border-0 shadow py-2 px-2" role="tooltip"><div class="arrow"></div>
			<h3 class="popover-header"></h3>
			<div class="popover-body"></div>
			</div>'
			`,
			content: `
			<div class="row  " >
				<div class="col-6 font-weight-bold text-wrap ">Self Driver : </div>
				<div class="col text-left pl-0" >
					Pelayanan Sewa Mobil Lepas Kunci Dan Tanpa Biaya BBM
				</div>
			</div>
			<div class="row ">
				<div class="col-6 font-weight-bold text-wrap ">With Driver : </div>
				<div class="col text-left pl-0" >
					Pelayanan Sewa Dengan Supir Dan Tanpa Biaya BBM.
				</div>
			</div>
			<div class="row ">
				<div class="col-6 font-weight-bold p">All In : </div>
				<div class="col text-left pl-0" >
				Pelayanan Sewa Mobil Dengan Driver dan BBM.
				</div>
			</div>
			`,
			// template: "tesss",
		});
	}
}

export default Transactions;
