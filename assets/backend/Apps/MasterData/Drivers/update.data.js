import { handleDataPost } from "./handle.data";

const postUpdateDataDriver = (form, url) => {
	const btnSubmit = form.querySelector("#btn-submit");

	btnSubmit.innerHTML = `
        <span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>
        <small>Loading...</small>
    `;

	const inputs = form.querySelectorAll("[data-update]");

	const data = handleDataPost(inputs);
	const config = {
		headers: {
			"Content-Type": "application/json",
		},
	};
	try {
		const response = axios.post(url, JSON.stringify(data), config);
		return response;
	} catch (error) {
		console.log(error);
	}
};

export { postUpdateDataDriver };
