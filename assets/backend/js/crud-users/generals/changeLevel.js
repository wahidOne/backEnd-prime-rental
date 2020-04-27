export const changeLevel = (url, data, showMessage) => {
	return $.ajax({
		type: "POST",
		url: url,
		async: true,
		dataType: "json",
		data: data,
		success: function (res) {
			const { message, status } = res.response;

			showMessage(message, status, status, true, "toast-top-right", "9000");
			return res;
		},
	});
};
