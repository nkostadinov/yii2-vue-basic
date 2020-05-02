import api from "@/util/api";

const state = {
  users: []
}

const actions = {
  listUsers (context) {
    return api.get('/api/user').then((response) => {
      context.commit('setUsers', response.data)
    })
  },
  saveUser (context, data) {
    // let params ={ id: data.id }
    context.commit('updateUser', data)
    return api[data.id ? 'put':'post']('/api/user/' + (data.id ? 'update':'create') + '?id=' + data.id, data).then((response) => {
      context.commit('updateUser', response.data)
    })
  }
}

const mutations = {
  setUsers (state, data) {
    state.users = data
  },
  updateUser (state, data) {
    let u = state.users.find(x => x.id === data.id)
    u ? Object.assign(u, data):state.users.push(data)

    if(state.user.id === data.id) {
      Object.assign(state.user, data)
    }
  }
}

export default { state, actions, mutations }