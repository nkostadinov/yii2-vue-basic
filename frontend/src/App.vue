<template>
    <div id="app">
        <!-- As a link -->
        <nav class="navbar navbar-light bg-light shadow-sm">
            <router-link class="navbar-brand" to="/">{{application_name}}</router-link>
            <div>
                {{$user.name}}
                <a href="/logout">Logout</a>
            </div>
        </nav>
        <div class="d-flex content">
            <div id="nav" class="shadow pt-2">
                <div class="py-2">
                    <ul class="nav flex-column">
                        <li class="nav-item" v-if="$user.isAdmin">
                            <router-link class="nav-link" to="/users">Users</router-link>
                        </li>
                        <li class="nav-item" v-if="$user.isAdmin">
                            <router-link class="nav-link" to="/rbac">Rbac</router-link>
                        </li>
                    </ul>
                </div>
            </div>
            <div class=" main">
                <div class="container my-3">
                    <transition name="translate-fade-down">
                        <router-view/>
                    </transition>
                </div>
            </div>
        </div>
        <!--modals container-->
        <modals-container></modals-container>
    </div>
</template>

<script>
  import ModalsContainer from '@/components/ModalsContainer'

  export default {
    components: {
      ModalsContainer
    },
    data () {
      return {
        // eslint-disable-next-line
        application_name
      }
    },
  }
</script>

<style lang="scss">
    @import "assets/bootstrap";
</style>