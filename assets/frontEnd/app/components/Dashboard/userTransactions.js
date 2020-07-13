import Axios from "axios";
import CheckExpired from "./checkExpired";

import * as HandleAlert from "./_handleAlert";
import Inbox from "./Inbox";
import Swal from "sweetalert2";

class UserTransaction {
	constructor(mainDomain) {
		this.dateExpired = document.getElementsByClassName("date_expired");
		this.remainingTime = document.querySelector("#remaining_time");
		this.alertContainer = [];
		this.maindomain = mainDomain;
		this.formConfirmData = document.querySelector("#formConfirmData");
		this.btnCancelOrder = document.querySelectorAll("#btn-cancel");
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
		this.confirmData();

		HandleAlert.handleAllAlert();

		if (this.btnCancelOrder) {
			[...this.btnCancelOrder].map((btn) =>
				btn.addEventListener("click", (e) => this.handleCancelOrder(e))
			);
		}
	}

	checkStatusPay() {
		const elementExpired = this.dateExpired;

		if (elementExpired) {
			const eExp = [...elementExpired];
			eExp.map((e) => {
				const checkExpiredPay = new CheckExpired(e);

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
									const {
										status,
										url_send_inbox,
										result,
										domain,
									} = response.data;

									if (status == true) {
										new Inbox().autoSendInboxOrderDecline(
											domain,
											url_send_inbox,
											result
										);
									}
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

	confirmData() {
		if (this.formConfirmData) {
			$("#formConfirmData").validate({
				rules: {
					client_ID_num: {
						number: true,
						min: 13,
						required: true,
					},
				},
				messages: {
					client_ID_num: {
						required: "Lengkapi kolom diatas!",
					},
				},
				errorPlacement: function (label, element) {
					// if (element[0].id == "client_file_IDcard") {
					// 	const colElement = element[0].parentElement.parentElement;
					// 	label.addClass("mt-1 text-danger");
					// 	label.insertAfter(colElement);
					// } else {
					label.addClass("mt-1 text-danger");
					label.insertAfter(element);
					// }
				},
				submitHandler: function (form) {
					form.submit();
				},
			});
		}
	}

	handleCancelOrder(e) {
		e.preventDefault();
		const url = this.maindomain + "";
		const event = e.target;
		if (e.target.id == "btn-cancel" || e.target.parentNode.id == "btn-cancel") {
			const dataRentId =
				event.dataset.rentid || event.parentNode.dataset.rentid;
			const dataUserId =
				event.dataset.userid || event.parentNode.dataset.userid;

			const url =
				this.maindomain +
				"user/" +
				dataUserId +
				"/dashboard/transaksi/pembatalan-pesanan/" +
				dataRentId;

			Swal.fire({
				title: "Anda Yakin Ingin?",
				text: "Membatalkan Pesanan Anda!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Ya, Batalkan!",
			}).then((result) => {
				if (result.value) {
					// Swal.fire("Deleted!", "Your file has been deleted.", "success");
					Axios.get(url).then((res) => {
						const { status, message } = res.data.response;
						if (status == true) {
							Swal.fire({
								title: "Dibatalkan",
								html: message,
								icon: "success",
								timer: false,
								showConfirmButton: true,
							}).then((result) => {
								if (result.value) {
									// setInterval(() => {
									window.location.reload();
									// }, 1000);
								}
							});
						}
					});
				}
			});
		}
	}
}

export default UserTransaction;
