const pesanBerhasilogin = document.querySelector(".toastr--Login");

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
	timeOut: "9000",
	extendedTimeOut: "1000",
	showEasing: "swing",
	hideEasing: "linear",
	showMethod: "fadeIn",
	hideMethod: "fadeOut",
};

if (pesanBerhasilogin) {
	console.log("ok");
	const dataPesan = pesanBerhasilogin.dataset.message;
	toastr.success(dataPesan, " Login Berhasil!  ");
}
