import Swal from "../../../../global-plugins/sweetalert2/src/sweetalert2.js";

export const AuthAlert = () => {
	const alertError = document.querySelector(".auth-message");
	const alertSuccess = document.querySelector(".auth-success");

	if (alertError) {
		const alertMessage = alertError.dataset.message;

		Swal.fire("Oops...", alertMessage, "error");
	}

	if (alertSuccess) {
		const alertMessage = alertSuccess.dataset.message;
		const Toast = Swal.mixin({
			toast: true,
			position: "top-end",
			showConfirmButton: false,
			timer: 4000,
			timerProgressBar: true,
			onOpen: (toast) => {
				toast.addEventListener("mouseenter", Swal.stopTimer);
				toast.addEventListener("mouseleave", Swal.resumeTimer);
			},
		});

		Toast.fire({
			icon: "success",
			title: alertMessage,
		});
	}
};
