<template>
    <nav class="navbar navbar-dark shadow-sm">
        <div>
            <a
                    @click="toggleSidebar"
                    class="pl-0 btn-lg mr-2 toggle-sidebar"
                    href="javascript:void(0)"
            >
                <i class="fa fa-bars"></i>
            </a>
            <router-link class="navbar-brand" to="/">
                {{application_name}}
            </router-link>
        </div>
        <div class="d-flex align-items-center">
            <span>{{$user.name}}</span>
            <a href="/logout" class="ml-2" title="Logout">
                <i class="fas fa-sign-out-alt fa-lg"></i>
            </a>
        </div>
    </nav>
</template>

<script>
  export default {
    name: "TopBar",
    data () {
      return {
        // eslint-disable-next-line
        application_name
      }
    },
    methods: {
      toggleSidebar () {
        this.$bus.$emit('toggle-sidebar')
      }
    },
  }
</script>