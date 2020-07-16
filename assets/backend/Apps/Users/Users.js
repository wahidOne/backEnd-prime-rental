import Clients from "./Clients/Clients";
import "../../scss/main.scss";

class Users {
	constructor(domain) {
		this.domain = domain;
	}
	render() {
		new Clients(this.domain).render();
	}
}

const user = new Users(mainDomain);

user.render();
