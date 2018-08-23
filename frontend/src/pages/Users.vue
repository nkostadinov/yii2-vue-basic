<template>
    <div>
        <div class="m-2">
            <button class="btn btn-primary" @click="$bus.$emit('EditUserModal')">Create user</button>
        </div>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>email</th>
                <th>Last login</th>
                <th>Last IP</th>
                <th>Role</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id" @click="$bus.$emit('EditUserModal', user)">
                <td>{{user.id}}</td>
                <td>{{user.email}}</td>
                <td>{{user.last_login | date}}</td>
                <td>{{user.last_login_ip}}</td>
                <td>{{user.role}}</td>
            </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
  import {mapState, mapActions} from 'vuex'

  export default {
    name: "Users",
    mounted () {
      this.listUsers()
    },
    methods: {
      ...mapActions([
        'listUsers'
      ])
    },
    computed: {
      ...mapState([
        'users'
      ])
    }
  }
</script>