<template>
    <modal
            v-if="show"
            :show="show"
            @close="show = false"
            title="Create user"
            @save="save"
            :modalClass="{ 'modal-md': true }"
    >
        <div>
            <div class="form-group">
                <label for="user-name">Name</label>
                <input type="text" class="form-control" id="user-name" placeholder="Enter name" v-model="data.name">
            </div>
            <div class="form-group">
                <label for="user-email">Email</label>
                <input type="email" class="form-control" id="user-email" placeholder="email" v-model="data.email">
            </div>
            <div class="form-group">
                <label for="user-role">Role</label>
                <dropdown id="user-role" v-model="role_menu">
                    <a class="dropdown-toggle">{{data.role}}</a>
                    <div slot="dropdown">
                        <a
                                class="dropdown-item"
                                v-for="role in roles"
                                :class="{ selected: role.name === data.role }"
                                :key="role.name"
                                @click="data.role = role.name, role_menu = false"
                        >
                            {{role.name}}
                            <i class="fas fa-check check"></i>
                        </a>
                    </div>
                </dropdown>
            </div>
        </div>
    </modal>
</template>

<script>
  import ModalBindMixin from '@/mixins/modal-bind-mixin'
  import {mapState, mapActions} from 'vuex'

  const userTemplate = {
    name: '',
    email: '',
    role: 'Employee',
  }

  export default {
    mixins: [ ModalBindMixin ],
    name: "EditUserModal",
    data () {
      return {
        data: {...userTemplate},
        show: false,
        role_menu: false,
      }
    },
    methods: {
      ...mapActions([ 'saveUser' ]),
      bindData (user) {
        this.show = true
        Object.assign(this.data, user || userTemplate)
      },
      save () {
        this.saveUser(this.data)
      }
    },
    computed: {
      ...mapState([ 'roles', 'user' ])
    },
  }
</script>