import dataTableConfig from "./components/datatableConfig";
import CheckExpired from "../../../frontEnd/app/components/Dashboard/checkExpired";
import configEditor from "./components/configEditors";
import * as _confirmPayments from "./components/FormConfirmPayments";
import HandleAlert from "../components/_handleAlert";
import TransactionConfirm from "./components/Transaction.Confrim";

export default class Transactions {
	constructor() {
		this.domainName = mainDomain;
		this.table = document.querySelector("#table-rent");

		this.modal = document.querySelector("#container-modal");

		this.dateExpired = document.getElementsByClassName("date_exp");
		this.timeLeft = document.querySelector("#time_left");

		this.formConfirmSuccess = document.querySelector("#form-confirm-success");
		this.formConfirmDecline = document.querySelector("#form-confirm-decline");
		// confirmaction comp

		this.driverRow = document.querySelector(".selectdriver-row");
	}

	public() {
		$('[data-toggle="tooltip"]').tooltip();
		$(".konfirmasi-popover").popover({
			container: "body",
		});
		this.loadData();

		const tableRent = this.table;

		this.checkStatusPayment();
		this.confirmPayment();

		configEditor();

		new HandleAlert().render();
		new TransactionConfirm(this.driverRow, this.domainName).render();
	}

	loadData() {
		const tableRent = this.table;
		if (tableRent) {
			const urlLoad = tableRent.dataset.url;
			dataTableConfig(urlLoad);
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
		const formConfirmDec = this.formConfirmDecline;

		if (formConfirmSuccess) {
			_confirmPayments.FormConfirmPayments();
		}

		if (formConfirmDec) {
			_confirmPayments.FormConfirmPaymentsDecline();
		}
	}
}

const transactions = new Transactions();
transactions.public();
