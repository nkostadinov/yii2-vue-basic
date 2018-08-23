import Vue from 'vue'
import Vuex from 'vuex'
import modules from '@/modules/module'

Vue.use(Vuex)

export default new Vuex.Store({
  ...modules
})
