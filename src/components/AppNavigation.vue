<template>
	<NcAppNavigation>
		<template id="nbb-user-navigation" #list>
			<NcAppNavigationItem title="Shedule" icon="icon-folder" to="/shedule" />
			<NcAppNavigationCaption title="Admin Section" />
			<NcAppNavigationItem title="Plays" icon="icon-folder" to="/plays" />
			<NcAppNavigationItem title="People" icon="icon-folder" to="people" />
		</template>

		<template #footer>
			<NcAppNavigationSettings>
				Example settings
			</NcAppNavigationSettings>
		</template>
	</NcAppNavigation>
</template>

<script>
import {
	NcAppNavigation,
	NcAppNavigationItem,
	NcAppNavigationSettings,
	NcAppNavigationCaption,
} from '@nextcloud/vue'

export default {
	name: 'AppNavigation',
	components: {
		NcAppNavigation,
		NcAppNavigationItem,
		NcAppNavigationSettings,
		NcAppNavigationCaption,
	},
	data() {},
	methods: {},
}
</script>