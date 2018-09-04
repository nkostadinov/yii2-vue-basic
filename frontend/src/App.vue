<template>
    <div id="app">
        <top-bar></top-bar>
        <div class="d-flex content">
            <side-bar :state="state"></side-bar>
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
  import SideBar from '@/components/SideBar'
  import TopBar from "@/components/TopBar";

  export default {
    components: {
      TopBar,
      SideBar,
      ModalsContainer
    },
    data () {
      return {
        state: 'fixed'
      }
    },
    created () {
      this.$bus.$on('toggle-sidebar', () => {
        this.state = this.state === 'fixed' ? 'collapsed' : 'fixed'
      })
    }
  }
</script>

<style lang="scss">
    @import url('//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&subset=all');
    @import url('//fonts.googleapis.com/css?family=Merriweather:300,400,700&subset=all');
    @import url('//fonts.googleapis.com/css?family=Roboto&subset=all');

    @import "assets/bootstrap";
</style>