const configEditor = () => {
	// $("#summernote").summernote("createLink", {
	// 	text: "Invoice",
	// 	url: mainDomain,
	// 	isNewWindow: true,
	// });

	$("#summernote").summernote({
		placeholder: "Masukan pesan",
		tabsize: 2,
		height: 400,
	});
	$("#summernotePaymentDecline").summernote({
		placeholder: "Masukan pesan",
		tabsize: 2,
		height: 400,
	});
};

export default configEditor;
