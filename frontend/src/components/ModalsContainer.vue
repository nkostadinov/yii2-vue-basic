<template>
    <div>
        <component v-for="(modal,idx) in modals" :is="modal" :key="idx"></component>
    </div>
</template>

<script>
  import modals from '@/modals'

  export default {
    name: "ModalsContainer",
    components: {
      ...modals,
    },
    data () {
      return {
        modals
      }
    },
  }
</script>