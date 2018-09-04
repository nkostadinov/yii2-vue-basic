<template>
    <modal
            v-if="show"
            :show="show"
            @close="close(false)"
            @save="close(true)"
            saveButtonTitle="Yes"
            saveButtonClass="btn btn-danger"
            closeButtonTitle="No"
            title=""
    >
        <div>
            <h5>{{confirmation}}</h5>
        </div>
    </modal>
</template>

<script>
  import ModalBindMixin from '@/mixins/modal-bind-mixin'

  export default {
    name: "ConfirmModal",
    mixins: [ModalBindMixin],
    data () {
      return {
        show: false,
        callback: null,
        confirmation: 'Confirm ?'
      }
    },
    methods: {
      bindData ({ callback, confirmation }) {
        this.show = true
        this.callback = callback
        this.confirmation = confirmation || 'Confirm ?'
      },
      close (result) {
        this.callback && this.callback(result)
        this.show = false
      }
    }
  }
</script>

<style scoped>

</style>