<template>
	<div>
		<app-header />
		<app-main>
			<events v-bind:events="events" />
		</app-main>
		<app-footer />
	</div>
</template>

<script>
import axios from "axios";
import AppHeader from "./components/header.vue";
import AppMain from "./components/main.vue";
import Events from "./components/events.vue";
import AppFooter from "./components/footer.vue";

export default {
	data() {
		return {
			events: [],
		};
	},
	components: {
		AppHeader,
		AppMain,
		Events,
		AppFooter,
	},
	methods: {},
	created() {
		axios("/dudka-wp/wp-json/wp/v2/event")
			.then((response) => {
				this.events.push(...response.data);
			})
			.catch(function (error) {
				console.log(error);
			});
	},
};
</script>

<style lang="scss" scoped>
</style>
