import AlertService from "../Alert.service";

const handleAllAlert = () => {
	const flashSuccess = document.querySelector(".flash-success");

	if (flashSuccess) {
		new AlertService(".flash-success").init({
			position: "center",
			timer: 5000,
			showConfirmButton: true,
		});
	}
};

export { handleAllAlert };
