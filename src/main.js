import { generateFilePath } from '@nextcloud/router'

import Vue from 'vue'
import App from './App.vue'
import router from './router.js'

// eslint-disable-next-line
__webpack_public_path__ = generateFilePath(appName, '', 'js/')

Vue.mixin({ methods: { t, n } })

export default new Vue({
	el: '#content',
	render: h => h(App),
	router,
})
