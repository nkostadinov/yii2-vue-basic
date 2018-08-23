import Vue from 'vue'
import store from '../store'

Vue.user = Vue.prototype.$user = {
  get id() {
    return store.state.user.id
  },
  get email() {
    return store.state.user.email
  },
  get name() {
    return store.state.user.name || store.state.user.email
  },
  get isAdmin () {
    return store.state.user.role === 'Administrator'
  },
  get company () {
    return store.state.user.company
  }
}