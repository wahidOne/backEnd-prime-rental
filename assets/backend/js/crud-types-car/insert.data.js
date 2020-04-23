export function insertData(url = "", data = {}, showMessage, form) {
	// Default options are marked with *
	return $.ajax({
		type: "POST",
		url: url,
		data: data,
		dataType: "json",
		success: function (response) {
			const { status, pesan } = response;

			showMessage(pesan, status, status, true, "toast-top-right", "9000");
			form.reset();

			return response;
		},
		error: function (err) {
			console.log(err);
		},
	});

	// parses JSON response into native JavaScript objects
}
