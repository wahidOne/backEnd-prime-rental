import { AuthAlert } from "./components/auth/auth-alert.js";

import Dashboard from "./components/Dashboard/Dashboard.js";
import Transactions from "./components/transactions/transactions.js";

const modalErrorTransactions = document.querySelector(".alertSewa");

export const Apps = () => {
	AuthAlert();

	$("#IDcard_img").dropify({
		messages: {
			default: "Silahkan seret atau klik untuk upload gambar",
			replace: "Silahkan seret atau klik untuk upload gambar",
			remove: "Remove",
			error: "Ooops, something wrong happended.",
		},
	});

	if (modalErrorTransactions) {
		$("#alertSewa").modal("show");
	}

	new Transactions().render();

	new Dashboard().render();
};
