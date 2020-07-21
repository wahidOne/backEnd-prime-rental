import {
	handleFormInputs
} from "../components/POST-backend.service";
import {
	handleToast
} from "./_handleAlertProfile";

class Profile {
	constructor(domain) {
		this.domain = domain;
		this._formChangePassword = document.querySelector("#change-password");
	}

	render() {

		this.changePassword();
	}

	changePassword() {
		if (this._formChangePassword) {
			$("#change-password").validate({
				rules: {
					current_password: {
						required: true,
						// min: 3,
					},
					new_password: {
						required: true,
						// min: 4,
					},
					repeat_password: {
						equalTo: "#new_password",
						required: true,
						// min: 4,
					},
				},
				messages: {
					current_password: {
						required: "Masukan password lama anda",
					},
					new_password: {
						required: "Masukan password baru!",
					},
					repeat_password: {
						equalTo: "Password tidak sama",
						required: "Ulangi password baru!",
					},
				},
				errorPlacement: function (label, element) {
					label.addClass("mt-1 text-danger");
					label.insertAfter(element);
				},

				submitHandler: (form) => {
					this.urlChangePw =
						this.domain + "administrator/profile/change-password";
					this.handlePostChangePassword(form);
				},
			});
		}
	}

	handlePostChangePassword(form) {
		const btnSubmit = form.querySelector("#submit");

		btnSubmit.disabled = true;
		btnSubmit.innerHTML = `
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
            `;

		const inputs = form.querySelectorAll("[data-post=change-password]");

		const dataPost = handleFormInputs(inputs);

		const config = {
			headers: {
				"Content-Type": "application/json",
			},
		};

		const resutlPost = this.postDataChangePassword(dataPost, config);

		resutlPost.then((res) => {
			const {
				status,
				message
			} = res.data;
			if (status == false) {
				handleToast({
					position: "bottom-end",
					icon: "error",
					message: "Opps.. " + message,
				});

				btnSubmit.disabled = false;
				btnSubmit.innerHTML = "Change";

				form.reset();
			} else {
				handleToast({
					position: "bottom-end",
					icon: "success",
					message: message,
				});

				btnSubmit.disabled = false;
				btnSubmit.innerHTML = "Change";

				form.reset();
			}
		});
	}

	postDataChangePassword(data, config) {
		try {
			return axios.post(this.urlChangePw, JSON.stringify(data), config);
		} catch (error) {
			console.log(error);
		}
	}
}

const profile = new Profile(mainDomain);

profile.render();
