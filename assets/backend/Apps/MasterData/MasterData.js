import Driver from "./Drivers/Driver";

class MasterData {
	constructor(maindomain) {
		this.maindomain = maindomain;
	}

	render() {
		new Driver(this.maindomain).renderDriver();
	}
}

export default MasterData;

const masterdata = new MasterData(mainDomain);

masterdata.render();

// masterdata();
