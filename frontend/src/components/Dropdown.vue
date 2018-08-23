<template>
    <div
            class="dropdown"
            :class="{ dropup: top }"
            @mouseleave="mouseLeave"
            @mouseover="mouseOver"
            @mouseenter="mouseEnter"
            @click="toggleMenu"
    >
        <slot></slot>
        <transition name="translate-fade-down">
            <div
                    v-show="value"
                    class="dropdown-menu show"
                    :class="{ 'dropdown-menu-right': right}"
                    :style="styles"
                    @mouseleave="startTimer"
                    @mouseenter="stopTimer"
                    @click.stop
                    ref="dropdown"
            >
                <slot name="dropdown"></slot>
            </div>
        </transition>
    </div>
</template>

<script>
  /* eslint-disable */
  import Vue from 'vue'
  import {closeTippies} from "@/util/helpers"

  const hoverTimeout = 500

  export default {
    props: {
      value: Boolean,
      right: Boolean,
      hover: Boolean,
      hover_time: {
        type: Number,
        default: 100
      },
      styles: {
        type: Object,
        default () {
          return {}
        }
      },
      interactive: { //whether should stay open until clicked outside
        type: Boolean,
        default: false,
      }
    },
    data () {
      return {
        hovering: false,
        top: false,
      }
    },
    destroyed () {
      document.body.removeEventListener('click', this.closeMenu)
    },
    methods: {
      mouseEnter ($event) {
        this.stopTimer()
        if (this.hover && this.hover_time > 0 && !this.value) {
          // console.log('start open timer', this.hover_time)
          this.hoverOpenTimer = setTimeout(() => {
            this.$emit('input', true)
            //disable for a moment
            this.hovering = true
            setTimeout(() => {
              this.hovering = false
            }, hoverTimeout)
          }, this.hover_time)
        }

        if (this.hover && !this.value && this.hover_time === 0) {
          this.hovering = true
          setTimeout(() => {
            this.hovering = false
          }, hoverTimeout)
          this.$emit('input', true)
        }

      },
      mouseLeave ($event) {
        if (!this.hoverTimer) { //left the link and no time active
          this.startTimer()
        }

        if (this.hover_time > 0 && this.hover) {
          // console.log('clear hover timer')
          clearTimeout(this.hoverOpenTimer)
        }
      },
      mouseOver ($event) {
        // this.mouseEnter($event)
      },
      closeMenu () {
        if (this.value) {
          this.$emit('input', false)
        }
      },
      toggleMenu ($event) {
        if (this.hovering)
          return
        this.$emit('input', !this.value)
      },
      stopTimer () {
        // console.log('stop timer')
        clearTimeout(this.hoverTimer)
        this.hoverTimer = null
      },
      startTimer () {
        // console.log('start timer')
        if (!this.interactive)
          this.hoverTimer = setTimeout(this.closeMenu, hoverTimeout)
      },
    },
    watch: {
      value (v) {
        // closeTippies()

        if (v) {
          let vm = this
          this.top = false
          Vue.nextTick(() => {
              let rect = vm.$refs.dropdown.getBoundingClientRect()
              let window_height = (window.innerHeight || document.documentElement.clientHeight)
              this.top = (rect.bottom > window_height) && (rect.top >= rect.height)
            }
          )
        }
      },
      interactive: {
        handler (value) {
          value ? document.body.addEventListener('click', this.closeMenu) : document.body.removeEventListener('click', this.closeMenu)
        },
        immediate: true
      }
    }
  }
</script>