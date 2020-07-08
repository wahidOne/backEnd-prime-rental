const FormConfirmPayments = () => {
	$("#form-confirm-success").validate({
		rules: {
			inbox_subject: {
				required: true,
			},
		},
		messages: {
			inbox_subject: {
				required: "Masukan Subjek",
			},
		},
		errorPlacement: function (label, element) {
			label.addClass("mt-1 text-danger");
			label.insertAfter(element);
		},
		submitHandler: function (form) {
			const config = {
				// headers: {
				// 	"Content-Type": "application/x-www-form-urlencoded",
				// },
				headers: {
					"Content-Type": "application/json",
				},
			};

			const btnSubmit = form.querySelector("#form-submit");
			const inbox_to = form.querySelector("[name=inbox_to]");
			const inbox_from = form.querySelector("[name=inbox_from]");
			const inbox_subject = form.querySelector("[name=inbox_subject]");
			const inbox_title = form.querySelector("[name=inbox_title]");
			const inbox_text = form.querySelector("[name=inbox_text]");
			const rent_id = form.querySelector("[name=rent_id]");

			const data = {
				inbox_subject: inbox_subject.value,
				inbox_to: inbox_to.value,
				inbox_from: inbox_from.value,
				inbox_text: inbox_text.value,
				inbox_title: inbox_title.value,
				rent_id: rent_id.value,
			};

			const url = form.action;

			btnSubmit.disabled = true;
			btnSubmit.innerHTML = `
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
            `;

			axios
				.post(url, JSON.stringify(data), config)
				.then((res) => {
					if (res.data) {
						btnSubmit.disabled = false;
						btnSubmit.innerHTML = `Kirim`;
						$("#confirmPayment").modal("hide");

						const response = res.data.response;
						if (response.status == true) {
							const urlRedirect = response.redirect;

							// setTimeout(() => {
							// 	window.location.href = urlRedirect;
							// }, 500);

							setTimeout(() => {
								Swal.fire({
									title: "Konfirmasi Berhasil",
									text:
										" Konfirmasi pembayaran telah berhasil, selanjutnya anda akan diarahkan kehalaman transaski ",
									icon: "success",
									showCancelButton: false,
									confirmButtonText: "Ok, Ke halaman transaksi",
								}).then((result) => {
									window.location.href = urlRedirect;
								});
							}, 1000);
						}
					}
				})
				.catch((err) => console.log(err));
		},
	});
};

const FormConfirmPaymentsDecline = () => {
	$("#form-confirm-decline").validate({
		rules: {
			inbox_subject: {
				required: true,
			},
		},
		messages: {
			inbox_subject: {
				required: "Masukan Subjek",
			},
		},
		errorPlacement: function (label, element) {
			label.addClass("mt-1 text-danger");
			label.insertAfter(element);
		},
		submitHandler: function (form) {
			const config = {
				// headers: {
				// 	"Content-Type": "application/x-www-form-urlencoded",
				// },
				headers: {
					"Content-Type": "application/json",
				},
			};

			const btnSubmit = form.querySelector("#form-submit");
			const inbox_to = form.querySelector("[name=inbox_to]");
			const inbox_from = form.querySelector("[name=inbox_from]");
			const inbox_subject = form.querySelector("[name=inbox_subject]");
			const inbox_title = form.querySelector("[name=inbox_title]");
			const inbox_text = form.querySelector("[name=inbox_text]");
			const rent_id = form.querySelector("[name=rent_id]");

			const data = {
				inbox_subject: inbox_subject.value,
				inbox_to: inbox_to.value,
				inbox_from: inbox_from.value,
				inbox_text: inbox_text.value,
				inbox_title: inbox_title.value,
				rent_id: rent_id.value,
			};

			const url = form.action;

			btnSubmit.disabled = true;
			btnSubmit.innerHTML = `
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
            `;

			axios
				.post(url, JSON.stringify(data), config)
				.then((res) => {
					if (res.data) {
						btnSubmit.disabled = false;
						btnSubmit.innerHTML = `Kirim`;
						$("#declinePayment").modal("hide");

						const response = res.data.response;
						if (response.status == true) {
							const urlRedirect = response.redirect;
							setTimeout(() => {
								Swal.fire({
									title: "Konfirmasi Berhasil",
									text:
										"Penolakan bukti pembayaran telah berhasil, selanjutnya anda akan diarahkan kehalaman transaski ",
									icon: "success",

									confirmButtonText: "Ok, Ke Halaman Transaksi",
									cancelButtonText: "Close",
									showCancelButton: true,
								}).then((result) => {
									if (result.dismiss == true) {
										window.location.href = urlRedirect;
									} else {
										window.location.reload();
									}
								});
							}, 1000);
						}
					}
				})
				.catch((err) => console.log(err));
		},
	});
};

export { FormConfirmPayments, FormConfirmPaymentsDecline };
