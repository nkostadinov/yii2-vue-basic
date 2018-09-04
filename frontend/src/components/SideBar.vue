<template>
    <aside id="sidebar" class="border-right pt-3" :class="{ [state]: true }">
        <ul class="nav flex-column">
            <li class="nav-item" v-if="$user.isAdmin">
                <router-link class="nav-link" to="/companies">Companies</router-link>
            </li>
            <li class="nav-item" v-if="$user.isAdmin">
                <router-link class="nav-link" to="/users">Users</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" to="/facilities">Facilities</router-link>
            </li>
        </ul>
    </aside>
</template>

<script>
  export default {
    name: "SideBar",
    props: {
      state: {
        type: String,
        default: 'fixed'
      },
    },
    watch: {
      state: {
        handler (value, old_value) {
          document.body.classList.remove(old_value)
          document.body.classList.add(value)
        },
        immediate: true
      }
    }
  }
</script>