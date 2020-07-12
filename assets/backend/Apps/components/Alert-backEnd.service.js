class AlertBackEndService {
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
}

export default AlertBackEndService;
