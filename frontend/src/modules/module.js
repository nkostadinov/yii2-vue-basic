import users from '@/modules/users'

const state = {
  /*global user:true*/
  /*eslint no-undef: "error"*/
  user,
  dateFormat: 'YYYY-MM-DD HH:mm',

  ...users.state,
}

const actions = {
  ...users.actions,
}

const mutations = {
  ...users.mutations,
}

export default {state, actions, mutations}