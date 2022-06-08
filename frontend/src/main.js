import Vue from 'vue'
import App from './App.vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import http from '@/http'

// Import Bootstrap and BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import './assets/scss/app.scss'
import router from './router'
import store from './store'

Vue.prototype.$http = http

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

Vue.config.productionTip = false

const app = new Vue({
  router,
  store,
  beforeCreate() {
    this.$store.commit('initialiseStore')
  },
  render: h => h(App)
})

store.$app = app
app.$mount('#app')