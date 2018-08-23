import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import './registerServiceWorker'
//
import '@/util/user'
import '@/util/bus'
import '@/util/components'
import '@/filters'

Vue.config.productionTip = false

new Vue({
  el: '#app',
  router,
  store,
  // render: h => h(App)
  ...App,
})
