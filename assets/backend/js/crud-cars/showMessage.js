export function showMessage(
	message,
	status,
	title,
	bar,
	position,
	time,
	duplicate = false
) {
	toastr.options = {
		closeButton: true,
		debug: false,
		newestOnTop: true,
		progressBar: bar,
		positionClass: position,
		preventDuplicates: duplicate,
		onclick: null,
		showDuration: "300",
		hideDuration: "1000",
		timeOut: time,
		extendedTimeOut: "1000",
		showEasing: "swing",
		hideEasing: "linear",
		showMethod: "fadeIn",
		hideMethod: "fadeOut",
	};
	if (typeof status == "string") {
		if (status.toLowerCase() == "berhasil") {
			toastr.success(message, title);
			return;
		}
		if (status.toLowerCase() == "gagal") {
			toastr.error(message, title);
		}
	}
}
