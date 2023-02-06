<template>
	<NcContent :class="{'icon-loading': loading}" app-name="nbb">
		<AppNavigation />

		<NcAppContent>
			<div class="headline">Headline</div>

			<router-view />

			<button @click="show = !show">
				Toggle sidebar
			</button>
		</NcAppContent>

		<Sidebar v-show="show" />
	</NcContent>
</template>

<script>
import AppNavigation from './components/AppNavigation.vue'
import Sidebar from './components/Sidebar.vue'
import { NcContent, NcAppContent } from '@nextcloud/vue'
export default {
	name: 'App',
	components: {
		NcContent,
		AppNavigation,
		NcAppContent,
		Sidebar,
	},
	data() {
		return {
			loading: false,
			show: true,
			starred: false,
		}
	},
	methods: {
		close() {
			this.show = false
			console.debug(arguments)
		},
		log() {
			console.debug(arguments)
		},
	},
}
</script>

<style>
.headline {
	padding: 14px 0 12px 52px;
}
</style>
