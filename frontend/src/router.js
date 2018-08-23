import Vue from 'vue'
import Router from 'vue-router'
import Home from './components/Home'
import Users from '@/pages/Users'
import Rbac from '@/pages/Rbac'

Vue.use(Router)

export default new Router({
  mode: 'history',
  linkActiveClass: 'active',
  // base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/users',
      name: 'users',
      component: Users
    },
    {
      path: '/rbac',
      name: 'rbac',
      component: Rbac
    },
    {
      path: '/dashboard',
      component: () => import('@/pages//Dashboard'),
      name: 'dashboard'
    },
  ]
})
