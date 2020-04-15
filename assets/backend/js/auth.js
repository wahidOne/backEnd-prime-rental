$(".pesan-validasi-input").alert().delay(3000).slideUp("slow");

const pesanValidasi = document.querySelector(".pesan-validasi");
const pesanBukanEmailAdmin = document.querySelector(".pesan-blok");
const pesanBerhasilogin = document.querySelector(".toastrBerhasilLogin");
const pesanBerhasilRegistrasi = document.querySelector(".pesan_registrasi");
const pesanBerhasilLogout = document.querySelector(".pesan-signOut");

if (pesanValidasi) {
	const dataPesanValidasi = pesanValidasi.dataset.message;
	Swal.fire({
		icon: "error",
		title: "Maaf...",
		text: dataPesanValidasi,
		timer: 3500,
	});
}

toastr.options = {
	closeButton: true,
	debug: false,
	newestOnTop: false,
	progressBar: true,
	positionClass: "toast-top-right",
	preventDuplicates: false,
	onclick: null,
	showDuration: "300",
	hideDuration: "1000",
	timeOut: "6000",
	extendedTimeOut: "1000",
	showEasing: "swing",
	hideEasing: "linear",
	showMethod: "fadeIn",
	hideMethod: "fadeOut",
};

if (pesanBerhasilogin) {
	const dataPesan = pesanBerhasilogin;
	toastr.success(dataPesan, "Login Berhasil!  ");
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

if (pesanBerhasilRegistrasi) {
	const dataPesan = pesanBerhasilRegistrasi.dataset.message;
	Swal.fire({
		position: "center",
		icon: "success",
		title: "Registrasi Berhasil!",
		text: dataPesan,
		showConfirmButton: true,
	});
}

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
		toastr.error(pesanErrorForm + ", Silahakan gunakan email yang lain!");
	}
}

if (pesanBerhasilLogout) {
	const dataPesan = pesanBerhasilLogout.dataset.message;
	toastr.options = {
		closeButton: true,
		debug: false,
		newestOnTop: false,
		progressBar: true,
		positionClass: "toast-top-right",
		preventDuplicates: false,
		onclick: null,
		showDuration: "300",
		hideDuration: "1000",
		timeOut: "5000",
		extendedTimeOut: "1000",
		showEasing: "swing",
		hideEasing: "linear",
		showMethod: "fadeIn",
		hideMethod: "fadeOut",
	};
	toastr.success(dataPesan, "logout Berhasil!  ");
}
