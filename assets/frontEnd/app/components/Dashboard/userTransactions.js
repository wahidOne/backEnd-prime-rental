import Axios from "axios";
import CheckExpired from "./checkExpired";

class UserTransaction {
	constructor() {
		this.dateExpired = document.getElementsByClassName("date_expired");
		this.remainingTime = document.querySelector("#remaining_time");
		this.alertContainer = [];
	}

	render() {
		$("#payment_proof").dropify({
			messages: {
				default: "Silahkan upload bukti pembayaran anda",
				replace: "Silahkan upload bukti pembayaran anda",
				remove: "Remove",
				error: "Ooops, something wrong happended.",
			},
		});

		this.checkStatusPay();
	}

	checkStatusPay() {
		const elementExpired = this.dateExpired;

		if (elementExpired) {
			const eExp = [...elementExpired];
			eExp.map((e) => {
				const checkExpiredPay = new CheckExpired(e);

				// data.start();

				const timer = setInterval(() => {
					checkExpiredPay.countRemeaning().then((res) => {
						const { distance, days, hours, minutes, seconds } = res;

						if (this.remainingTime) {
							if (distance > 0) {
								this.remainingTime.innerHTML = `${days}H  ${hours}j ${minutes}m ${seconds}d`;
							} else {
								this.remainingTime.innerHTML =
									"<span class='text-danger'>Expired</span>";
							}
						}

						const urlSetExpired = e.dataset.url;
						if (distance < 0) {
							checkExpiredPay.stop(timer);

							Axios.get(urlSetExpired)
								.then(function (response) {
									console.log(response);
								})
								.catch(function (error) {
									// handle error
									console.log(error);
								});
						}
					});
				}, 1000);
			});
		}
	}
}

export default UserTransaction;
