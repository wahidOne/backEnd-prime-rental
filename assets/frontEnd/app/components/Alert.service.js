import Swal from "sweetalert2";

class AlertService {
	constructor(selector) {
		this.selector = selector;
		this.element;

		this.config = {
			position: "center",
			timer: 1000,
			showConfirmButton: true,
		};
	}

	get getSelector() {
		let element;

		const selector = this.selector;
		if (typeof selector == "string") {
			const getStatus = selector.charAt(0);
			if (getStatus == ".") {
				const classSelector = selector.substr(1);
				element = document.getElementsByClassName(classSelector);
			} else if (getStatus == "#") {
				const classSelector = selector.substr(1);
				element = document.getElementById(classSelector);
			}
			return element;
		}
	}

	init({ position = "center", timer = 1000, showConfirmButton = true }) {
		this.element = [...this.getSelector];

		if (this.element.length > 0) {
			this.element.map((el) => {
				const dataStatus = el.dataset.status;
				const title = el.dataset.title;
				const text = el.dataset.text;

				this.showAlert(
					dataStatus,
					title,
					text,
					position,
					timer,
					showConfirmButton
				);
				// if (dataStatus == "success") {
				// 	this.success(dataStatus, message, position, timer, showConfirmButton);
				// } else if (dataStatus == "info") {
				// 	this.info(dataStatus, message, position, timer, showConfirmButton);
				// } else if (dataStatus == "error") {
				// 	this.info(dataStatus, message, position, timer, showConfirmButton);
				// }
			});
		}
	}

	showAlert(status, title = false, text, position, timer, showConfirmButton) {
		return Swal.fire({
			position: position,
			icon: status,
			title: title,
			text: text,
			showConfirmButton: showConfirmButton,
			timer: timer,
		});
	}

	// info() {
	// 	console.log("info");
	// }

	// error() {
	// 	console.log("error");
	// }
}

export default AlertService;
