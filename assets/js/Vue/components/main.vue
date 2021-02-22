<template>
	<main class="main">
		<div class="main-container">
			<slot></slot>
		</div>
	</main>
</template>
<script>
export default {};
</script>
<style lang="scss" scoped>
.main {
	padding-top: 60px;
	padding-bottom: 20px;
}
.main-container {
	max-width: 1126px;
	padding-left: 15px;
	padding-right: 15px;
	margin: 0 auto;
}
</style>
