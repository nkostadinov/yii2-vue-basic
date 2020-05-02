import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const router = new Router({
  mode: 'history',
  linkActiveClass: 'active',
  // base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('@/components/Home')
    },
    {
      path: '/users',
      name: 'users',
      component: () => import('@/pages/Users')
    },
    {
      path: '/dashboard',
      component: () => import('@/pages//Dashboard'),
      name: 'dashboard'
    },
  ]
})

router.afterEach(to => {
  if(to.meta && to.meta.title) {
    document.title = to.meta.title
  }
})

export default router