import dataTableConfig from "./components/datatableConfig";
import Invoice from "./components/Invoice";
import CheckExpired from "../../../frontEnd/app/components/Dashboard/checkExpired";
import configEditor from "./components/configEditors";
import FormConfirmPayments from "./components/FormConfirmPayments";

class Transactions {
	constructor() {
		this.table = document.querySelector("#table-rent");

		this.modal = document.querySelector("#container-modal");

		this.dateExpired = document.getElementsByClassName("date_exp");
		this.timeLeft = document.querySelector("#time_left");

		this.formConfirmSuccess = document.querySelector("#form-confirm-success");
	}

	public() {
		this.loadData();

		const tableRent = this.table;

		if (this.table) {
			tableRent.addEventListener("click", (e) => this.tableActions(e));
		}

		this.checkStatusPayment();
		this.confirmPayment();

		configEditor();
	}

	loadData() {
		const tableRent = this.table;
		if (tableRent) {
			const urlLoad = tableRent.dataset.url;
			dataTableConfig(urlLoad);
		}
	}

	tableActions(e) {
		const invoice = new Invoice();

		if (e.target.id == "btn-info" || e.target.parentNode.id == "btn-info") {
			e.preventDefault();

			// const Id = e.target.dataset.id  || e.target.parentNode.dataset.id
			// ;
			const urlGetInvoice = e.target.href || e.target.parentNode.href;

			invoice.fetchData(urlGetInvoice);
		}
	}

	checkStatusPayment() {
		const dateLimit = this.dateExpired;
		const timeLeft = this.timeLeft;

		if (dateLimit) {
			[...dateLimit].map((element) => {
				const checkExp = new CheckExpired(element);

				const theTimer = setInterval(() => {
					checkExp.countRemeaning().then((res) => {
						const { distance, days, hours, minutes, seconds } = res;

						if (timeLeft) {
							if (distance > 0) {
								timeLeft.innerHTML = `<span class=" text-info mr-2 " >Waktu tersisa </span> <h5 class=" text-info font-weight-light " > ${days}H  ${hours}j ${minutes}m ${seconds}d</h5>`;
							} else {
								timeLeft.innerHTML = "<span class='text-danger'>Expired</span>";
							}
						}
					});
				}, 1000);
			});
		}
	}

	confirmPayment() {
		const formConfirmSuccess = this.formConfirmSuccess;

		if (formConfirmSuccess) {
			FormConfirmPayments();
		}
	}
}

const transactions = new Transactions();

transactions.public();
