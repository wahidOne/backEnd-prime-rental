const handleDropifyFile = () => {
	$("#client_file_IDcard").dropify({
		messages: {
			default: "Silahkan seret atau klik untuk upload gambar",
			replace: "Silahkan seret atau klik untuk upload gambar",
			remove: "Remove",
			error: "Ooops, something wrong happended.",
		},
	});
};

export { handleDropifyFile };
