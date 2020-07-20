const handleFormInputs = (elements) => {
	const data = {};

	for (let key in elements) {
		const value = elements[key].value;
		const dataname = elements[key].name;
		data[dataname] = value;
	}

	for (let prop in data) {
		if (data.hasOwnProperty(prop) && data[prop] === undefined) {
			delete data[prop];
		}
	}

	return data;
};

export { handleFormInputs };
