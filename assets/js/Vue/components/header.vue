<template>
	<header
		class="header"
		v-bind:style="{ backgroundImage: 'url(' + headerbg + ')' }"
	>
		<div class="header-logo">Events</div>
		<div class="header-control-panel">
			<bell />
			<div class="header-account">
				<div class="header-account-inner">
					<div class="header-account-avatar">
						<img v-bind:src="avatar" alt="" />
					</div>
					<span class="header-account-name">Marina Vengrenyuk</span>
				</div>
			</div>
		</div>
	</header>
</template>
<script>
import Bell from "./bell.vue";
import avatar from "../../../img/avatar.jpg";
import headerbg from "../../../img/header-bg.svg";
export default {
	data() {
		return {
			avatar: avatar,
			headerbg: headerbg,
		};
	},
	components: {
		Bell,
	},
};
</script>
<style lang="scss" scoped>
.header {
	display: flex;
	align-items: center;
	padding: 20px 15px;
	background: linear-gradient(270.01deg, #211e21 34.9%, #413b40 99.99%),
		#2b282a;
	background-size: auto 100%;

	@media (min-width: 768px) {
		padding: 19.5px 33.36px 19.5px 57.05px;
	}
}
.header-logo {
	font-weight: bold;
	font-size: 34px;
	line-height: 50px;
	background: linear-gradient(135.79deg, #ffd88d 25.58%, #aa7e4a 66.87%);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
}
.header-control-panel {
	margin-left: auto;
	display: flex;
	align-items: center;
}
.header-account {
	padding: 8px 12px 9px 12px;
	border-radius: 10px;
	position: relative;
	overflow: hidden;
	margin-left: 31px;
	display: none;

	@media (min-width: 768px) {
		display: block;
	}

	&:before {
		content: "";
		display: block;
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: linear-gradient(
				90.17deg,
				rgba(33, 30, 33, 0.4) 34.95%,
				rgba(71, 65, 70, 0.4) 99.88%
			),
			#443b44;
	}
}
.header-account-inner {
	position: relative;
	display: flex;
	align-items: center;
}
.header-account-avatar {
	margin-right: 8px;
	img {
		border-radius: 7px;
	}
}
.header-account-name {
	font-size: 14px;
	line-height: 1.428;
	letter-spacing: 0.2px;
	color: #ffffff;
}
</style>



