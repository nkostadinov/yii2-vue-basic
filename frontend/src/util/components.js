import Vue from 'vue'

Vue.component('modal', require('@/components/Modal').default)
Vue.component('dropdown', require('@/components/Dropdown').default)

//Toast messages
import Toasted from 'vue-toasted'
Vue.use(Toasted, {
  position: 'bottom-center',
  duration: 3000,
  // theme: 'inoreader',
  type: 'info'
})
