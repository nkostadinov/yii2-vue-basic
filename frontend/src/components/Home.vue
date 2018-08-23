<script>
  import router from '@/router'

  export default {
    functional: true,
    render () {
        return router.replace({ name: 'users' })
        // return router.replace({ name: 'dashboard' })
    },
  }
</script>