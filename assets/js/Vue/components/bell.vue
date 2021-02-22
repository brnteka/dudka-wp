<template>
	<button
		class="bell"
		v-bind:class="$store.state.bellCount > 0 ? 'bell--clickable' : null"
		v-on:click="reset"
	>
		<svg
			width="14"
			height="20"
			viewbox="0 0 14 20"
			fill="none"
			xmlns="http://www.w3.org/2000/svg"
		>
			<path
				fill-rule="evenodd"
				clip-rule="evenodd"
				d="M8.75 1.81818V2.08171C11.2801 2.86403 13.125 5.29907 13.125 8.18182V14.5455H14V16.3636H0V14.5455H0.875V8.18182C0.875 5.29907 2.71995 2.86403 5.25 2.08171V1.81818C5.25 0.814028 6.0335 0 7 0C7.9665 0 8.75 0.814028 8.75 1.81818ZM2.625 14.5455H11.375V8.18182C11.375 5.67143 9.41625 3.63636 7 3.63636C4.58375 3.63636 2.625 5.67143 2.625 8.18182V14.5455ZM8.75 18.1818V17.2727H5.25V18.1818C5.25 19.186 6.0335 20 7 20C7.9665 20 8.75 19.186 8.75 18.1818Z"
				fill="white"
			></path>
		</svg>
		<span class="bell-count">{{ $store.state.bellCount }}</span>
	</button>
</template>
<script>
export default {
	methods: {
		reset() {
			this.$store.commit("reset");
		},
	},
};
</script>
<style lang="scss" scoped>
.bell {
	background: none;
	border: none;
	padding: 0;
	position: relative;
	margin-right: 15px;

	&--clickable {
		cursor: pointer;
	}

	@media (min-width: 768px) {
		margin-right: 0px;
	}
}
.bell-count {
	position: absolute;
	width: 14px;
	height: 14px;
	border-radius: 7px;
	background: linear-gradient(91.75deg, #dfb666 -16.43%, #aa7e4a 86.42%);
	box-shadow: 0px 0px 14px rgba(180, 144, 85, 0.6);
	top: -5px;
	right: -7px;
	font-weight: bold;
	font-size: 10px;
	line-height: 15px;
	text-transform: uppercase;
	color: #ffffff;
}
</style>
