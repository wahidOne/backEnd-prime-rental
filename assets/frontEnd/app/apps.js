import { AuthAlert } from "./components/auth/auth-alert.js";

import { transactions } from "./components/transactions/transactions.js";
import Dashboard from "./components/Dashboard/Dashboard.js";

const modalErrorTransactions = document.querySelector(".alertSewa");

export const Apps = () => {
	AuthAlert();

	if (modalErrorTransactions) {
		$("#alertSewa").modal("show");
	}
	transactions();

	new Dashboard().render();
};
