export function requestData(url, dataId) {
	return fetch(url + dataId)
		.then((res) => {
			if (!res.ok) {
				// throw new Error(res.statusText);
				throw res.statusText;
			}
			return res.json();
		})
		.then((res) => {
			if (res.Response === "False") {
				// throw new Error(res.Error);
				throw res.Error;
			}
			return res;
		});
}
