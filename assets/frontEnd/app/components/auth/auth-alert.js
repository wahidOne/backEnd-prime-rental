import Swal from "sweetalert2";

export const AuthAlert = () => {
	const alertError = document.querySelector(".auth-message");
	const alertSuccess = document.querySelector(".auth-success");
	const registerSuccess = document.querySelector(".register-success");
	console.log(registerSuccess);

	if (registerSuccess) {
		const alertMessage = registerSuccess.dataset.message;

		Swal.fire({
			icon: "success",
			title: "Selamat Bergabung!",
			text: alertMessage,
			showConfirmButton: true,
		});
	}

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
