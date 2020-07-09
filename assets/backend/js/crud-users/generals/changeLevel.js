export const changeLevel = (url, data, showMessage) => {
	console.log(url);
	console.log(data);
	return $.ajax({
		type: "POST",
		url: url,
		async: true,
		dataType: "json",
		data: data,
		success: function (res) {
			const { message, status } = res.response;

			console.log(res);

			showMessage(message, status, status, true, "toast-top-right", "9000");
			return res;
		},
	});
};
