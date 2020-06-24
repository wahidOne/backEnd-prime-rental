import Swal from "sweetalert2";

class Profile {
	constructor() {
		this.alertUploadSuccess = document.querySelector(".upload-success");
		this.formProfile = [...document.querySelectorAll("#formProfile")];
	}

	render() {
		this.alert();
		this.update();
	}

	alert() {
		if (this.alertUploadSuccess) {
			const message = this.alertUploadSuccess.dataset.message;
			Swal.fire({
				position: "center",
				icon: "success",
				title: message,
				showConfirmButton: false,
				timer: 2000,
			});
		}
	}

	update() {
		console.log(this.formProfile);
		if (this.formProfile) {
			$("#formProfile").validate({
				rules: {
					user_name: {
						required: true,
					},
					fullname: {
						required: true,
					},
					no_ktp: {
						required: true,
						number: true,
					},
					no_hp: {
						number: true,
						min: 13,
						required: true,
					},
					alamat: {
						required: true,
					},
				},
				// messages: {
				// 	fullname: {
				// 		required: "Lengkapi kolom ini",
				// 	},
				// 	no_ktp: {
				// 		required: "Lengkapi kolom No KTP",
				// 	},
				// 	no_hp: {
				// 		required: "Lengkapi kolom No KTP",
				// 	},
				// },
				errorPlacement: function (label, element) {
					let formGroup = element[0].parentElement.parentElement;

					const oldSpanMessage = [
						...formGroup.querySelectorAll("#error-input"),
					];
					let spanMessage = document.createElement("span");

					if (oldSpanMessage.length > 0) {
						oldSpanMessage.map((span) => {
							formGroup.removeChild(span);
						});
					}

					spanMessage.className = "mt-2 text-danger font-12px ";
					spanMessage.id = "error-input";
					spanMessage.innerHTML = label[0].innerHTML;
					formGroup.appendChild(spanMessage);
				},
				submitHandler: function (form) {
					form.submit();
				},
			});
		}
	}
}

export default Profile;
