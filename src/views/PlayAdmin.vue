<template>
	<div class="admin-panel">
		<div>PlayAdmin</div>
	</div>
</template>

<script>
export default {
	name: 'Sidebar',
	props: {
		visible: {
			type: Boolean,
			default: true,
		},
	},
	methods: {},
}
</script>

<style lang="scss">
	#admin-panel {
		padding: 10 10;
	}
</style>
