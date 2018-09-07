import users from '@/modules/users'
import rbac from '@/modules/rbac'

const state = {
  /*global user:true*/
  /*eslint no-undef: "error"*/
  user,
  dateFormat: 'YYYY-MM-DD HH:mm',

  ...users.state,
  ...rbac.state,
}

const actions = {
  ...users.actions,
  ...rbac.actions,
}

const mutations = {
  ...users.mutations,
  ...rbac.mutations,
}

export default {state, actions, mutations}