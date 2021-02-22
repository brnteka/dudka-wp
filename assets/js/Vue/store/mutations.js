const mutations = {
	increment(state) {
		state.bellCount++;
	},
	reset(state) {
		state.bellCount = 0;
	},
};

export default mutations;
