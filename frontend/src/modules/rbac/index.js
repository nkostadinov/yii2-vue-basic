import api from '@/util/api'

const state = {
  /*global roles:true*/
  /*eslint no-undef: "error"*/
  roles
}

const actions = {
  listRoles (context) {
    return api.get('/api/rbac').then((response) => {
      context.commit('setRoles', response)
    })
  },
}

const mutations = {
  setRoles (state, data) {
    state.roles = data
  }
}

export default { state, actions, mutations }