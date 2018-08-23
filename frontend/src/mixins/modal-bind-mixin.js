export default {
  created () {
    this.$bus.$on(this.$options.name, this.bindData)
  },
  destroyed () {
    this.$bus.$off(this.$options.name)
  },
}