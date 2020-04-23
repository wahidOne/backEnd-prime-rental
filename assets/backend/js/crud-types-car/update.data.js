export function updateData(url, data = {}, form, message) {
	return $.ajax({
		type: "POST",
		url: url,
		data: data,
		dataType: "json",
		success: function (response) {
			const { status, pesan } = response;

			message(pesan, status, status, true, "toast-top-right", "9000");
			form.reset();
			$("#collapse-insert").collapse("show");
			$("#collapse-update").collapse("hide");
			return response;
		},
		error: function (err) {
			console.log(err);
		},
	});
}
