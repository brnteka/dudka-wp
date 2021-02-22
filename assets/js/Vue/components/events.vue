<template>
	<div class="event-cards">
		<event
			v-for="event in events"
			v-bind:key="event.id"
			v-bind:event="event"
		/>
	</div>
</template>
<script>
import Event from "./event.vue";
export default {
	props: ["events"],
	components: {
		Event,
	},
};
</script>
<style lang="scss" scoped>
.event-cards {
	& > * {
		&:not(:last-child) {
			margin-bottom: 27px;
		}
	}
}
</style>