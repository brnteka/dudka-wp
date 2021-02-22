<template>
	<div class="event-card">
		<div class="event-card-media">
			<div
				class="event-card-media-image"
				v-bind:style="{
					backgroundImage: event.featured_image.full
						? 'url(' + event.featured_image.full + ')'
						: null,
				}"
			></div>
		</div>
		<div class="event-card-content">
			<div class="event-card-name">{{ event.title.rendered }}</div>
			<div class="event-card-date-wrapper">
				<event-date
					v-bind:date="event.acf.date"
					v-bind:expired="expired"
				/>
			</div>
			<div
				class="event-card-desciption"
				v-html="event.excerpt.rendered"
			></div>
			<div class="event-card-button-wrapper">
				<button
					class="event-card-button"
					v-bind:class="
						event.acf.submitted || expired
							? 'event-card-button--submitted'
							: 'event-card-button--not-submitted'
					"
					v-on:click="submitapplication(event.id)"
					v-bind:disabled="expired || event.acf.submitted"
				>
					{{
						event.acf.submitted
							? "Application sent"
							: "Send Application"
					}}
				</button>
			</div>
		</div>
	</div>
</template>
<script>
import axios from "axios";
import EventDate from "./event-date.vue";
import getCyrToEngDate from "../../date.js";

export default {
	props: ["event"],
	components: {
		EventDate,
	},
	computed: {
		expired() {
			return Date.now() > getCyrToEngDate(this.event.acf.date).getTime();
		},
	},
	methods: {
		submitapplication(id) {
			axios
				.post("/dudka-wp/wp-json/event/v1/update-status", {
					id: id,
				})
				.then((response) => {
					this.event.acf.submitted = !this.event.acf.submitted;

					this.$store.commit("increment");
				})
				.catch((error) => console.log(error));
		},
	},
};
</script>
<style lang="scss" scoped>
.event-card {
	background: #2b282a;
	box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.4),
		-10px -10px 28px rgba(16, 16, 16, 0.3),
		inset -10px -10px 20px rgba(0, 0, 0, 0.15);
	border-radius: 4px;
	overflow: hidden;

	@media (min-width: 576px) {
		display: flex;
	}
}

.event-card-media {
	position: relative;
	&:before {
		display: block;
		content: "";
		width: 100%;
		padding-top: 50%;
	}

	@media (min-width: 576px) {
		min-width: 38.2%;

		&:before {
			content: none;
		}
	}
	@media (min-width: 1024px) {
		min-width: 392px;
	}
}

.event-card-media-image {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
}

.event-card-content {
	padding: 32px 34px;
}

.event-card-name {
	font-weight: bold;
	font-size: 24px;
	line-height: 1.45833333333;
	color: #ffffff;
	margin-bottom: 8px;
}

.event-card-date-wrapper {
	margin-bottom: 12px;
}

.event-card-desciption {
	font-size: 16px;
	line-height: 1.375;
	color: #e7e7e7;
	margin-bottom: 24px;
}
.event-card-button-wrapper {
}

.event-card-button {
	display: flex;
	flex-direction: row;
	align-items: center;
	padding: 8px 24px;
	font-weight: bold;
	font-size: 16px;
	line-height: 24px;
	text-transform: uppercase;
	color: #ffffff;

	box-shadow: 7px 7px 20px rgba(0, 0, 0, 0.25),
		-10px -10px 28px rgba(16, 16, 16, 0.3),
		inset -7px -7px 20px rgba(0, 0, 0, 0.3);
	border-radius: 4px;
	border: none;
	cursor: pointer;

	&:disabled {
		cursor: not-allowed;
	}

	&--submitted {
	}

	&--not-submitted {
		background: linear-gradient(85.99deg, #dfb666 -58.51%, #aa7e4a 89.78%);
	}
}
</style>
