import { showAlertDate } from "./alert-transactions.js";

class Transactions {
	constructor() {
		this.shoAlert = showAlertDate();
		this.statusMoreCustomerCollapse = false;
		this.invoiceMoreCustomer = document.querySelector("#more-customer");

		this.serviceRentalSelect = document.querySelector("#service_rental");
		this.statusShowInputPickUpAddress = false;

		this.selectDestinations = document.querySelector("#destination");
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
