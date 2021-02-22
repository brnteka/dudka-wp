<template>
	<div
		class="event-card-date"
		v-bind:class="
			expired
				? 'event-card-date--started'
				: 'event-card-date--not-started'
		"
		v-bind:title="expired ? 'Event started' : date"
	>
		<svg
			class="event-card-date-icon"
			width="14"
			height="15"
			viewbox="0 0 14 15"
			fill="none"
			xmlns="http://www.w3.org/2000/svg"
		>
			<path
				d="M12 15H1.5C0.671573 15 0 14.3284 0 13.5V3C0 2.17157 0.671573 1.5 1.5 1.5H3V0H4.5V1.5H9V0H10.5V1.5H12C12.8284 1.5 13.5 2.17157 13.5 3V13.5C13.5 14.3284 12.8284 15 12 15ZM1.5 6V13.5H12V6H1.5ZM1.5 3V4.5H12V3H1.5ZM10.5 12H9V10.5H10.5V12ZM7.5 12H6V10.5H7.5V12ZM4.5 12H3V10.5H4.5V12ZM10.5 9H9V7.5H10.5V9ZM7.5 9H6V7.5H7.5V9ZM4.5 9H3V7.5H4.5V9Z"
				fill="white"
			></path>
		</svg>
		<span v-html="expired ? 'Event started' : date"></span>
	</div>
</template>
<script>
export default {
	props: ["date", "expired"],
};
</script>
<style lang="scss" scoped>
.event-card-date {
	display: inline-flex;
	align-items: center;

	border-radius: 4px;
	position: relative;

	&--started {
		padding: 4px 8px 4px 24px;
		.event-card-date-icon {
			left: 0;
		}
	}

	&--not-started {
		background: rgba(62, 153, 3, 0.25);
		padding: 4px 8px 4px 34px;
		.event-card-date-icon {
			left: 10px;
		}
	}
	span {
		font-size: 16px;
		line-height: 1.375;
		color: #e7e7e7;
	}
}
.event-card-date-icon {
	position: absolute;
	top: 7px;
}
</style>