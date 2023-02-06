import Vue from 'vue'
import Router from 'vue-router'
import { generateUrl } from '@nextcloud/router'

import Shedule from './views/Shedule.vue'
import PlayAdmin from './views/PlayAdmin.vue'
import People from './views/People.vue'

Vue.use(Router)

export default new Router({
	base: generateUrl('/apps/deck/'),
	linkActiveClass: 'active',
	routes: [
		{
			path: '/',
			component: Shedule,
		},
		{
			path: '/plays/',
			component: PlayAdmin,
		},
		{
			path: '/people/',
			component: People,
		},
	],
})
