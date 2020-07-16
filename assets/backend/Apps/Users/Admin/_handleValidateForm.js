const validateFormAddAdminManual = (form) => {
	if (form) {
		$("#tambah-admin-manual").validate({
			rules: {
				admin_name: {
					required: true,
				},
				user_name: {
					required: true,
				},
				user_email: {
					email: true,
					required: true,
				},
				user_password: {
					required: true,
				},
				repeat_password: {
					equalTo: "#user_password",
					required: true,
				},
				admin_phone: {
					required: true,
				},
				admin_address: {
					required: true,
				},
				admin_birth: {
					required: true,
				},
				admin_gender: {
					required: true,
				},
			},
			messages: {
				admin_name: {
					required: "Nama lengkap harus diisi!",
				},
				user_name: {
					required: "Username harus diisi! ",
				},
				user_email: {
					email: "Masukan Email yang valid",
					required: "Alamat email harus diisi!",
				},
				user_password: {
					required: "Password harus diisi",
				},
				repeat_password: {
					equalTo: "Password tidak sama",
					required: "Silahkan ulangi passwordnya",
				},
				admin_address: {
					required: "Alamat  harus diisi!",
				},
				admin_phone: {
					required: "No telp harus diisi!",
				},
				admin_birth: {
					required: "Tanggal lahir harus diisi!",
				},
				admin_gender: {
					required: "Jenis Kelamin belum di pilih!",
				},
			},
			errorPlacement: function (label, element) {
				label.addClass("mt-1 text-danger");
				label.insertAfter(element);
			},

			submitHandler: (form) => {
				form.submit();
			},
		});
	}
};

export { validateFormAddAdminManual };
