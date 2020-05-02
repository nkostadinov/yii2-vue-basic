import Vue from 'vue'

Vue.component('modal', require('@innologica/vue-stackable-modal').default)
Vue.component('dropdown', require('@innologica/vue-dropdown-menu').default)

//Toast messages
import Toasted from 'vue-toasted'
Vue.use(Toasted, {
  position: 'bottom-center',
  duration: 3000,
  // theme: 'inoreader',
  type: 'info'
})
