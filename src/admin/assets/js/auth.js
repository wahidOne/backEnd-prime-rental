$(".pesan-validasi-input").alert().delay(3000).slideUp("slow");

const pesanValidasi = document.querySelector(".pesan-validasi");
const pesanBukanEmailAdmin = document.querySelector(".pesan-blok");

if (pesanValidasi) {
	const dataPesanValidasi = pesanValidasi.dataset.message;
	Swal.fire({
		icon: "error",
		title: "Maaf...",
		text: dataPesanValidasi,
		timer: 3500,
	});
}

if (pesanBukanEmailAdmin) {
	const dataPesanBukanEmailAdmin = pesanBukanEmailAdmin.dataset.message;
	Swal.fire({
		icon: "error",
		title: "Maaf...",
		text: dataPesanBukanEmailAdmin,
		showCloseButton: true,
	});
}

toastr.options = {
	closeButton: true,
	debug: false,
	newestOnTop: false,
	progressBar: true,
	rtl: false,
	positionClass: "toast-bottom-right",
	preventDuplicates: false,
	onclick: null,
	showDuration: 100,
	hideDuration: 200,
	timeOut: 6000,
	extendedTimeOut: 100,
	showEasing: "swing",
	hideEasing: "linear",
	showMethod: "fadeIn",
	hideMethod: "hide",
};

// function panggilToatsr() {
// 	pesanForm.map((element, index) => {
// 		const pesan = element.dataset.validation;
// 		setTimeout(() => {
// 			toastr["error"](pesan);
// 		}, 300 * (1 + index));
// 	});
// }

const checkEmailIsAlreadyExits = document.querySelector(".toats-validatasi");

if (checkEmailIsAlreadyExits) {
	const pesanErrorForm = checkEmailIsAlreadyExits.textContent;
	if (pesanErrorForm.includes("terdaftar")) {
		toastr.options = {
			positionClass: "toast-top-full-width",
		};
		toastr["error"](pesanErrorForm + ", Silahakan gunakan email yang lain!");
	}
}
