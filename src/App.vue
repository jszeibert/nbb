<template>
	<NcContent :class="{'icon-loading': loading}" app-name="nbb">
		<NcAppNavigation>
			<NcAppNavigationNew v-if="!loading"
				:text="t('nbb', 'New XXXXXX')"
				:disabled="false"
				button-id="new-nbb-button"
				button-class="icon-add"
				@click="newButtonAction" />
			<template id="app-nbb-navigation" #list>
				<NcAppNavigationItem icon="icon-user" title="This is a user">
					<NcAppNavigationCounter slot="counter" :highlighted="true">
						99+
					</NcAppNavigationCounter>
					<template slot="actions">
						<NcActionButton icon="icon-edit" @click="alert('Edit')">
							Edit
						</NcActionButton>
						<NcActionButton icon="icon-delete" @click="alert('Delete')">
							Delete
						</NcActionButton>
						<NcActionLink icon="icon-external" title="Link" href="https://nextcloud.com" />
					</template>
				</NcAppNavigationItem>
				<NcAppNavigationItem title="This is bullet item">
					<NcAppNavigationIconBullet slot="icon" color="0082c9" />
					<template slot="actions">
						<NcActionButton :disabled="false" icon="icon-edit" @click="alert('Edit')">
							Edit
						</NcActionButton>
						<NcActionLink :disabled="false"
							icon="icon-external"
							title="Link"
							href="https://nextcloud.com" />
						<NcActionCheckbox :disabled="false">
							Checkbox
						</NcActionCheckbox>
						<NcActionInput :disabled="false" icon="icon-add">
							ActionInput
						</NcActionInput>
						<NcActionRouter :disabled="false" icon="icon-add" to="#">
							ActionRouter
						</NcActionRouter>
						<NcActionText :disabled="false" icon="icon-add">
							ActionText
						</NcActionText>
						<NcActionTextEditable :disabled="false">
							ActionTextEditable
						</NcActionTextEditable>
					</template>
				</NcAppNavigationItem>
				<NcAppNavigationItem title="Counter and actions"
					icon="icon-category-enabled">
					<NcAppNavigationCounter slot="counter" :highlighted="true">
						99+
					</NcAppNavigationCounter>
					<template slot="actions">
						<NcActionButton icon="icon-edit" @click="alert('Edit')">
							Edit
						</NcActionButton>
						<NcActionButton icon="icon-delete" @click="alert('Delete')">
							Delete
						</NcActionButton>
						<NcActionLink icon="icon-external" title="Link" href="https://nextcloud.com" />
					</template>
				</NcAppNavigationItem>
				<NcAppNavigationItem title="Item with children"
					:allow-collapse="true"
					icon="icon-folder">
					<template>
						<NcAppNavigationItem title="AppNavigationItemChild1">
							<NcAppNavigationIconBullet slot="icon" color="0082c9" />
						</NcAppNavigationItem>
						<NcAppNavigationItem title="AppNavigationItemChild2" icon="icon-category-enabled" />
						<NcAppNavigationItem title="AppNavigationItemChild3" icon="icon-category-enabled" />
						<NcAppNavigationItem title="AppNavigationItemChild4" icon="icon-category-enabled" />
					</template>
				</NcAppNavigationItem>
				<NcAppNavigationItem title="Loading Item" :loading="true" />
				<NcAppNavigationItem title="Event Item" icon="icon-folder" @click="log($event, 'clicked')" />
				<NcAppNavigationItem title="Editable Item"
					icon="icon-folder"
					:editable="true"
					edit-placeholder="I am a placeholder" />
				<NcAppNavigationItem title="Are you sure you want to delete?" :undo="true" />
				<NcAppNavigationItem title="First pinned item"
					icon="icon-category-enabled"
					:pinned="true" />
				<NcAppNavigationItem title="Second pinned item"
					icon="icon-category-enabled"
					:pinned="true" />
				<NcAppNavigationItem title="Third pinned item"
					icon="icon-category-enabled"
					:pinned="true" />
			</template>

			<template #footer>
				<NcAppNavigationSettings>
					Example settings
				</NcAppNavigationSettings>
			</template>
		</NcAppNavigation>

		<NcAppContent>
			<div>This is the content</div>
			<button @click="show = !show">
				Toggle sidebar
			</button>
		</NcAppContent>

		<NcAppSidebar
			v-show="show"
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
	</NcContent>
</template>

<script>
import {
	NcContent,
	NcAppContent,
	NcAppNavigation,
	NcAppNavigationItem,
	NcAppNavigationNew,
	NcAppNavigationSettings,
	NcAppSidebar,
	NcAppSidebarTab,
	NcAppNavigationCounter,
	NcActionButton,
	NcActionLink,
	NcAppNavigationIconBullet,
	NcActionCheckbox,
	NcActionInput,
	NcActionRouter,
	NcActionText,
	NcActionTextEditable,
} from '@nextcloud/vue'
export default {
	name: 'App',
	components: {
		NcContent,
		NcAppContent,
		NcAppNavigation,
		NcAppNavigationItem,
		NcAppNavigationNew,
		NcAppNavigationSettings,
		NcAppSidebar,
		NcAppSidebarTab,
		NcAppNavigationCounter,
		NcActionButton,
		NcActionLink,
		NcAppNavigationIconBullet,
		NcActionCheckbox,
		NcActionInput,
		NcActionRouter,
		NcActionText,
		NcActionTextEditable,
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
		newButtonAction() {
			console.debug(arguments)
		},
		log() {
			console.debug(arguments)
		},
	},
}
</script>