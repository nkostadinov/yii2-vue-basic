<template>
    <div>
        <div class="row">
            <div class="col">
                <div v-for="role in roles" :key="role.name">
                    {{role.name}}
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
</template>

<script>
  import {mapState, mapActions} from 'vuex'

  export default {
    name: "Rbac",
    created () {
      this.listRoles()
    },
    methods: {
      ...mapActions([
        'listRoles'
      ]),
    },
    computed: {
      ...mapState([
        'roles'
      ])
    },
  }
</script>