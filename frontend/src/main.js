import Vue from 'vue'
import App from './App.vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import Axios from 'axios'

// Import Bootstrap and BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import './assets/scss/app.scss'
import router from './router'
import store from './store'

const axios = Axios.create({
  baseURL: process.env.VUE_APP_API_BASE_URL + "api/"
})
Vue.prototype.$http = axios

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

Vue.config.productionTip = false

const app = new Vue({
  router,
  store,
  render: h => h(App)
})

store.$app = app
app.$mount('#app')