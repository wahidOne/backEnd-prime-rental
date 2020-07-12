import AlertBackEndService from "./Alert-backEnd.service";

class HandleAlert {
	constructor() {
		this.alertSuccess = document.querySelector(".flash-success");
		this.alertInfo = document.querySelector(".flash-info");
		this.alerterror = document.querySelector(".flash-error");
	}

	render() {
		if (this.alertSuccess) {
			this.showAlertSuccess();
		}
		if (this.alertInfo) {
			this.showAlertInfo();
		}

		if (this.alerterror) {
			this.showAlertError();
		}
	}

	showAlertSuccess() {
		return new AlertBackEndService(".flash-success").init({
			position: "center",
			timer: 5000,
			showConfirmButton: true,
		});
	}

	showAlertInfo() {
		return new AlertService(".flash-info").init({
			position: "center",
			timer: false,
			showConfirmButton: true,
		});
	}
	showAlertError() {
		return new AlertService(".flash-error").init({
			position: "center",
			timer: 5000,
			showConfirmButton: true,
		});
	}
}

export default HandleAlert;
