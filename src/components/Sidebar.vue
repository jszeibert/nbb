<template>
	<NcAppSidebar
		title="eberhard-grossgasteiger-VDw-nsi5TpE-unsplash.jpg"
		subtitle="4,3 MB, last edited 41 days ago"
		:starred.sync="starred"
		@close="close">
		<template #primary-actions>
			<button class="primary">
				Button 1
			</button>
			<input id="link-checkbox"
				name="link-checkbox"
				class="checkbox link-checkbox"
				type="checkbox">
			<label for="link-checkbox" class="link-checkbox-label">Do something</label>
		</template>

		<template #secondary-actions>
			<NcActionButton icon="icon-edit" @click="alert('Edit')">
				Edit
			</NcActionButton>
			<NcActionButton icon="icon-delete" @click="alert('Delete')">
				Delete
			</NcActionButton>
			<NcActionLink icon="icon-external" title="Link" href="https://nextcloud.com" />
		</template>

		<NcAppSidebarTab id="activity" name="Activity" icon="icon-activity">
			this is the activity tab
		</NcAppSidebarTab>
		<NcAppSidebarTab id="comments" name="Comments" icon="icon-comment">
			this is the comments tab
		</NcAppSidebarTab>
		<NcAppSidebarTab id="sharing" name="Sharing" icon="icon-shared">
			this is the sharing tab
		</NcAppSidebarTab>
		<NcAppSidebarTab id="versions" name="Versions" icon="icon-history">
			this is the versions tab
		</NcAppSidebarTab>
	</NcAppSidebar>
</template>

<script>
import { 
	NcAppSidebar,
	NcAppSidebarTab,
	NcActionButton,
	NcActionLink,
} from '@nextcloud/vue'
export default {
	name: 'Sidebar',
	components: {
		NcAppSidebar,
		NcAppSidebarTab,
		NcActionButton,
		NcActionLink,
	},
	props: {
		visible: {
			type: Boolean,
			default: true,
		},
	},
	methods: {
		closeSidebar() {
			this.$router.push({ name: 'board' })
		},
	},
}
</script>

<style lang="scss">
	#app-sidebar .icon-close {
		z-index: 100;
	}

	.app-deck .app-sidebar {
		z-index: 1500 !important;
	}
</style>
