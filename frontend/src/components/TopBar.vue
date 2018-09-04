<template>
    <nav class="navbar navbar-dark bg-primary shadow-sm">
        <div class="d-flex align-items-center">
            <a
                    @click="toggleSidebar"
                    class="btn text-light mr-2 toggle-sidebar"
                    href="javascript:void(0)"
            >
                <i class="fa fa-bars"></i>
            </a>
            <router-link class="navbar-brand" to="/">
                {{application_name}}
            </router-link>
        </div>
        <div class="d-flex align-items-center">
            <span class="text-light">{{$user.name}}</span>
            <a href="/logout" class="btn btn-outline-light border-0 ml-2" title="Logout">
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