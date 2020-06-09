import Swal from "sweetalert2";

const alertDate = document.querySelector(".alert-date-rental");

export const showAlertDate = () => {
	if (alertDate) {
		const message = alertDate.dataset.message;
		Swal.fire({
			icon: "info",
			title: "Oops...",
			text: message,
		});
	}
};
